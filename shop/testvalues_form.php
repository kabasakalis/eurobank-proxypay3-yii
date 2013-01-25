<div class="span12">
    <h1 class="page-header"> Eurobank ProxyPay 3 Integration Test</h1>
    <h2>Do Transaction</h2>
    <div class="row">
        <form id="test-values" method="POST" action="<?php echo Yii::app()->baseUrl . '/shop/checkout' ?>" class="form-horizontal">

            <input type="hidden" name="APACScommand" value="NewPayment">

            <div class="span3">
                <div class="control-group">
                    <label class="control-label">MerchantID</label>

                    <div class="controls">
                        <input type="text" name="merchantID" value="<?php echo ShopController::MERCHANT_ID ?>">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Amount</label>

                    <div class="controls">
                        <select name="amount">
                            <option value="150">1,50</option>
                            <option value="235">2,35</option>
                            <option value="1000">10,00</option>
                            <option value="2000">20,00</option>
                            <option value="3000">30,00</option>
                            <option value="3700">37,00</option>
                            <option value="4300">43,00</option>
                        </select>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Merchant Reference</label>

                    <div class="controls">
                        <input type="text" name="merchantRef">
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Merchant Description</label>

                    <div class="controls">
                        <input type="text" name="merchantDesc">
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Currency.Always euro=0978.</label>

                    <div class="controls">
                        <input type="text" name="currency" value="0978">
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Offset</label>

                    <div class="controls">
                        <select name="offset">
                            <option value="0">-</option>
                            <option value="1">1 month</option>
                            <option value="2">2 months</option>
                            <option value="3">3 months</option>
                            <option value="4">4 months</option>
                        </select>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Period</label>

                    <div class="controls">
                        <select name="period">
                            <option value="0">-</option>
                            <option value="3">3 month</option>
                            <option value="6">6 months</option>
                            <option value="12">12 months</option>
                            <option value="24">24 months</option>
                        </select>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Language</label>

                    <div class="controls">
                        <input type="text" name="lang" value="EN">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Customer email</label>

                    <div class="controls">
                        <input type="text" name="customerEmail">
                    </div>
                </div>
            </div>
            <div class="span3">
                <div class="control-group">
                    <label class="control-label">Var1</label>

                    <div class="controls">
                        <input type="text" name="var1">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Var2</label>

                    <div class="controls">
                        <input type="text" name="var2">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Var3</label>

                    <div class="controls">
                        <input type="text" name="var3">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Var4</label>

                    <div class="controls">
                        <input type="text" name="var4">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Var5</label>

                    <div class="controls">
                        <input type="text" name="var5">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Var6</label>

                    <div class="controls">
                        <input type="text" name="var6">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Var7</label>

                    <div class="controls">
                        <input type="text" name="var7">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Var8</label>

                    <div class="controls">
                        <input type="text" name="var8">
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Var9</label>

                    <div class="controls">
                        <input type="text" name="var9">
                    </div>
                </div>

            </div>
            <div class="span7">
                <div class="control-group">
                    <div class="controls">
                        <input class='btn btn-large pull-right' type="submit" name="transaction_values"
                               value="Submit Test Values">
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>