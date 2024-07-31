<?php

$username = "root";
$password = "";
$server = 'localhost';
$db = 'crudop';

$con = mysqli_connect($server, $username, $password, $db);


if($con){
    // echo "Connection successful";
    ?>
    <script>
        alert('Connection successful')
    </script>

<?php
    } else {
    echo "No Connection";
    die("No connection" . mysqli_connect_error());
    }

?>