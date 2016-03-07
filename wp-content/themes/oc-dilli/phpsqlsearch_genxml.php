<?php


//===================
// Opens a connection to a mySQL server

$username = "root";
$password = "sqlpass425";
$database = "store"; 

$connection = mysql_connect ("cvowebdb.cmdtp3il6de2.us-east-1.rds.amazonaws.com:3306", $username, $password);
if (!$connection) {
  die("Not connected : " . mysql_error());
}

// Set the active mySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ("Can\'t use db : " . mysql_error());
}

// Get parameters from URL

$center_lat = $_GET["lat"];
$center_lng = $_GET["lng"];
$radius = $_GET["radius"];

// Search the rows in the markers table
$query = sprintf("SELECT address, name, phone, lat, lng, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM cvo_dd_store_locator ORDER BY distance LIMIT 0 , 20",
  $center_lat,
  $center_lng,
  $center_lat);
  //echo $query;

$result = mysql_query($query);
if (!$result) {
  die("Invalid query: " . mysql_error());
}
//=========




// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);



header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = mysql_fetch_array($result)){
	if($row['distance'] <= 100)
	{
	  $useAddress = $row['address'];
	  $showAddress = $row['address'];
	  if(isset($row['phone']) && ($row['phone']!=""))
	  $showAddress .= "<br>".formatPhone($row['phone']);
	  $node = $dom->createElement("marker");
	  $newnode = $parnode->appendChild($node);
	  $newnode->setAttribute("name", $row['name']);
	  $newnode->setAttribute("address", $useAddress);
	  $newnode->setAttribute("saddress", $showAddress);
	  /*
	  $node = $dom->createElement("marker");
	  $newnode = $parnode->appendChild($node);
	  $newnode->setAttribute("name", $row['name']);
	  $newnode->setAttribute("address", $row['address']);
	  */
	  $newnode->setAttribute("lat", $row['lat']);
	  $newnode->setAttribute("lng", $row['lng']);
	  $newnode->setAttribute("distance", $row['distance']);
	}
}

echo $dom->saveXML();

function formatPhone($no)
{
	$no = substr($no,0,3)."-".substr($no,3,-4)."-".substr($no,-4);
	return $no;
}
?>