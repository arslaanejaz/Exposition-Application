@extends('layouts.app')

@section('content')
    <div class="container" ng-controller="ReservePageController">
        <h1>Reservation Page</h1>
        <h2>{!! $location->event?$location->event->name:'' !!}
            > {{$location->address}}
            > {!! $location->hall?$location->hall->name:'' !!}
            > {!! $stand->title !!}
        </h2>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        @endif
        <hr/>

        @if($stand->company)
            <center>
                <h3>Stand Image</h3>
                <p><img src="{{url('storage/'.$stand->image.'/public')}}" alt="image"></p>
                <p>Stand Reserved by Company</p>
                <p><img src="{{url('storage/'.$stand->company->logo.'/company_logo')}}" alt="image"></p>
            </center>
        @else
            <p class="alert alert-info">All fields are required.</p>
            {!! Form::open(['url' => 'reserve', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

            <input type="hidden" value="{{$stand->id}}" name="stand_id">
            <input type="hidden" value="{{$location->id}}" name="location_id">
            <div class="form-group">
                {!! Form::label('email', 'Admin Email: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('email', null, ['class' => 'form-control', 'required', 'ng-model'=>'data.email']) !!}
                    <span class="alert-danger" ng-show="emailRequired">The email is required.</span>
                    <span class="alert-danger" ng-show="emailValidate">The email is not valid required.</span>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Phone: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('phone', null, ['class' => 'form-control', 'required', 'ng-model'=>'data.phone']) !!}
                    <span class="alert-danger" ng-show="phoneRequired">The phone is required.</span>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('logo', 'Logo: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::file('logo', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('document', 'Document: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::file('document', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-3">
                    {!! Form::submit('Reserve', ['class' => 'btn btn-primary form-control', 'ng-click'=>'validate()']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        @endif



    </div>
@endsection
