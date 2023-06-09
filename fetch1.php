<?php
include 'connect.php';
$id = $_POST['id'];


$res = "";
$sql = "SELECT parties,msgg FROM voting WHERE id = '$id'";
$ress = mysqli_query($conn, $sql);
$num=mysqli_num_rows($ress);
if (mysqli_num_rows($ress) > 0) {
    while ($row = mysqli_fetch_assoc($ress)) {

        $res = $res . "<div class='container h5 text-dark'>
            <p>" . $row['parties'] . "</p>
            <span class='time-right h6'>" . $row['msgg'] ." </span>
        </div>";
    }
}
echo $res;