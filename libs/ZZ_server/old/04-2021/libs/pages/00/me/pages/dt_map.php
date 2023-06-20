<style>
#i_map {
    height: 400px;
    width: 100%;
    margin-bottom: -90px;
    margin-top: 0px;
}
</style>
<div class="container-fluid  webss padtop50 new_foot mt50 bg_map">
</div>
<div class="container-fluid">
	<div class="row">
    <div class="col-md-12 nopad" >
        <div id="i_map" class="map"></div>
    </div>
    </div>
</div>
 <div class="b" style="margin: -46px 0px 90px;"></div>
<!--<?php echo $room['latitude'];?>,<br><?php echo $room['longtitude'];?>-->
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL4iy_QqditYvmqAYsZ2UP-kVUQm3uFNs&callback=initMap"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>
// Specify features and elements to define styles.
  var styleArray = [
    {
		
      featureType: "all",
      stylers: [
       { saturation: -100 }// color map black & color
      ]
    },{
      featureType: "road.arterial",
      elementType: "geometry",
      stylers: [
        { hue: "#ff2266" },
        { saturation: 80 }
      ]
    },{
      featureType: "poi.business",
      elementType: "labels",
      stylers: [
        { visibility: "off" }
      ]
    }
  ];
  
  var lati = <?php echo $room['latitude'];?>;
  var long = <?php echo $room['longtitude'];?>;
	function initialize() {
	  var myLatlng = new google.maps.LatLng(lati,long);//new google.maps.LatLng(13.698369,100.604312);
	  var mapOptions = {
		  scrollwheel: false,
		  //styles: styleArray,
		  center: {lat:lati, lng:long },//{lat: 13.698369, lng: 100.604312},
		  zoom: 14,
		center: myLatlng
	  }
	  var map = new google.maps.Map(document.getElementById('i_map'), mapOptions);
	
	  var marker = new google.maps.Marker({
		  position: myLatlng,
		  map: map,
		  title: 'Share Olanlab Com',
		  //icon:'upload/logo.png'
	  });
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php /*?><script>
var img = '/upload/logo.png';
var myLatLng = new google.maps.LatLng(13.698369,100.604312);
var beachMarker = new google.maps.Marker({
	position: myLatLng,
	map:map,
	//icon:img
});
</script>

<?php */?>








<?php /*?>
<div class="container-fluid">
    <!--<h2 class="mg-sec-left-title">Google Map</h2>-->
    <div class="row">
        <div id="i_map" class="map"></div>
    </div>
</div>

        <div class="b" style="margin: 70px 0px 90px;"></div><?php */?>
