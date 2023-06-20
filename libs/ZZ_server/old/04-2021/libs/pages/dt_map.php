
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL4iy_QqditYvmqAYsZ2UP-kVUQm3uFNs&callback=initMap"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 400px;
		width:100%;
		margin-bottom: 5px;
      }
@media screen and (max-width:992px)
{
	#legend {
    font-family: Arial, sans-serif;
    background: #fff;
    padding: 10px;
    /*margin: 10px;*/
	margin-top: 15px;
    border: 3px solid #000;
	padding-top: 0px;
  }
  #map {margin-top: -32px;}
}
@media screen and (min-width:992px)
{
	#legend {
    font-family: Arial, sans-serif;
    background: #fff;
    padding: 10px;
    /*margin: 10px;*/
    border: 1px solid #000;
    padding-top: 0px;
    top: 54px;
  }
  #map {margin-top: 170px;}
}
  
</style><br><br>
   <div id="map"></div>
   <!--<div id="legend"><h3>Symbol</h3></div>-->
  
  <script>
      var map;
	  var lati_2 = <?php echo $room['latitude'];?>;
	  var long_2 = <?php echo $room['longtitude'];?>;
	  var v_name = '<?php echo $room['name'];?>';
      function initMap() {
		var myLatlng = {lat: lati_2, lng: long_2};
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 9,
          center: {lat:lati_2, lng:long_2 },
          mapTypeId: 'roadmap'
        });
		
		//--popup name
		var contentString = 
		'<div id="content">'+
		  '<div id="siteNotice">'+
		  '</div>'+
		  
		  '<div id="bodyContent">'+
			  '<b>'+v_name+'</b>' +
		  '</div>'+
      	'</div>';

	  var infowindow = new google.maps.InfoWindow({
		content: contentString
	  });
	
	  var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: v_name
	  });
	  marker.addListener('click', function() {
		infowindow.open(map, marker);
	  });
	  //--popup name
	  
	  
		//var marker = new google.maps.Marker({position: uluru, map: map});

		
		//var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
		//var iconBase = '../../../../upload/map/ok/';
		var iconBase = '../../../../upload/icomaps/';
        var icons = {
          Adventure: {
				name: 'Adventure',
				icon: iconBase + 'Adventure.png'
			},
			airport: {
				name: 'airport',
				icon: iconBase + 'airport.png'
			},
			Aquarium: {
				name: 'Aquarium',
				icon: iconBase + 'Aquarium.png'
			},
			beach: {
				name: 'beach',
				icon: iconBase + 'beach.png'
			},
			boat: {
				name: 'boat',
				icon: iconBase + 'boat.png'
			},
			buddha: {
				name: 'buddha',
				icon: iconBase + 'buddha.png'
			},
			cam: {
				name: 'cam',
				icon: iconBase + 'cam.png'
			},
			canyon: {
				name: 'canyon',
				icon: iconBase + 'canyon.png'
			},
			castle: {
				name: 'castle',
				icon: iconBase + 'castle.png'
			},
			Crocodile: {
				name: 'Crocodile',
				icon: iconBase + 'Crocodile.png'
			},
			Farm: {
				name: 'Farm',
				icon: iconBase + 'Farm.png'
			},
			golf: {
				name: 'golf',
				icon: iconBase + 'golf.png'
			},
			hospital: {
				name: 'hospital',
				icon: iconBase + 'hospital.png'
			},
			museum: {
				name: 'museum',
				icon: iconBase + 'museum.png'
			},
			Office: {
				name: 'Office',
				icon: iconBase + 'Office.png'
			},
			Restaurants: {
				name: 'Restaurants',
				icon: iconBase + 'Restaurants.png'
			},
			rocks: {
				name: 'rocks',
				icon: iconBase + 'rocks.png'
			},
			shopping: {
				name: 'shopping',
				icon: iconBase + 'shopping.png'
			},
			sport: {
				name: 'sport',
				icon: iconBase + 'sport.png'
			},
			town: {
				name: 'town',
				icon: iconBase + 'town.png'
			},
			Transport: {
				name: 'Transport',
				icon: iconBase + 'Transport.png'
			},
			Walking_Street: {
				name: 'Walking_Street',
				icon: iconBase + 'Walking_Street.png'
			},
			Water_Park: {
				name: 'Water_Park',
				icon: iconBase + 'Water_Park.png'
			},
			waterfall: {
				name: 'waterfall',
				icon: iconBase + 'waterfall.png'
			},
			water_rollerball: {
				name: 'water_rollerball',
				icon: iconBase + 'water_rollerball.png'
			},
			water_ski: {
				name: 'water_ski',
				icon: iconBase + 'water_ski.png'
			},
			yacht: {
				name: 'yacht',
				icon: iconBase + 'yacht.png'
			},
			zoo: {
				name: 'zoo',
				icon: iconBase + 'zoo.png'
			},
			fastival: {
				name: 'fastival',
				icon: iconBase + 'fastival.png'
			},
			elephant: {
				name: 'elephant',
				icon: iconBase + 'elephant.png'
			},
			cabaret: {
				name: 'cabaret',
				icon: iconBase + 'cabaret.png'
			},
			lake: {
				name: 'lake',
				icon: iconBase + 'lake.png'
			},
			hotel: {
				name: 'hotel',
				icon: iconBase + 'hotel.png'
			},
			pier: {
				name: 'pier',
				icon: iconBase + 'pier.png'
			},
			school: {
				name: 'school',
				icon: iconBase + 'school.png'
			},
			park: {
				name: 'park',
				icon: iconBase + 'park.png'
			}
			/*,
			netflix: {
				name: 'netflix',
				icon: iconBase + 'netflix.png'
			}*/
		  /*parking: {
            name: 'Parking',
            icon: iconBase + 'parking_lot_maps.png'
          },
          library: {
            name: 'Library',
            icon: iconBase + 'library_maps.png'
          },
          info: {
            name: 'Info',
            icon: iconBase + 'info-i_maps.png'
          },*/
		  
        };

         
		/*var lo_data = '<?php echo json_encode($arr_loca);?>';
		console.log(<?php echo json_encode($arr_loca);?>);*/
        var features = [
			<?php foreach($arr_loca as $lo)
			{
				?>{
					position: new google.maps.LatLng(<?php echo $lo['la'];?>, <?php echo $lo['ln'];?>),
					type: '<?php echo $lo['icon'];?>',
					name:'<?php echo $lo['name'];?>'
				  },
				<?php
			}?>
			];
          /*{
            position: new google.maps.LatLng(9.493058, 100.018793),
            type: 'library'
          }, {
            position: new google.maps.LatLng(9.493163, 100.017731),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(9.490275, 100.034768),
            type: 'info'
          }*/
        //];
		
		
		
	  
	  
	  
	   
		
		
		// Create markers.
        features.forEach(function(feature) {
          var marker = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
            map: map
          });
		  
		  
			  //--popup name 2
			var contentString_2 = 
			'<div id="content">'+
			  '<div id="siteNotice">'+
			  '</div>'+
			  
			  '<div id="bodyContent">'+
				  feature.name+
			  '</div>'+
			'</div>';
	
			  var infowindow_2 = new google.maps.InfoWindow({
				content: contentString_2
			  });
			
		  
		  
			 marker.addListener('click', function() {
				infowindow_2.open(map, marker);
			  });
		   	//--popup name 2
			
        });

        var legend = document.getElementById('legend');
        for (var key in icons) {
          var type = icons[key];
          var name = type.name;
          var icon = type.icon;
          var div = document.createElement('div');
          div.innerHTML = '<img src="' + icon + '"> ' + name;
          legend.appendChild(div);
        }
		
		if($(window).width()<976)
		{
		}
		else
		{
			//map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('legend'));
		}
		//
       // map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
	   
	  }
	 
    </script>
    
    
    <!-- Replace following script src -->
   <?php /*?><pre>
  <?php
		  foreach($ar_icon as $ic)
		  {
			  $i_name = $ic['name'];
			  ?>
				<?php echo $i_name;?>: {
					name: '<?php echo $i_name;?>',
					icon: iconBase + '<?php echo $ic['name'];?>.png'
				},<br><?php 
		  }
		  ?>   
    </pre><?php */?>
    
    
<?php /*?><?php 
		foreach($arr_map as $map)
		{
			?>
			{
				position: new google.maps.LatLng(<?php echo $map['la'];?>, <?php echo $map['lo'];?>),
				type: 'info'
			},
			<?php
		}
		?><?php */?>
		
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
<?php /*?><style>
#i_map {
    height: 400px;
    width: 100%;
    margin-bottom: -50px;
    margin-top: 0px;
}
</style><?php */?>
<?php /*?><div class="container-fluid  webss padtop50 new_foot mt50 bg_map">
</div><?php */?>
<?php /*?><div class="container-fluid">
	<div class="row">
    <div class="col-md-12 nopad" >
        <div id="i_map" class="map"></div>
    </div>
    </div>
</div>


 <div class="b" style="margin: -46px 0px 90px;"></div>
<?php */?>


<?php /*?><script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL4iy_QqditYvmqAYsZ2UP-kVUQm3uFNs&callback=initMap"></script>
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
</script><?php */?>



