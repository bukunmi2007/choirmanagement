
<?php 
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require_once 'sendemail.php';

    if(isset($_POST['submit'])){
        //extract value from the $_POST array
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $emailaddress = $_POST['emailaddress'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];

        $orig_file = $_FILES['avatar']["tmp_name"];
        $ext = pathinfo($_FILES['avatar']["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$emailaddress.$ext";
        move_uploaded_file($orig_file, $destination);

       //exit();
        
        //call function to insert and track if success or not
        $isSuccess = $crud->insertChoirMember($firstname, $lastname, $emailaddress, $address, $gender, $destination); 
        $genderName = $crud->getGenderById($gender);


        if($isSuccess){
            SendEmail::SendMail($emailaddress, 'Welcome to City of Refuge Choir', 
            'You have successfully registered to become a part of City of Refuge\'s choir.');
            //echo '<h1 class="text-center text-success"> You have been successfully registered</h1>';
            include 'includes/successmessage.php';
        }else{
            //echo '<h1 class="text-center text-danger"> There was an error in processing</h1>';
            include 'includes/errormessage.php';
        }
    }

?>

    <!-- This print out values that were passed to the action page using method = 'post' -->
    <img src="<?php echo $destination; ?>" class="rounded-circle" style="width: 30%; height:30%" />

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_POST['firstname'] . ' ' . $_POST['lastname'];?></h5>
            <h6 class="card-subtitle mb-2 text-muted">
            Email: <?php echo $_POST['emailaddress']; ?>
            </h6>

            <h6 class="card-subtitle mb-2 text-muted">
            Gender: <?php echo $genderName['gender_name']; ?>
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