

<!--FOOTER-->
<footer>
    <div id="lgx-footer" class="lgx-footer"> <!--lgx-footer-white-->
        <div class="lgx-inner-footer">
            <div class="lgx-subscriber-area lgx-subscriber-area-indiv lgx-subscriber-area-black hidden">
                <div class="container">
                    <div class="lgx-subscriber-inner lgx-subscriber-inner-indiv">  <!--lgx-subscriber-inner-indiv-->
                        <h3 class="subscriber-title">Join Newsletter</h3>
                        <form class="lgx-subscribe-form" >
                            <div class="form-group form-group-email">
                                <input type="email" id="subscribe" placeholder="Enter your email Address  ..." class="form-control lgx-input-form form-control"  />
                            </div>
                            <div class="form-group form-group-submit">
                                <button type="submit" name="lgx-submit" id="lgx-submit" class="lgx-btn lgx-submit"><span>Subscribe</span></button>
                            </div>
                        </form> <!--//.SUBSCRIBE-->
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="lgx-footer-area lgx-footer-area-center">
                    <div class="lgx-footer-single">
                        <h3 class="footer-title">Social Connection</h3>
                        <p class="text">
                            Connect with us on our social platforms <br> for Any update
                        </p>
                        <ul class="list-inline lgx-social-footer">
                            <li><a href="https://www.facebook.com/DaystarUniversity"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="https://twitter.com/DaystarUni"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.instagram.com/daystar_uni/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/daystar-university-569b66164/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="lgx-footer-bottom">
                    <div class="lgx-copyright">
                        <p> <span>©</span> {{ date('Y') }} GCC 2024 Powered by <a href="https://www.daystar.ac.ke/">Daystar University.</a> and <a href="#">CyberPro.</a> </p>
                    </div>
                </div>

            </div>
            <!-- //.CONTAINER -->
        </div>
        <!-- //.footer Middle -->
    </div>
</footer>
<!--FOOTER END-->

<!--//.LGX SITE CONTAINER-->
<!-- *** ADD YOUR SITE SCRIPT HERE *** -->
<!-- JQUERY  -->
{{-- <script src="{{ asset('frontend/assets/js/vendor/jquery-1.12.4.min.js') }}"></script> --}}
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- BOOTSTRAP JS  -->
<script src="{{ asset('frontend/assets/libs/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Smooth Scroll  -->
<script src="{{ asset('frontend/assets/libs/jquery.smooth-scroll.js') }}"></script>

<!-- SKILLS SCRIPT  -->
<script src="{{ asset('frontend/assets/libs/jquery.validate.js') }}"></script>

<!-- if load google maps then load this api, change api key as it may expire for limit cross as this is provided with any theme -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQvRGGtL6OrpP5xVMxq_0NgiMiRhm3ycI"></script>

<!-- CUSTOM GOOGLE MAP -->
<script type="text/javascript" src="{{ asset('frontend/assets/libs/gmap/jquery.googlemap.js') }}"></script>

<!-- adding magnific popup js library -->
<script type="text/javascript" src="{{ asset('frontend/assets/libs/maginificpopup/jquery.magnific-popup.min.js') }}"></script>

<!-- Owl Carousel  -->
<script src="{{ asset('frontend/assets/libs/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- COUNTDOWN   -->
<script src="{{ asset('frontend/assets/libs/countdown.js') }}"></script>
<script src="{{ asset('frontend/assets/libs/timer/TimeCircles.js') }}"></script>

<!-- Counter JS -->
<script src="{{ asset('frontend/assets/libs/waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/assets/libs/counterup/jquery.counterup.min.js') }}"></script>

<!-- SMOTH SCROLL -->
<script src="{{ asset('frontend/assets/libs/jquery.smooth-scroll.min.js') }}"></script>
<script src="{{ asset('frontend/assets/libs/jquery.easing.min.js') }}"></script>

<!-- type js -->
<script src="{{ asset('frontend/assets/libs/typed/typed.min.js') }}"></script>

<!-- header parallax js -->
<script src="{{ asset('frontend/assets/libs/header-parallax.js') }}"></script>

<!-- instafeed js -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/instafeed.js') }}/1.4.1/instafeed.min.js') }}"></script>-->
<script src="{{ asset('frontend/assets/libs/instafeed.min.js') }}"></script>

<!-- CUSTOM SCRIPT  -->
<script src="{{ asset('frontend/assets/js/custom.script.js') }}"></script>