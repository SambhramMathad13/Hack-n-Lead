<?php
include 'connect.php';
$id = $_POST['id'];


$res = "";
$sql = "SELECT parties,msgg,votes FROM voting WHERE id = '$id'";
$ress = mysqli_query($conn, $sql);
$num=mysqli_num_rows($ress);
if (mysqli_num_rows($ress) > 0) {
    while ($row = mysqli_fetch_assoc($ress)) {

        $res = $res . "<div class='container h5 text-dark'>
            <p>" . $row['parties'] . " has got " . $row['votes'] ." votes</p>
        </div>";
    }
}
echo $res;