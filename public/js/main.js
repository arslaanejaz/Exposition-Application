var app = angular.module('MyApp', []);
app.controller('HomeController', function ($scope, $window, $sce, $http) {

    var url = '';
    $scope.mydisabled=true;
    $scope.go = function ( ) {
        window.location = url;
    };

    var map;
    var markers = [];

    // map config
    var mapOptions = {
        center: new google.maps.LatLng(0, 0),
        zoom: 4,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false
    };

    // init the map
    function initMap() {
        if (map === void 0) {
            var outside = angular.element(document.getElementById('gmaps'));
            map = new google.maps.Map(outside[0], mapOptions);
        }
    }


    // place a marker
    function setMarker(map, position, content) {
        var marker;
        var markerOptions = {
            position: position,
            map: map,
            title: content.event.name,
            icon: 'https://maps.google.com/mapfiles/ms/icons/green-dot.png'
        };

        marker = new google.maps.Marker(markerOptions);
        markers.push(marker); // add marker to array

        google.maps.event.addListener(marker, 'click', function () {
            var html = content.event.name
                +"<br />"
                +content.address
                +"<br />"
                +content.event.start_date_time
                +"<br />"
                +content.event.end_date_time;
            $scope.Message = $sce.trustAsHtml(html);
            url = '/exposition-hall-map/'+content.id;
            $scope.mydisabled=false;
            $scope.$apply();
        });
    }



    $http.get("/api/locations")
        .then(function(response) {
            if(response.data.length){
                mapOptions.center = new google.maps.LatLng(response.data[0].lat, response.data[0].long);
                mapOptions.zoom = 14;
            }else {
                mapOptions.zoom = 2;
            }
            // show the map and place some markers
            initMap();

            angular.forEach(response.data, function(value, key) {
                setMarker(map, new google.maps.LatLng(value.lat, value.long), value);
            });
        });

});
app.controller('ReservePageController', ['$scope',
    function($scope) {
        $scope.data={};
        $scope.validate = function () {

            if(!$scope.data.email) {
                $scope.emailRequired = true;
                event.preventDefault();
            }else{
                $scope.emailRequired = false;
            }

            if(!$scope.data.phone) {
                $scope.phoneRequired = true;
                event.preventDefault();
            }else{
                $scope.phoneRequired = false;
            }

            if(validateEmail($scope.data.email)==false) {
                $scope.emailValidate = true;
                event.preventDefault();
            }else{
                $scope.emailValidate = false;
            }
            function validateEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }
        }

    }]);