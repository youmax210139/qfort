<style>
    #map {
        height: 400px;
        width: 100%;
    }

    /* Optional: Makes the sample page fill the window. */
    #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
    }

    #infowindow-content .title {
        font-weight: bold;
    }

    #infowindow-content {
        display: none;
    }

    #map #infowindow-content {
        display: inline;
    }

    .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
    }

    #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
    }

    .pac-controls {
        display: inline-block;
        padding: 5px 11px;
    }

    .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }

    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
    }

    #target {
        width: 345px;
    }
</style>
@forelse($dataTypeContent->getCoordinates() as $point)
<input type="hidden" name="{{ $row->field }}[lat]" value="{{ $point['lat'] }}" id="lat" />
<input type="hidden" name="{{ $row->field }}[lng]" value="{{ $point['lng'] }}" id="lng" />
@empty
<input type="hidden" name="{{ $row->field }}[lat]" value="{{ config('voyager.googlemaps.center.lat') }}" id="lat" />
<input type="hidden" name="{{ $row->field }}[lng]" value="{{ config('voyager.googlemaps.center.lng') }}" id="lng" />
@endforelse

<script type="application/javascript">
    function initMap() {

        var createMarker = function(position, map) {
            var _marker = new google.maps.Marker({
                map: map,
                position: position,
                draggable: true
            });
            document.getElementById('lat').value = isNaN(position.lat)?position.lat():position.lat;
            document.getElementById('lng').value = isNaN(position.lng)?position.lng():position.lng;
            google.maps.event.addListener(_marker,'dragend',function(event) {
                document.getElementById('lat').value = this.position.lat();
                document.getElementById('lng').value = this.position.lng();
            });
            return _marker;
        };
        @forelse($dataTypeContent->getCoordinates() as $point)
            var center = {lat: {{ $point['lat'] }}, lng: {{ $point['lng'] }}};
        @empty
            var center = {lat: {{ config('voyager.googlemaps.center.lat') }}, lng: {{ config('voyager.googlemaps.center.lng') }}};
        @endforelse
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: {{ config('voyager.googlemaps.zoom') }},
            center: center,
        });
        var markers = [];
        @forelse($dataTypeContent->getCoordinates() as $point)
            markers.push(createMarker({lat:{{ $point['lat'] }}, lng: {{ $point['lng']}} },map));
        @empty
            markers.push(createMarker(center,map));
        @endforelse

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          markers.push(createMarker(places[0].geometry.location,map));
          map.fitBounds(bounds);
        });
    }
</script>
<input id="pac-input" class="controls" type="text" placeholder="Search Box">
<div id="map"></div>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{ config('voyager.googlemaps.key') }}&libraries=places&callback=initMap">
</script>
