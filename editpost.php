<?php

require_once 'db/conn.php';

//get values from post operation
if(isset($_POST['submit'])){
    //extract value from the $_POST array
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $emailaddress = $_POST['emailaddress'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];


    //call crud function
    $result = $crud->editChoirMember($id, $firstname, $lastname, $emailaddress, $address, $gender);   

    //Redirect to index.php
    if($result){
        header("Location: viewrecords.php");
    }else{
        //echo "error";
        include 'includes/errormessage.php';
    }

}else{
    //echo "error message";
    include 'includes/errormessage.php';
}
?>