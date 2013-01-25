#ProxyPay3 Eurobank Greek Bank Gateway (Redirection) For Yii Framework
 © 2013  [Spiros Kabasakalis](http://iws.kabasakalis.gr/)
  [The MIT License (MIT)]( http://opensource.org/licenses/MIT)
 
### This is NOT a production solution for your Eurobank ProxyPay integration.
But outlines the  process and will help you work out the specifics of  your implementation.You can apply it in any PHP MVC framework,(it can be adapted since there's little framework specific code).
  
## Setup.
 - Copy ShopController.php class file in protected/controllers folder
 - Copy shop folder in views folder,(views that correspond to ShopController actions).
 - Copy img folder in webroot folder.(just credit card gifs).
 - Create transactions and transactions_done tables from supplied sql file.
 - Include [Bootstrap](http://twitter.github.com/bootstrap/) css file for nice design.

## Workflow
   To better understand this code you have to ask for documentation
    PDFs,sample PHP files and  credentials for a demo account  from this email:
    feedback@eurobank-cards.gr.
    After they send you these files,you will be asked to provide them with checkout,validation,ok,notok,and
    confirmation URLs as described in documentation.
    If you do tests as a developer using a demo account unfortunately you will NOT be able to verify a complete
	successful transaction and render a successful OK page using a demo credit card number.
	You will need a real credit card number for that.This is a restriction of the ProxyPay system,probably for security reasons.
    If you want to debug,you will have to ask for ProxyPay's server log from their IT helpdesk (via email) for EVERY transaction test you make.
    Super inconvenient,but unfortunately that's the way it is.









