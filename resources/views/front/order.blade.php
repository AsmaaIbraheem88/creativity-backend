@extends('front.index')

@section('title')
    GET AQUOTE
@endsection

@section('content')


    <div class="banner-area banner-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner">
                        <h2>{{trans('front.Get_A_QUOTE')}}</h2>
                        <ul class="page-title-link">
                            <li><a href="{{url('/')}}">{{trans('front.home')}}</a></li>
                            <li><a href="{{url('order')}}">{{trans('front.Get_A_QUOTE')}}</a></li>
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

                        <form  class="row" action="{{route('front.order')}}" name="contactform" method="POST"  enctype="multipart/form-data" >
                            @csrf
                            <fieldset class="row-fluid">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="{{trans('front.your_name')}}">
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="{{trans('front.your_email')}}">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="{{trans('front.your_tel')}}">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label class="sr-only">{{trans('front.select_service')}}</label>
                                    <select name="service" id="select_service" class="selectpicker form-control" data-style="btn-white">
                                        <option value="12">{{trans('front.select_service')}}</option>
                                        @foreach($services as $service)
                                        <option value="{!!  $service->{'name_'. trans('front.language') }!!}">{!!  $service->{'name_'. trans('front.language') }!!}</option>
                                       @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="file" id="files"  name="file" accept="file_extension|image/*|media_type"/>
{{--                                    <input type="file" name="files[]" accept="file_extension|image/*|media_type" multiple>--}}
                                    <label for="files">{{trans('front.upload')}}</label>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="{{trans('front.your_message')}}"></textarea>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                                    <button type="submit" value="SEND" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">{{trans('front.save')}}</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->

            <div class="row">

            </div><!-- end row -->

        </div><!-- end container -->
    </div><!-- end section -->

@endsection