var myCenter = new google.maps.LatLng(28.542381, 77.203569);
function initialize() {
  var mapCanvas = document.getElementById('map-canvas');
  var mapOptions = {
    center:myCenter,
    zoom: 17,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker=new google.maps.Marker({
    position:myCenter,
  });
  marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);

$(document).on('submit','#contact form', function(event) {
  console.log(JSON.stringify($(this).serializeObject()));
  event.preventDefault();
  $.ajax({
    type: "POST", 
    url: $(this).attr('action'),
    data: {
        _token    : $(this).find('input[name=_token]').val(),
        name : $(this).find('input[name=name]').val(),
        email   : $(this).find('input[name=email]').val(),
        phone   : $(this).find('input[name=phone]').val(),
        message   : $(this).find('input[name=message]').val()
    },
    success: function(response){ 
      console.log(response);
      helper.flash(response.message);
    }
  })
});