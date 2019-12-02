<!-- BEGIN #footer -->
        <div id="footer" class="footer">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN row -->
                <div class="row">
                    <!-- BEGIN col-6 -->
                    <div class="col-md-6">
                        <h4 class="footer-header">ABOUT US</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec tristique dolor, ac efficitur velit. Nulla lobortis tempus convallis. Nulla aliquam lectus eu porta pulvinar. Mauris semper justo erat. 
                        </p>
                        <p>
                            Vestibulum porttitor lorem et vestibulum pharetra. Phasellus sit amet mi congue, hendrerit mi ut, dignissim eros.
                        </p>
                    </div>
                    <!-- END col-6 -->
                    
                    <!-- BEGIN col-6 -->
                    <div class="col-md-6">
                        <h4 class="footer-header">OUR CONTACT</h4>
                        <address>
                            <strong><?php echo SYSTEM_NAME; ?></strong><br />
                            <?php echo ADDRESS; ?><br />
                            <abbr title="Phone">Phone:</abbr> <?php echo PHONE; ?><br />
                            <abbr title="Fax">Fax:</abbr> <?php echo PHONE; ?><br />
                            <abbr title="Email">Email:</abbr> <a href="mailto:<?php echo SYSTEM_EMAIL; ?>"><?php echo SYSTEM_EMAIL; ?></a><br />                            
                        </address>
                    </div>
                    <!-- END col-6 -->
                </div>
                <!-- END row -->
            </div>
            <!-- END container -->
        </div>
        <!-- END #footer -->
    
        <!-- BEGIN #footer-copyright -->
        <div id="footer-copyright" class="footer-copyright">
            <!-- BEGIN container -->
            <div class="container">
                <div class="payment-method">
                    <img src="../assets/img/payment/payment-method.png" alt="" />
                </div>
                <div class="copyright">
                    Copyright &copy; <?php echo date("Y");?> <?php echo SYSTEM_NAME; ?>. All rights reserved.
                </div>
            </div>
            <!-- END container -->
        </div>
        <!-- END #footer-copyright -->