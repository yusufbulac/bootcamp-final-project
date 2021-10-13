<div class="f-widget">
    <!--footer Widget-->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!--footer twitter widget-->
                <div class="title-widget-bg">
                    <div class="title-widget">Twitter Updates</div>
                </div>
                <ul class="tweets">
                    <li>Check out this great #themeforest item for you
                        'Simpler Landing' <a href="#">http://t.co/LbLwldb6 </a>
                        <span>2 hours ago</span>
                    </li>
                    <li class="lastone">Check out this great #themeforest item for you
                        'Simpler Landing' <a href="#">http://t.co/LbLwldb6 </a>
                        <span>2 hours ago</span>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <a href="#" class="btn btn-default btn-follow"><i class="fa fa-twitter fa-2x"></i>
                    <div>Follow us on twitter</div>
                </a>
            </div>
            <!--footer twitter widget-->
            <div class="col-md-4">
                <!--footer newsletter widget-->
                <div class="title-widget-bg">
                    <div class="title-widget">Newsletter Signup</div>
                </div>
                <div class="newsletter">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                    <form role="form">
                        <div class="form-group">
                            <label>Your Email address</label>
                            <input type="email" class="form-control newstler-input" id="exampleInputEmail1"
                                   placeholder="Enter email">
                            <button class="btn btn-default btn-red btn-sm">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--footer newsletter widget-->
            <div class="col-md-4">
                <!--footer contact widget-->
                <div class="title-widget-bg">
                    <div class="title-widget-cursive">Contact Us</div>
                </div>
                <ul class="contact-widget">
                    <li class="fphone">+387 123 456, +387 123 456 <br> +387 123 456</li>
                    <li class="fmobile">+387-123-456-1<br>+387-123-456-2</li>
                    <li class="fmail lastone">your@email.com<br>customer.care@mail.com</li>
                </ul>
            </div>
            <!--footer contact widget-->
        </div>
        <div class="spacer"></div>
    </div>
</div>
<!--footer Widget-->
<div class="footer">
    <!--footer-->
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <ul class="footermenu">
                    <!--footer nav-->
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/contact">Contact us</a></li>
                </ul>
                <!--footer nav-->
                <div class="f-credit">&copy;All rights reserved by <a href="#">teknonews.com</a></div>

            </div>
            <div class="col-md-3">
                <!--footer Share-->
                <div class="followon">Follow us on</div>
                <div class="fsoc">
                    <a href="#" class="ftwitter">twitter</a>
                    <a href="#" class="ffacebook">facebook</a>
                    <a href="#" class="fflickr">flickr</a>
                    <a href="#" class="ffeed">feed</a>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--footer Share-->
        </div>
    </div>
</div>
<!--footer-->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?= ASSETS ?>bootstrap\js\bootstrap.min.js"></script>

<!-- map -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="<?= ASSETS ?>js\jquery.ui.map.js"></script>
<script type="text/javascript" src="<?= ASSETS ?>js\demo.js"></script>

<!-- owl carousel -->
<script src="<?= ASSETS ?>js\owl.carousel.min.js"></script>

<!-- rating -->
<script src="<?= ASSETS ?>js\rate\jquery.raty.js"></script>
<script src="<?= ASSETS ?>js\labs.js" type="text/javascript"></script>

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="<?= ASSETS ?>js\product\lib\jquery.mousewheel-3.0.6.pack.js"></script>

<!-- fancybox -->
<script type="text/javascript" src="<?= ASSETS ?>js\product\jquery.fancybox.js?v=2.1.5"></script>

<!-- custom js -->
<script src="<?= ASSETS ?>js\shop.js"></script>
</div>
</body>

</html>
<?php

foreach ($_SESSION as $key => $value) {
    $pattern = "/message/";
    if (preg_match($pattern, $key)) {
        unset($_SESSION[$key]);
    }
}

?>