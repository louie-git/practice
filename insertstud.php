<?php
include('connection.php');
$success = "";
if(isset($_POST['insertdata'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $age = $_POST['age'];
    

    $query = "INSERT INTO students (stud_lname,stud_fname,stud_mname,stud_age) VALUES ('$lname','$fname','$mname','$age')";
    $query_run = mysqli_query($conn,$query);
    if($query_run){
        $success = "Data Successfully Created";
    }else{
        echo "error to save";
    }
}


if(isset($_POST['updatedata'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $age = $_POST['age'];
    $id = $_POST['upid'];
    $query = "UPDATE students SET STUD_LNAME='$lname',STUD_FNAME='$fname',STUD_MNAME='$mname',STUD_AGE='$age' where stud_id = '$id'";
    $query_run = mysqli_query($conn,$query);
    if($query_run){

        $success = "Data Successfully Updated";
    }else{
        echo "Failed to update";
    }
    mysqli_close($conn);
}
?>