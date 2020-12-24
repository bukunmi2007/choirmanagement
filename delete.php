<?php
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    if(!isset($_GET['id'])){
       // echo 'error';
       include 'includes/errormessage.php'; 
       header ('Location: viewrecords.php');
    }else{
        //Get ID Values
        $id = $_GET['id'];

        //Call delete function
        $result = $crud->deleteChoirMember($id);

        //Redirect to list
        if($result){
            header("Location: viewrecords.php");
        }else{
            echo '';
        }



    }

?>
