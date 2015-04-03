var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

//alert("A sega de");

function foo(){
	alert('foo');
}

function initialize() {
	alert("YO");
	directionsDisplay = new google.maps.DirectionsRenderer();
	var wake_park = new google.maps.LatLng(42.431457, 27.649763);
	var myOptions = {
		zoom: 6,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		center: wake_park
	}
	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	directionsDisplay.setMap(map);
	calcRoute();
}

function calcRoute() {

	var waypts = [];


	/*stop = new google.maps.LatLng(-39.419, 175.57)
	waypts.push({
		location:stop,
		stopover:false});*/

	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(
			function(position){
				var latitude  = position.coords.latitude;
				var longitude = position.coords.longitude;
				console.log("Latitude : "+latitude+" Longitude : "+longitude);
				alert("Latitude : "+latitude+" Longitude : "+longitude);
			},
			function(){
				//alert("Geo Location not supported now");
			}
		); 
	}  	

	start  = new google.maps.LatLng(42.4274194,27.1149512); // sofia
	end = new google.maps.LatLng(42.431457, 27.649763); //gradina
	var request = {
		origin: start,
		destination: end,
		waypoints: waypts,
		optimizeWaypoints: true,
		travelMode: google.maps.DirectionsTravelMode.DRIVING
	};
	directionsService.route(request, function(response, status) {
		if (status == google.maps.DirectionsStatus.OK) {
			directionsDisplay.setDirections(response);
			var route = response.routes[0];
			console.debug(route);
			//alert(route);
		}
	});
}