<h1 class="page-header span12"> Eurobank ProxyPay 3 Integration Test</h1>
<?php       If(!empty($transaction_done)): ?>
<div class="alert alert-success span5 offset2">
    <h1>Order Confirmed!</h1>
  <h2>Thank you for your order</h2>
    We received your order, and will be processing it as soon as we have checked your payment transaction.
    Thank you for your confidence, and we hope to see you back soon.
</div>
<?php else: ?>
<div class="alert alert-info span5 offset2">
    <h1>Pending Confirmation</h1>
    You have tried to place an order and perform an online payment.
    We still have not  received a payment confirmation
    immediately from the payment service provider.
    Don't worry, your transaction can still be confirmed in a short while.
    If we do get a confirmation, you will automatically receive an email that confirms your
    order.
    To check the confirmation now, click the button below.<br><br>
    <a class="btn btn-large pull-right" href='<?php echo Yii::app()->request->requestUri;?>'>Check for confirmation now.</a>
</div>
<?php endif ?>