@extends('front.index')

@section('title')
   Home
@endsection

@section('content')

    <div class="slider-area">
        <div class="slider-wrapper owl-carousel">
            @foreach($sliders as $slider)
            <div class="slider-item home-one-slider-otem slider-item-four slider-bg-one"
                 style="  background-image: url( {{ it()->url($slider->image) }} );background-position: center center;background-repeat: no-repeat;background-size: cover;">
                <div class="container">
                    <div class="row">
                        <div class="slider-content-area">
                            <div class="slide-text">
                                <h1 class="homepage-three-title">{!!  $slider->{'heading_'. trans('front.language') }!!}</h1>
                                <h2>{!!  $slider->{'description_'. trans('front.language') }!!} </h2>
                                <div class="slider-content-btn">
                                    <!--									<a class="button btn btn-light btn-radius btn-brd" href="#">Read More</a>-->
                                    <a class="button btn btn-light btn-radius btn-brd" href="{{url('order')}}">{{trans('front.quote')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <div id="about" class="section wb " style="padding-top: 50px; padding-bottom: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="post-media wow fadeIn">
                        <img src="{{ it()->url(about()->image) }}" alt="about-image" class="img-responsive img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->

                <div class="col-md-6">
                    <div class="message-box">

                        <h2>{{trans('front.Who We are')}}</h2>
                        <p class="lead">{!!  about()->{'about_us_'. trans('front.language') }!!}</p>


                        <h2 style="margin-top:30px;">{{trans('front.features')}}</h2>
                        <p> {!!  about()->{'features_'. trans('front.language') }!!} </p>

                    </div><!-- end messagebox -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->




    <div id="services" class="parallax section lb" >
        <div class="container">
            <div class="section-title text-center">
                <h3>{{trans('front.our_services')}}</h3>
                <p class="lead">{{trans('front.service_desc')}}</p>
            </div><!-- end title -->

            <div class="owl-services owl-carousel owl-theme ">

                @foreach($services as $service)


                    <div class="service-widget" >
                        <div class="post-media wow fadeIn" style="height: 200px;">

                            <img src="{{ it()->url($service->image) }}" alt="service-image" class="img-responsive img-rounded" >
                        </div>
                        <div class="service-dit" style="padding:0px 20px 5px 20px ;">
                            <h3 ><a class="show" data-scroll="features_{{$service->id}}">{!!  $service->{'name_'. trans('front.language') }!!}</a></h3>
                            <div style="line-height:1.7; font-size: 15px;padding-bottom: 5px;min-height: 150px"><p >{!!  $service->{'description_'. trans('front.language') }!!}</p></div>
                            <a class="button btn btn-light btn-radius btn-brd" href="{{url('order')}}" style="padding:7px; margin:10px auto;font-size: 15px">{{trans('front.quote')}}</a>
                        </div>
                    </div>
                    <!-- end service -->

                @endforeach

            </div><!-- end row -->


        </div><!-- end container -->
    </div><!-- end section -->

    <hr class="hr1" style="margin: 50px 0;border: 1px solid #2121210f">

    <!--////////////////////////////////////////////-->

    @foreach($services as $service)
    <div id="features_{{$service->id}}" class="features section lb" style="display:none;">
        <div class="container">
            <div class="section-title text-center">
                <h3>{!!  $service->{'name_'. trans('front.language') }!!}</h3>
            </div><!-- end title -->

            <div class="row" >

                @foreach($service->childServices as $childService)

{{--                @if($childService)--}}
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service-widget" style="margin-bottom: 20px;">
                        <div class="post-media wow fadeIn" style="height: 200px;">

                            <a  data-scroll="sub_{{$childService->id}}" class="sub-show hoverbutton global-radius"><i class="flaticon-unlink"></i></a>

                            <img src="{{ it()->url($childService->image) }}" alt="service-image" class="img-responsive img-rounded">

                        </div>

                        <h3 style="color: #21759b; padding-left:20px;padding-right:20px">{!!  $childService->{'name_'. trans('front.language') }!!}</h3>

                        <div id="sub_{{$childService->id}}" class="row" style="padding:5px 20px 20px 20px;min-height: 300px ;display: none">

                            @foreach($childService->subChildServices as $subChildService)
                            <div class="col-md-12 col-sm-12 col-xs-12" >
                                <div>
                                    <span ><i   class="test fa fa-angle-double-right" style="margin:0px 5px"></i>{!!  $subChildService->{'name_'. trans('front.language') }!!}</span>
                                </div>

                            </div>

                            @endforeach

                        </div>
                    </div><!-- end service -->
                </div><!-- end col -->



{{--                @endif--}}
                @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    @endforeach
    <!--////////////////////////////////////////////-->


    <!--////////////////////////////////////////////-->


    <hr class="hr1" style="margin: 50px 0;border: 1px solid #2121210f">

    <div id="portfolio" class="section lb">
        <div class="container">
            <div class="section-title text-center">
                <h3>{{trans('front.portfolio')}}</h3>

            </div><!-- end title -->
        </div><!-- end container -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="portfolio-filter text-center">
                        <ul>

                            <li>
                                <a class="btn btn-dark btn-radius btn-brd active" href="#" data-filter="*">
                                    <span class="oi hidden-xs" data-glyph="grid-three-up"></span> All
                                </a>
                            </li>
                            @foreach($services as $service)

                                <li style="">

                                    <a style="min-width: 250px;padding: 10px;margin: 10px;" class="btn btn-dark btn-radius btn-brd" data-toggle="tooltip" data-placement="top"  data-filter=".{!!  $service->id !!}">{!!  $service->{'name_'. trans('front.language') }!!}</a>
                                </li>

                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>

            <hr class="invis">

            <div id="da-thumbs" class="da-thumbs portfolio">

                @foreach($portfolios as $portfolio)
                    <div class="post-media pitem item-w1 item-h1 {{$portfolio->service->id}}">
                        <a href="{{ it()->url($portfolio->image) }}" data-rel="prettyPhoto[gal]" style="height: 170px;">
                            <img src="{{ it()->url($portfolio->image) }}" alt="project-image" class="img-responsive" style="height: 100%">
                            <div>
                                <h3>{{$portfolio->name}} <small>{{$portfolio->client}}</small></h3>
                                <i class="flaticon-unlink"></i>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div><!-- end portfolio -->
        </div><!-- end container -->
    </div><!-- end section -->



    <div id="clients" class="parallax section  wb parallax-off" >
        <div class="container">
            <div class="section-title text-center" style="margin-bottom: 60px">
                <h3>{{trans('front.our_clients')}}</h3>

            </div><!-- end title -->



            <div class="row logos">
                @foreach($clients as $client)
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="{{ it()->url($client->logo) }}" alt="client-image" class="img-repsonsive"></a>
                </div>

                @endforeach
            </div><!-- end row -->



            <hr class="hr1" style="margin: 50px 0;border: 1px solid #2121210f">

            <div class="row logos text-center">
                <a href="{{url('/clients')}}" class="btn btn-light btn-radius btn-brd grd1">{{trans('front.learn_more')}}</a>


            </div>


        </div><!-- end container -->
    </div><!-- end section -->



@endsection