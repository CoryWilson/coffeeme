$(document).ready(function(){

  window.onload = function() {
    
    var startPos;
    var geoSuccess = function(position) {
      startPos = position;
      // document.getElementById('startLat').innerHTML = startPos.coords.latitude;
      // document.getElementById('startLon').innerHTML = startPos.coords.longitude;
    
      var data = {};
      data.lat = position.coords.latitude;
      data.lng = position.coords.longitude;

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.post('http://localhost:8888/coordinates', {lat: data.lat, lng: data.lng}, function(data){
        console.log(data);
      });

      // $.ajax({
      //   url: 'http://localhost:8888/coordinates',
      //   type: 'post',
      //   data: data,
      //   //data: JSON.stringify(data),
      //   contentType: 'application/json',
      //   jsonpCallback: 'callback',
      //   success: function(data) {
      //     console.log(data);
      //   }
      // });

    };
    var geoError = function(position) {

      console.log('Error occurred. Error code: ' + error.code);
      // error.code can be:
      //   0: unknown error
      //   1: permission denied
      //   2: position unavailable (error response from location provider)
      //   3: timed out
    };
    
    navigator.geolocation.getCurrentPosition(geoSuccess, geoError);

   // Run code
  };

});
