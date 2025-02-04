<?php

include 'connect.php';

if(isset($_GET['deleteid'])){
    $AssetID= $_GET['deleteid'];

    $sql= "delete from `asset_reg` where AssetID=$AssetID";
    $result=mysqli_query($conn,$sql);
    if($result){
        // echo "delete succefully";
        header('location:display.php');
    }else{
        die(mysqli_error($conn));
    }

}



?>