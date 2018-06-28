@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="inner-content">
        <h2>
            {!! $location->event?$location->event->name:'' !!}
            > {{$location->address}}
            > {!! $location->hall?$location->hall->name:'' !!}
        </h2>
            @if($location->hall)
                <center>
            <div class="row">
                <h6>Exposition Hall Map</h6>
            <img class="fix-img" src="{{url('storage/'.$location->hall->image.'/public')}}">
            </div>
                </center>
                <hr />
            @endif
            @if($location->hall)
            <div class="row">
            @foreach($location->hall->stands as $stand)

                <div class="col-xs-6 col-md-3">

                    @if($stand->company)
                        <div class="panel panel-primary text-center">
                        <p>${{$stand->price}}</p>
                        <a href="#" class="thumbnail">
                            <img class="fix-img" src="{{url('storage/'.$stand->company->logo.'/company_logo')}}" alt="image">
                        </a>
                        <a href="{{url('storage/'.$stand->company->document.'/company_doc/1')}}" class="thumbnail">
                            Marketing Document: {{$stand->company->document}}
                        </a>
                        </div>
                        @else
                        <div class="panel panel-primary text-center">
                        <p>{{$stand->title}}</p>
                        <p>${{$stand->price}}</p>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_{{$stand->id}}">Free</button>
                            <br />
                            <br />

                        <!-- Modal -->
                        <div id="myModal_{{$stand->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Reserve</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p><img class="fix-img" src="{{url('storage/'.$stand->image.'/public')}}" alt="image"></p>
                                        <a href="{{url('/location/'.$location->id.'/stand-reservation/'.$stand->id)}}" class="btn btn-primary">Reserve</a>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </div>
                    @endif
                </div>




            @endforeach
            </div>
                @else
                <p>No Record Found...</p>
            @endif
        </section>

    </div>
@endsection
