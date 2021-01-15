<?php
require_once('connect.php');

function query1($conn){
    $sql2 = "SELECT Title 
    FROM movies 
    WHERE ID IN (
    SELECT MovieId 
    FROM casting 
    WHERE Actor='Robert Downey Jr.'
    )GROUP BY Title";

$result2 = $conn->query($sql2);
    if($result2->num_rows > 0){
        echo "<div id='right'><h2 class='funfact'> fun fact: Robert Downey Jr. has acted in all of these following movies </h2>";
        while($row2 = $result2->fetch_assoc()){
            echo "<p class='funfact'>" . $row2["Title"]. "</p>";
        }
        echo "</div>";
    }
}

function query2($conn){
    if(isset($_GET['ID'])){
        require_once('connect.php');
        $ID =  $_GET['ID'];
        $sql = "SELECT * From movies WHERE Id='$ID'";
        $result = $conn->query($sql);
    
        
    }
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            
            echo "<h1>" . $row["Title"] . "</h1>
            <p> Year: " . $row["ReleaseYear"] . "</p>
            <p> Order in the series: " . $row["OrderToWatch"] . "</p>
            <p> Rating on imbd: " . $row["Rating"] . "</p>
            <p> Genre: " . $row["Genre"] . "</p>
            <p> Plot: " . $row["Plot"] . "</p>";
        }
    }
  
}

function query3($conn){
    $ID =  $_GET['ID'];
    $sql = "SELECT Title, Actor
    FROM movies
    JOIN casting
    WHERE MovieId = '$ID'
    AND movies.ID = '$ID' ";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo "<h3>Main actors playing in the movie: </h3>";
        while($row = $result->fetch_assoc()){
            echo "<p>" . $row["Actor"] . " </p>";
        }
    }
}

function query4($conn){

    $sql = "CREATE VIEW basicInfo
    as SELECT OrderToWatch, ID, Title
    FROM movies";
    $result = $conn->query($sql);
    if ($result) {
        throw new \Exception("Error in createViewQuery ");
    }

}

function query($conn){
    $sql = "SELECT* FROM basicInfo";
    $result = $conn->query($sql);   
    if($result->num_rows > 0){
        echo "<div id='left'>";
        while($row = $result->fetch_assoc()){
            echo "<p>" . $row["OrderToWatch"]. "</p><a class = 'floatleft' href='info.php?ID=" . $row["ID"] . "'>" . $row["Title"]. "</a><br>";
        }
        echo "</div>";
    }
}

?>