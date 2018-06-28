@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="inner-content">

            <div class="container" ng-controller="HomeController">

                <div id="gmaps"></div>

                <span ng-bind-html = "Message"></span>
                <br />
                <button ng-click="go()" ng-disabled="mydisabled" class="btn btn-primary">Book your place</button>
            </div>

        </section>
    </div>
@endsection
