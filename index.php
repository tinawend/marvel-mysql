<?php

require_once('connect.php');

?>
<!DOCTYPE html>
</html>
<head>
<title>Marvel</title>
<link rel='stylesheet' href='style.css'>
</head>
<body>
    <h1>Movies</h1>
    <?php


$sql = "SELECT* FROM Movies";
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<a class = 'floatleft' href='info.php?ID=" . $row["ID"] . "'>" . $row["Title"]. "</a> <br>";
    }
}
$sql2 = "SELECT Title 
FROM movies 
WHERE ID IN (
SELECT MovieId 
FROM casting 
WHERE Actor='Robert Downey Jr.')";

$result2 = $conn->query($sql2);
if($result2->num_rows > 0){
    echo "<h2 class='funfact'> fun fact: Robert Downey Jr. has acted in all of these following movies </h2>";
    while($row2 = $result2->fetch_assoc()){
        echo "<p class='funfact'>" . $row2["Title"]. "</p>";
    }
}
   $conn->close();
    ?>
</body>
</html>