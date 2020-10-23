@extends('front.index')

@section('title')
    Clients
@endsection

@section('content')


    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>Clients</h2>
                        <ul class="page-title-link">
                            <li><a href="{{url('/')}}">{{trans('front.home')}}</a></li>
                            <li><a href="{{url('clients')}}">{{trans('front.clients')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="testimonials" class="parallax section wb parallax-off"  style="padding: 70px 0">
        <div class="container">
            <div class="section-title text-center">
                <h3>{{trans('front.clients')}}</h3>
                <p class="lead">{{trans('front.clients_msg')}}</p>
            </div><!-- end title -->



            <div class="row logos">
            @foreach($clients as $client)
                <div class="col-md-4  col-xs-6 wow fadeInUp">
                    <a href="#"><img src="{{ it()->url($client->logo) }}" alt="client-image" class="img-repsonsive"></a>
                </div>

            @endforeach
            </div><!-- end row -->

            <hr class="hr1" style="margin: 50px 0;border: 1px solid #2121210f">


        </div><!-- end container -->
    </div><!-- end section -->

@endsection