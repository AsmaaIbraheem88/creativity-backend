@extends('admin.index')
@section('content')
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">


            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                Hello  {{ admin()->user()->name}}
            </div>
        </div>
    </div>
</div>
<div class="row">





</div>
<!-- END PAGE BASE CONTENT -->
@endsection