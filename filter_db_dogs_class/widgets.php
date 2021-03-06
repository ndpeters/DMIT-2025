

<?php
// all these will be completed in class


///////////////////////////////////////// RANDOM
echo "<h3>Random Dogs</h3>";

$randomDog = mysqli_query($con, "SELECT * FROM dogs ORDER BY RAND() LIMIT 2");
while($row = mysqli_fetch_array($randomDog)){
    $breed = $row['breed'];
    $pooch_id = $row['pooch_id'];
    $imageFile = $row['image_file'];
    echo "<a href=\"breed.php?pooch_id=$pooch_id\"><img src=\"images/thumbs100/$imageFile\"><br/>$breed</a>" . "<br />";
}

echo "<h3>Random Dogs from a certain Category (Large Dogs)</h3>";

$randomDog = mysqli_query($con, "SELECT * FROM dogs WHERE size LIKE 'large' ORDER BY RAND() LIMIT 1");
while($row = mysqli_fetch_array($randomDog)){
    $breed = $row['breed'];
    $pooch_id = $row['pooch_id'];
    $imageFile = $row['image_file'];
    echo "<a href=\"breed.php?pooch_id=$pooch_id\"><img src=\"images/thumbs100/$imageFile\"><br/>$breed</a>" . "<br />";
}

///////////////////////////////////////


///////////////////////////////////////// POPULAR DOGS
echo "<h3>Most Popular Dog</h3>";

//// there is an UPDATE query in index.php that sets this column value, and we just ORDER BY popularity DESC here to get most popular views
$randomDog = mysqli_query($con, "SELECT * FROM dogs ORDER BY popularity DESC LIMIT 1");
while($row = mysqli_fetch_array($randomDog)){
    $breed = $row['breed'];
    $pooch_id = $row['pooch_id'];
    $imageFile = $row['image_file'];
    echo "<a href=\"breed.php?pooch_id=$pooch_id\"><img src=\"images/thumbs100/$imageFile\"><br/>$breed</a>" . "<br />";
}
///////////////////////////////////////

//////////////////////////////////////// ALPHABETICAL LIST WITH HEADINGS
// from http://www.webhostingtalk.com/showthread.php?t=717692
// user "bigfan"

echo "<h3>Alphabetical List</h3>";

/*Mysql Left Function is used to return the leftmost string character from the string.
Column Alias: 
http://www.geeksengine.com/database/basic-select/column-alias.php

*/

///////////////////////////////////////////

////////////////////////////////////////// ALPHABETICAL A - Z LINKS
echo "<h3>Alphabetical A - Z Links only</h3>";

$qry = "SELECT *, LEFT(breed, 1) AS first_char FROM dogs 
        WHERE UPPER(breed) BETWEEN 'A' AND 'Z'
        ORDER BY breed";
 
$result = mysqli_query($con,$qry);
$current_char = '';
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['first_char'] != $current_char) {
        $current_char = $row['first_char'];
		$thisChar = strtoupper($current_char);
        echo "<a href=\"index.php?displayby=breed&displayvalue=$thisChar%\">$thisChar</a> | ";
    }  
}

?>

