<?php
/**
 * ShopController.php class file
 *
 * EUROBANK PROXYPAY3  REDIRECTION  INTEGRATION TEST
 * NOTICE
 * This is NOT a  production solution for your Proxypay integration.
 * But outlines the  process and will help you work out the specifics of
 * your implementation.To better understand this code you have to ask for documentation
 * PDFs ,sample PHP files and  credentials for a demo account  from this email:
 * feedback@eurobank-cards.gr.
 * After they send you these files,you will be asked to provide them with checkout,validation,ok,notok,and
 * confirmation URLs as described in documentation.
 * If you do tests as a developer using a demo account unfortunately you will NOT be able to verify a complete
 * successful transaction and render a successful OK page, using  a demo credit card number (see below) .
 * You will need a real credit card number for that.
 * This is a restriction of the ProxyPay system,probably for security reasons.If you want to debug,
 * you will have to ask for  ProxyPay's server log from their IT helpdesk (via email) for EVERY transaction test you make.
 * Super inconvenient,but unfortunately that's the way it is.
 *
 *
 * Date: 1/21/13
 * Time: 10:25 PM
 *
 * @author: Spiros Kabasakalis <kabasakalis@gmail.com>
 * @copyright Copyright &copy; Spiros Kabasakalis 2013
 * @license The MIT License (MIT)  http://opensource.org/licenses/MIT
 * @package
 */

class ShopController extends Controller
{

    /*Demo Test Credit Card Number  : 4000000000000002
    expiration date : 1213
    CVV : 123*/

    //fill in your layout.My views use Bootstrap  http://twitter.github.com/bootstrap/
    public $layout = 'col2';

    //flag
    private $values_set = false;

    const MERCHANT_ID = ''; //will be provided by Eurobank IT Support
    const MERCHANT_PASSWORD = ''; //will be provided by Eurobank IT Support
    const PROXY_PAY_SERVER_BASE_URL = 'https://eptest.eurocommerce.gr';

    public function init()
    {
        //check to see if test values are set.
        if (isset($_POST['transaction_values']) && ($_POST['transaction_values'] == 'Submit Test Values'))
            $this->values_set = true;
        parent::init();
    }

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionCheckout()
    {
        //If we have submitted test values,insert these values in transactions table,so that ProxyPay can validate the transaction later.
        if ($this->values_set) {
            $command = Yii::app()->db->createCommand();
            $test = $command->insert('transactions', array(
                'mer_ref' => $_POST['merchantRef'],
                'mer_id' => self::MERCHANT_ID,
                'amount' => $_POST['amount'],
                'currency' => $_POST['currency'],
            ));
            //var_dump($test);exit;
            $this->render('checkout_form'); //render the review page with test values inserted in form ,ready to submit to ProxyPay server.
        } else {
            $this->render('testvalues_form'); //insert test values.
        }
    }

    /*
     * ProxyPay redirects to this URL as soon as it receives transaction data,
     * posting four POST variables Ref,Shop,Amount and Currency with values received from the transaction.
     * The script  checks to see if the match the data stored in transactions table during the checkout action.
     * This action does not render a view.
     * */
    public function actionValidation()
    {

        if (isset($_POST['Ref'])) {

            $transaction = Yii::app()->db->createCommand(array(
                'select' => '*',
                'from' => 'transactions',
                'where' => array('and', 'mer_ref=:mer_ref'),
                'params' => array(':mer_ref' => (string)$_POST['Ref'],
                )
            ))->queryRow();

            //var_dump($transaction);
            if (!empty($transaction)) {

                if (self::MERCHANT_ID != (string)$_POST['Shop']) {
                    echo '[NOTOK-Wrong Merchant ID in Validation.]';
                    exit;
                }

                //Amount is submitted as cents ( 2euros is posted as 200) in checkout page
                //but validation expects decimal with 2 decimal digits.So 2 euros is posted from ProxyPay as 2.00.
                //Whatever.
                if (number_format($transaction['amount'] / 100, 2) != (string)$_POST['Amount']) {
                    echo '[NOTOK.Wrong Amount  in Validation.]';
                    exit;
                }

                //978 is euro code.
                if ($_POST['Currency'] != 978) {
                    echo '[NOTOK-Wrong Currency  in Validation.]';
                    exit;
                }
                //all checks passed,echo [OK] as expected from ProxyPay
                echo '[OK]';
                exit;

            } else {
                echo '[NOTOK-Wrong Merchant Reference (Order ID)  in Validation]';
                exit;
            }
        } else {
            echo '[NOTOK-No POST data available.Ref,Shop,Amount and Currency POST values expected]';
            exit;
        }
    }


/*
 * ProxyPay redirects to this action posting the ref parameter which is the unique transaction id
 * issued from your web app.,typically the order id.
 * This action checks to see if the transaction has been confirmed (see confirmation action).
 * If it has,data has been inserted into transactions_done table,and the action renders a view
 * with an OK message.If not confirmed it polls the transactions_done table every 15 sec (the page refreshes)
 * to see  if confirmation data has been inserted.
 * */
    public function actionOk()
    {
        $orderID = $_GET['ref'];
        $transaction_done = Yii::app()->db->createCommand(array(
            'select' => '*',
            'from' => 'transactions_done',
            'where' => array('and', 'ref=:mer_ref'),
            'params' => array(':mer_ref' => $orderID,
            )
        ))->queryRow();

        if (empty($transaction_done)) {
            $cs = Yii::app()->clientScript;
            $cs->registerMetaTag('15;URL=ok?ref=' . $orderID, null, 'Refresh');
        }
        $this->render('ok', array('transaction_done' => $transaction_done));
    }


    //Failed Transaction
    public function actionNotOk()
    {
        $this->render('notok');
    }

    //after validation has passed and the transaction has been completed in ProxyPay,the system posts in this action
    //transaction data to be stored in  transactions_done table.
    public function actionConfirmation()
    {
        if (isset($_POST['Password'])) {
            if ($_POST["Password"] != self::MERCHANT_PASSWORD) {
                echo "[NOTOK]Merchant Password does not match.";
                exit;
            }
            $command = Yii::app()->db->createCommand();
            $command->insert('transactions_done', array(
                'shop' => $_POST['Shop'],
                'password' => $_POST['Password'],
                'amount' => $_POST['Amount'],
                'currency' => $_POST['Currency'],
                'currencysymbol' => $_POST['Currencysymbol'],
                'ref' => $_POST['Ref'],
                'transid' => $_POST['Transid'],
                'var1' => $_POST['Var1'],
                'var2' => $_POST['Var2'],
                'var3' => $_POST['Var3'],
                'var4' => $_POST['Var4'],
                'var5' => $_POST['Var5'],
                'var6' => $_POST['Var6'],
                'var7' => $_POST['Var7'],
                'var8' => $_POST['Var8'],
                'var9' => $_POST['Var9'],
                'method' => $_POST['Method'],
                'datetime' => $_POST['DateTime'],
                'remoteaddr' => $_POST['RemoteAddr'],
            ));
            echo "[OK]";
        } else
            echo "No POST data.<br>
            Shop,Password,Amount,Currency,Currencysymbol,Ref,Transid,Var1-Var9,Method,DateTime,RemoteAddr  POST values expected.<br>
            [NOTOK]";
    }

}

