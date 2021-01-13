<?php
if(isset($_GET['ID'])){
    require_once('connect.php');
    $ID =  $_GET['ID'];
    $sql = "SELECT * From movies WHERE Id='$ID'";
    $result = $conn->query($sql);


}
?>
<!DOCTYPE html>
</html>
<body>
    <?php
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

    ?>
</body>
</html>