
<?php 
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        //extract value from the $_POST array
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $emailaddress = $_POST['emailaddress'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];

        //call function to insert and track if success or not
        $isSuccess = $crud->insertChoirMember($firstname, $lastname, $emailaddress, $address, $gender); 

        if($isSuccess){
            //echo '<h1 class="text-center text-success"> You have been successfully registered</h1>';
            include 'includes/successmessage.php';
        }else{
            //echo '<h1 class="text-center text-danger"> There was an error in processing</h1>';
            include 'includes/errormessage.php';
        }
    }

?>

    <!-- This print out values that were passed to the action page using method = 'post' -->
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_POST['firstname'] . ' ' . $_POST['lastname'];?></h5>
            <h6 class="card-subtitle mb-2 text-muted">
            Email: <?php echo $_POST['emailaddress']; ?>
            </h6>

            <h6 class="card-subtitle mb-2 text-muted">
            Gender: <?php echo $_POST['gender']; ?>
            </h6>

            <h6 class="card-subtitle mb-2 text-muted">
            Address: <?php echo $_POST['address']; ?>
            </h6>
        </div>
    </div>

    <!--
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php //echo $_GET['firstname'] . ' ' . $_GET['lastname'];?></h5>
            <h6 class="card-subtitle mb-2 text-muted">
            Email: <?php //echo $_GET['email']; ?>
            </h6>

            <h6 class="card-subtitle mb-2 text-muted">
            Gender: <?php //echo $_GET['gender']; ?>
            </h6>

            <h6 class="card-subtitle mb-2 text-muted">
            Address: <?php //echo $_GET['address']; ?>
            </h6>
        </div>
    </div>
    -->

    


<?php require_once 'includes/footer.php'; ?>   