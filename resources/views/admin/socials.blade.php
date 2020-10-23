@extends('admin.index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="widget-extra body-req portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-dark">{{$title}}</span>
                </div>
                <div class="actions">
                    <a  href="{{aurl('socials')}}"
                        class="btn btn-circle btn-icon-only btn-default"
                        tooltip="{{trans('admin.show_all')}}"
                        title="{{trans('admin.show_all')}}">
                        <i class="fa fa-list"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen"
                        href="#"
                        data-original-title="{{trans('admin.fullscreen')}}"
                        title="{{trans('admin.fullscreen')}}">
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="col-md-12">
                    {!! Form::open(['url'=>aurl('/socials'),'id'=>'socials','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
                    <div class="form-group">
                        {!! Form::label('whatsapp',trans('admin.whatsapp'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('whatsapp',social()->whatsapp,['class'=>'form-control','placeholder'=>trans('admin.whatsapp')]) !!}
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        {!! Form::label('facebook',trans('admin.facebook'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('facebook',social()->facebook,['class'=>'form-control','placeholder'=>trans('admin.facebook')]) !!}
                        </div>
                    </div>
                    
                    <br>

                    <div class="form-group">
                        {!! Form::label('twitter',trans('admin.twitter'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('twitter',social()->twitter,['class'=>'form-control','placeholder'=>trans('admin.twitter')]) !!}
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        {!! Form::label('linked',trans('admin.linked'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('linked',social()->linked,['class'=>'form-control','placeholder'=>trans('admin.linked')]) !!}
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        {!! Form::label('instagram',trans('admin.instagram'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('instagram',social()->instagram,['class'=>'form-control','placeholder'=>trans('admin.instagram')]) !!}
                        </div>
                    </div>
                    <br>


                    <div class="clearfix"></div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        {!! Form::submit(trans('admin.save'),['class'=>'btn btn-success']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@stop