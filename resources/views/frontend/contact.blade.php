@extends ('layouts.master')
@section('content')
		<div class="jumbotron-fluid">
			<div id="map-canvas"></div>
			<div class="gutter-md"></div>
			<div class="container" id="contact">
				<div class="row">
					<div class="col-xs-12">
						<h5>Contact US</h5>
						<hr class="purple">
						<i class="material-icons md-18">pin_drop</i><p>58/1 2nd Floor, Kalu Sarai, Near Hauz Khas Metro Station, New Delhi - 110016, India</p><br>
						<i class="material-icons md-18">email</i><p>info@getiitians.com</p><br>
						<i class="material-icons md-18">phone</i><p>+91 9313394403</p>
					</div>
				</div>
				<div class="gutter-sm"></div>
				<form action="/contact" method="POST">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label for="name" class="form-control-label">Name :</label>
								<input type="text" class="form-control" id="name" name="name">
							</div>
							<div class="form-group">
								<label for="email" class="form-control-label">Email<span class="required">&nbsp;*&nbsp;</span> :</label>
								<input type="text" class="form-control" id="email" name="email" required>
							</div>
							<div class="form-group">
								<label for="phone" class="form-control-label">Phone :</label>
								<input type="text" class="form-control" id="phone" name="phone">
							</div>
						</div>
						<div class="col-xs-12 col-md-8">
							<div class="form-group">
								<label for="message" class="form-control-label">Message<span class="required">&nbsp;*&nbsp;</span> :</label>
								<textarea class="form-control" id="message" rows="8" name="message" required></textarea>
							</div>
						</div>
						<div class="col-xs-12 col-md-offset-10 col-md-2">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
					<div class="gutter-sm"></div>
				</form>
			</div>
		</div>
		<script src="https://maps.googleapis.com/maps/api/js"></script>
		<script type="text/javascript">
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
		</script>
@endsection