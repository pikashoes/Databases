<?php

// Connection parameters 
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'sooji1';
$password = '315momlove';
$database = $username.'DB';

// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

// Listing tables in your database
$query = "SELECT PlayerID, PlayerName, PlayerCountry
FROM Player
WHERE PlayerPosition = 'Sub'";

$result = mysqli_query($dbcon, $query)
  or die('Show Sub table failed: ' . mysqli_error());

print "Players who play position SUBSTITUTE: <br>";

print '<ul>';
while ($tuple = mysqli_fetch_array($result)) {
	echo $tuple['PlayerID'] . ' | Player Name: ' . $tuple['PlayerName'] . ' | Country: ' . $tuple['PlayerCountry'] . '<br />';
}
print '</ul>';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 