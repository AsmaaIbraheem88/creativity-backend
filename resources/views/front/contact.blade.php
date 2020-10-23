@extends('front.index')

@section('title')
    Contact
@endsection

@section('content')


    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>Contact Us</h2>
                        <ul class="page-title-link">
                            <li><a href="{{url('/')}}">{{trans('front.home')}}</a></li>
                            <li><a href="{{url('contact')}}">{{trans('front.contact')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>{{trans('front.Get_in_touch')}}</h3>

            </div><!-- end title -->

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="contact_form">
                        @include('front.layouts.messages')

                        <form  class="row" action="{{route('front.contact')}}" name="contactform" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <fieldset class="row-fluid">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="{{trans('front.your_name')}}">
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="{{trans('front.your_email')}}">
                                </div>


                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <input type="text" name="subject" id="subject" class="form-control" placeholder="{{trans('front.subject')}}">
                                  </div>


                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control" name="message"  rows="6" placeholder="{{trans('front.your_message')}}"></textarea>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                                    <button type="submit" value="" id="" class="btn btn-light btn-radius btn-brd grd1 btn-block">{{trans('front.save')}}</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->

            <div class="row">
                <div class="col-md-4 col-sm-4   pd-add  text-center">
                    <div class="address-item">
                        <div class="address-icon">
                            <i class="icon icon-location2"></i>
                        </div>
                        <h3>{{trans('front.address')}}</h3>
                        <p> {!!  setting()->{'address_'. trans('front.language') }!!}</p>
                    </div>

                </div>

                <div class="col-md-4 col-sm-4  pd-add text-center">
                    <div class="address-item">
                        <div class="address-icon">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                        <h3>{{trans('front.email_us')}}</h3>
                        <p>{!! setting()->email !!}</p>
                    </div>

                </div>

                <div class="col-md-4 col-sm-4  pd-add text-center">
                    <div class="address-item">
                        <div class="address-icon">
                            <i class="icon icon-headphones"></i>
                        </div>
                        <h3>{{trans('front.call_us')}}</h3>
                        <p>{!! setting()->tel !!}
                            <br></p>
                    </div>

                </div>



            </div><!-- end row -->

        </div><!-- end container -->
    </div><!-- end section -->


@endsection