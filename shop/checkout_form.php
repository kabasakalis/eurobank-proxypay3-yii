<div class="span12">
    <h1 class="page-header"> Eurobank ProxyPay 3 Integration Test</h1>
    <h2>Transaction Data Review</h2>
</div>

<div class="span6">
    <table class="table table-condensed">
        <thead>

        </thead>
        <tbody>
        <tr>
            <td><strong>merchantID</strong></td>
            <td><?php echo  $_POST['merchantID'] ?></td>
        </tr>
        <tr>
            <td><strong>merchantRef</strong></td>
            <td><?php echo $_POST['merchantRef'];?></td>
        </tr>
        <tr>
            <td><strong>merchantDesc</strong></td>
            <td><?php echo $_POST['merchantDesc'];?></td>
        </tr>

        <tr>
            <td><strong>Amount</strong></td>
            <td><?php echo $_POST['amount'];?></td>
        </tr>

        <tr>
            <td><strong>Currency</strong></td>
            <td><?php echo $_POST['currency'];?></td>
        </tr>

        <tr>
            <td><strong>Language</strong></td>
            <td><?php echo $_POST['lang'];?></td>
        </tr>

        <tr>
            <td><strong>Customer email</strong></td>
            <td><?php echo $_POST['customerEmail'];?></td>
        </tr>

        <tr>
            <td><strong>Offset</strong></td>
            <td><?php echo $_POST['offset'];?></td>
        </tr>
        <tr>
            <td><strong>Period</strong></td>
            <td><?php echo $_POST['period'];?></td>
        </tr>

        </tbody>
    </table>
</div>

<div class="span6">
    <table class="table table-condensed">
        <thead>

        </thead>
        <tbody>
        <tr>
            <td><strong>var1</strong></td>
            <td><?php echo  $_POST['var1'] ?></td>
        </tr>
        <tr>
            <td><strong>var2</strong></td>
            <td><?php echo  $_POST['var2'] ?></td>
        </tr>
        <tr>
            <td><strong>var3</strong></td>
            <td><?php echo  $_POST['var3'] ?></td>
        </tr>
        <tr>
            <td><strong>var4</strong></td>
            <td><?php echo  $_POST['var4'] ?></td>
        </tr>

        <tr>
            <td><strong>var5</strong></td>
            <td><?php echo  $_POST['var5'] ?></td>
        </tr>

        <tr>
            <td><strong>var6</strong></td>
            <td><?php echo  $_POST['var6'] ?></td>
        </tr>
        <tr>
            <td><strong>var7</strong></td>
            <td><?php echo  $_POST['var7'] ?></td>
        </tr>
        <tr>
            <td><strong>var8</strong></td>
            <td><?php echo  $_POST['var8'] ?></td>
        </tr>
        <tr>
            <td><strong>var9</strong></td>
            <td><?php echo  $_POST['var9'] ?></td>
        </tr>
        </tbody>
    </table>

</div>
<div class="span12">

    <h2>Click to pay.</h2>


    <form  name="PayformVisa" method="POST" action="<?php echo ShopController::PROXY_PAY_SERVER_BASE_URL?>/proxypay/apacs">
        <input type="hidden" name="APACScommand" value="NewPayment">
        <input type="hidden" name="merchantID" value="<?php echo $_POST['merchantID']; ?>">
        <input type="hidden" name="amount" value="<?php echo $_POST['amount']; ?>">
        <input type="hidden" name="merchantRef" value="<?php echo $_POST['merchantRef']; ?>">
        <input type="hidden" name="merchantDesc" value="<?php echo $_POST['merchantDesc']; ?>">
        <input type="hidden" name="currency" value="0978">
        <input type="hidden" name="lang" value="<?php echo $_POST['lang']; ?>">
        <input type="hidden" name="var1" value="<?php echo $_POST['var1']; ?>">
        <input type="hidden" name="var2" value="<?php echo $_POST['var2']; ?>">
        <input type="hidden" name="var3" value="<?php echo $_POST['var3']; ?>">
        <input type="hidden" name="var4" value="<?php echo $_POST['var4']; ?>">
        <input type="hidden" name="var5" value="<?php echo $_POST['var5']; ?>">
        <input type="hidden" name="var6" value="<?php echo $_POST['var6']; ?>">
        <input type="hidden" name="var7" value="<?php echo $_POST['var7']; ?>">
        <input type="hidden" name="var8" value="<?php echo $_POST['var8']; ?>">
        <input type="hidden" name="var9" value="<?php echo  $_POST['var9']; ?>">
        <input type="hidden" name="CustomerEmail" value="<?php echo $_POST['customerEmail']; ?>">
        <input type="hidden" name="Offset" value="<?php echo $_POST['offset']; ?>">
        <input type="hidden" name="Period" value="<?php echo $_POST['period']; ?>">
        <input  name="submit" type="image"  src="<?php echo Yii::app()->baseUrl ?>/img/visa.gif" border="0" value="Visa"
               Alt="Pay with Visa" height="39"
               onClick="if (PayClicked()) document.PayformVisa.submit(); return false;"
                >
    </form>

    <form  name="PayformMC" method="POST" action="<?php echo ShopController::PROXY_PAY_SERVER_BASE_URL?>/proxypay/apacs">
           <input type="hidden" name="APACScommand" value="NewPayment">
           <input type="hidden" name="merchantID" value="<?php echo $_POST['merchantID']; ?>">
           <input type="hidden" name="amount" value="<?php echo $_POST['amount']; ?>">
           <input type="hidden" name="merchantRef" value="<?php echo $_POST['merchantRef']; ?>">
           <input type="hidden" name="merchantDesc" value="<?php echo $_POST['merchantDesc']; ?>">
           <input type="hidden" name="currency" value="978">
           <input type="hidden" name="lang" value="<?php echo $_POST['lang']; ?>">
           <input type="hidden" name="var1" value="<?php echo $_POST['var1']; ?>">
           <input type="hidden" name="var2" value="<?php echo $_POST['var2']; ?>">
           <input type="hidden" name="var3" value="<?php echo $_POST['var3']; ?>">
           <input type="hidden" name="var4" value="<?php echo $_POST['var4']; ?>">
           <input type="hidden" name="var5" value="<?php echo $_POST['var5']; ?>">
           <input type="hidden" name="var6" value="<?php echo $_POST['var6']; ?>">
           <input type="hidden" name="var7" value="<?php echo $_POST['var7']; ?>">
           <input type="hidden" name="var8" value="<?php echo $_POST['var8']; ?>">
           <input type="hidden" name="var9" value="<?php echo  $_POST['var9']; ?>">
           <input type="hidden" name="CustomerEmail" value="<?php echo $_POST['customerEmail']; ?>">
           <input type="hidden" name="Offset" value="<?php echo $_POST['offset']; ?>">
           <input type="hidden" name="Period" value="<?php echo $_POST['period']; ?>">
           <input   name="submit" type="image"  src="<?php echo Yii::app()->baseUrl ?>/img/mc.gif" border="0" value="Visa"
                  Alt="Pay with Visa" height="39"
                  onClick="if (PayClicked()) document.PayformMC.submit(); return false;"
                   >
       </form>
    </div>

<script language="javascript">

var PayButtonClicked = false;
function PayClicked()
{
// Check to see if Pay Button has been clicked before
if (PayButtonClicked)
{
// Message displayed
alert ("Transaction already sent.");
return false;
}
else
PayButtonClicked = true;
return true;
}

</script>



