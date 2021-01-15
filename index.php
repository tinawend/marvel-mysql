<?php

require_once('connect.php');
require_once('querys.php');
?>
<!DOCTYPE html>
</html>
<head>
<title>Marvel</title>
<link rel='stylesheet' href='style.css'>
</head>
<body>
    <h1>Marvel Movies: Order to watch them</h1>
    <p>click the links for more info</p>
    <div id='wrapper'>
    <?php

query4($conn);
query($conn);
query1($conn);


   $conn->close();
    ?>
    </div>
</body>
</html>