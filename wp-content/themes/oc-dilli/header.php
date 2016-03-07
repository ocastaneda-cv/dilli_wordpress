<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to begin 
	/* rendering the page and display the header/nav
	/*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Dilli Dalli pediatric eyewear delivers safety, durability, and comfort in an affordable collection for little ones ages newborn to 3 years old. Dilli Dalli revolutionizes the world of pediatric eyewear with its IntelliFlex™ multi-action hinge technology combined with innovative Soft Touch material.">
    <meta name="keywords" content="ClearVision, Clear Vision, Dilli Dalli, dilli dalli, kids glasses, eyeglass frames for children, pediatric eyewear, Soft Touch, IntelliFlex, Kids eyeglasses, toddler glasses, Kids prescription eyewear, eyewear for kids, safe kids eyewear, eyewear for infants, affordable kids eyewear, prescription eyeglasses for kids, dependable kids eyewear, durable kids eyewear, comfortable eyewear for kids, spring hinges">
    <meta name="author" content="">
<title>
	<?php bloginfo('name'); // show the blog name, from settings ?> | 
	<?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php // We are loading our theme directory style.css by queuing scripts in our functions.php file, 
	// so if you want to load other stylesheets,
	// I would load them with an @import call in your style.css
?>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); 
// This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
// (right here) into the head of your website. 
// Removing this fxn call will disable all kinds of plugins and Wordpress default insertions. 
// Move it if you like, but I would keep it around.
?>   

<script src="http://maps.google.com/maps/api/js?sensor=false"
            type="text/javascript"></script>
    <script type="text/javascript">
    //<![CDATA[
    var map;
    var markers = [];
    var infoWindow;
    var locationSelect;
    var scrollerStarted = false;

  function getLocation() {
    //alert('triggered');
    if (navigator.geolocation) {
    //alert('inside....');
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
  }

  function showPosition(position) {
    //alert("Latitude: " + position.coords.latitude + "\nLongitude: " + position.coords.longitude);     
    //alert(position.coords.latitude);
    //alert(position.coords.longitude);
    searchLocations('def', position);
  }

    function load() {

      map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(40, -100),
        zoom: 4,
        mapTypeId: 'roadmap',
        mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
      });
      infoWindow = new google.maps.InfoWindow();
      locationSelect = document.getElementById("nano");
    //alert('Now triggering getLocation');
    getLocation();
    /*
      locationSelect.onchange = function() {
        var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
        if (markerNum != "none"){
          google.maps.event.trigger(markers[markerNum], 'click');
        }
      };
    */
   }
   
   function onSearchPressEnter(e) {
    if (e.keyCode == 13) {
        var src = e.srcElement || e.target;
        
        if (e.preventDefault) {
            e.preventDefault();
        } else {
            e.returnValue = false;
        }
        
        searchLocations('srch','some');
    }
    
    return false;
   }

   function searchLocations(trig, pos) {
     if(trig == "srch")
     {
     var address = document.getElementById("addressInput").value;
     var country = document.getElementById("Country-Selected").value;
     if(country!="")
       {
      address += ","+country;
       }
     

     var geocoder = new google.maps.Geocoder();
     geocoder.geocode({address: address}, function(results, status) {
       if (status == google.maps.GeocoderStatus.OK) {
      //searchLocationsNear(results[0].geometry.location);
      searchLocationsNear('srch', results[0].geometry.location.lat(), results[0].geometry.location.lng());
       } else {
       alert(address + ' not found');
       }
     });
     }
     else
     {
       //alert('Inside searchLocations');
       //alert('Inside searchLocations: '+pos.coords.latitude);
       //alert('Inside searchLocations: '+pos.coords.longitude);
      searchLocationsNear('def', pos.coords.latitude, pos.coords.longitude);
     }
     return false;
   }

   function clearLocations() {
     infoWindow.close();
     for (var i = 0; i < markers.length; i++) {
       markers[i].setMap(null);
     }
     markers.length = 0;

     //locationSelect.innerHTML = "";
     jQuery('.nano-content').find('.simple-list').html('');
     //var option = document.createElement("option");
     //option.value = "none";
     //option.innerHTML = "<ol>";
     //locationSelect.appendChild(option);
   //option.innerHTML = "</ol>";
   }

   function searchLocationsNear(trigSrc, lat, lng) {
     //alert('Now Triggered: searchLocationsNear: '+lat+' --- '+lng);
     clearLocations(); 
     //var radius = document.getElementById('radiusSelect').value;
   var radius = 50;
     var searchUrl = '<?php echo get_template_directory_uri(); ?>/phpsqlsearch_genxml.php?lat=' + lat + '&lng=' + lng + '&radius=' + radius;
     //alert(searchUrl);
   downloadUrl(searchUrl, function(data) {
       var xml = parseXml(data);
       var markerNodes = xml.documentElement.getElementsByTagName("marker");
     //alert(markerNodes);
       var bounds = new google.maps.LatLngBounds();
     var searchResult = "";
     //searchResult += 
     //searchResult += "<div class=\"nano-content\">";
     //searchResult += "<h2>"+markerNodes.length+" LOCATIONS NEAR YOU</h2>";
     var locationsCount = document.getElementById('locationsCount');
     locationsCount.innerHTML = markerNodes.length+" Locations near you";
     searchResult += "";  // <ol class='simple-list'>
       for (var i = 0; i < markerNodes.length; i++) {
         var name = markerNodes[i].getAttribute("name");
         var address = markerNodes[i].getAttribute("address");
     var saddress = markerNodes[i].getAttribute("saddress");
         var distance = parseFloat(markerNodes[i].getAttribute("distance"));
         var latlng = new google.maps.LatLng(
              parseFloat(markerNodes[i].getAttribute("lat")),
              parseFloat(markerNodes[i].getAttribute("lng")));

         //createOption(name, address, distance, i);
     //alert(name);
    
    var useSourceAddress;
    if(trigSrc == "def")
       {
         useSourceAddress = lat+","+lng;
       }
    else
       {
         useSourceAddress = document.getElementById("addressInput").value;
       }

     //locationSelect.innerHTML = locationSelect.innerHTML + "<h3>"+ name +"</h3><p>"+ address +"<br /><a href=\"javascript:google.maps.event.trigger(markers["+i+"], 'click');\">GET DIRECTIONS</a></p><hr>";
     var mapURL;
     mapURL = "http://maps.google.com/maps?saddr="+useSourceAddress+"&daddr="+address;
     searchResult += "<li><h4><a href=\"javascript:google.maps.event.trigger(markers["+i+"], 'click');\">"+ name +"</a></h4><p>"+ saddress +"<br /><a href=\""+mapURL+"\" target='_blank'  class='map_link'><i class='fa fa-map-marker'></i> GET DIRECTIONS</a></p></li>";
    
     createMarker(latlng, name, address, mapURL);
         bounds.extend(latlng);
       }
     //searchResult += "</ol>";
     //searchResult += "</div>";
     //locationSelect.innerHTML = searchResult;
     jQuery('#nano').find('.nano-content > .simple-list').html(searchResult);
     //alert(locationSelect.innerHTML);
       map.fitBounds(bounds);
       locationSelect.style.visibility = "visible";
       
       // initialize or re-initialize the scroller
      //(".nano").nanoScroller({ alwaysVisible: true });
       
      });
    }
  
    function createMarker(latlng, name, address, mapURL) {
      var html = "<b><a href='"+mapURL+"' target='_blank'>" + name + "</a></b> <br/>" + address;
      var marker = new google.maps.Marker({
        map: map,
        position: latlng
      });
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
      markers.push(marker);
    }

    function createOption(name, address, distance, num) {
      //var option = document.createElement("option");
      //option.value = num;
      //locationSelect.innerHTML = "<li><h3><b>"+ name +"</b></h3><p>"+ address +"</p></li>";
      //locationSelect.appendChild(option);
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request.responseText, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function parseXml(str) {
      if (window.ActiveXObject) {
        var doc = new ActiveXObject('Microsoft.XMLDOM');
        doc.loadXML(str);
        return doc;
      } else if (window.DOMParser) {
        return (new DOMParser).parseFromString(str, 'text/xml');
      }
    }

    function doNothing() {}

    //]]>
  </script> 
    
    
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target="#navbar" onload="javascript:load();">
<div id="checkdiv" class="container-fluid">
  
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
            <div class="navbar-header">
              <!--<a id="nav-expander">
              <button type="button" class="navbar-toggle collapsed"> -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            <!--</a> -->
            
          
    <?php if ( get_header_image() ) : ?></a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand scroll-top click"><img src="<?php header_image(); ?>" class="img-responsive" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
          </div>
          
          <div id="navbar" class="navbar-right navbar-collapse collapse">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu nav navbar-nav' ) ); ?>
          </div><!--/.nav-collapse -->
        </div>
    </nav>
  
</div><!--/.main-top -->