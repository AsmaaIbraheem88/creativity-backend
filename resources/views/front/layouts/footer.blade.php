<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <img src="{{ it()->url(setting()->logo) }}" alt="">
                    </div>
                    <p> {!!  setting()->{'footer_message_'. trans('front.language') }!!}</p>
                </div><!-- end clearfix -->
            </div><!-- end col -->

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="widget clearfix" style="padding: 40px;">
                    <div class="widget-title" >
                        <h3>Pages</h3>
                    </div>

                    <ul class="footer-links hov">
                        <li>
                            <a class="{!! Route::CurrentRouteNamed('home')  ? 'active' : null !!} "  href="{{url('/')}}">{{trans('front.home')}} <span class="icon icon-arrow-right2"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/')}}/#about" data-scroll="about">{{trans('front.about')}} <span class="icon icon-arrow-right2"></span></a>
                        </li>
                        <li>
                            <a href="{{url('/')}}/#services" data-scroll="services">{{trans('front.services')}} <span class="icon icon-arrow-right2"></span></a>
                        </li>
                        <li>
                            <a  href="{{url('/')}}/#portfolio" data-scroll="portfolio">{{trans('front.portfolio')}} <span class="icon icon-arrow-right2"></span></a>
                        </li>
                        <li>
                            <a class="{!! Route::CurrentRouteNamed('clients')  ? 'active' : null !!} "  href="{{url('/clients')}}">{{trans('front.clients')}} <span class="icon icon-arrow-right2"></span></a>
                        </li>
                        <li>
                            <a class="{!! Route::CurrentRouteNamed('contact')  ? 'active' : null !!} "  href="{{url('/contact')}}">{{trans('front.contact')}} <span class="icon icon-arrow-right2"></span></a>
                        </li>
                    </ul><!-- end links -->
                </div><!-- end clearfix -->
            </div><!-- end col -->


        </div><!-- end row -->
    </div><!-- end container -->
</footer>

<div class="copyrights">
    <div class="container">
        <div class="footer-distributed text-center"  >
            <div class="footer-left" style="float: left">
                <p class="footer-company-name">All Rights Reserved. &copy; 2020 <a href="#">CREATIVITY-AND</a>

                    <!--                        Design By : -->
                    <!--					<a href="#">html</a>-->
                </p>
            </div>
            <div class="social-box"  >
                <ul >
                    <li><a href="{{social()->facebook}}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                    <li><a href="{{social()->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="{{social()->linked}}"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                    <li><a href="{{social()->twitter}}"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>



                </ul>
            </div>


        </div>
    </div><!-- end container -->
</div><!-- end copyrights -->
