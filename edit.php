
<?php 
    $title = 'Edit Record';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    $results = $crud->getGender();

    if(!isset($_GET['id'])){
        //echo "error message";
        include 'includes/errormessage.php';
        header ('Location: viewrecords.php');

    }else{
        $id = $_GET['id'];
        $choirmember = $crud->getChoirMemberDetails($id);
    
?>

    <h1 class="text-center">Edit Record</h1>

    <!--
        Name
        Email
        Gender
        Address 
    -->

    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $choirmember['choir_member_id']?>" />
        <div class="mb-3">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" value="<?php echo $choirmember['firstname']?>" 
            id="firstname" name="firstname">
        </div>

        <div class="mb-3">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $choirmember['lastname']?>" 
            id="lastname" name="lastname">
        </div>

        <div class="mb-3">
            <label for="emailaddress" class="form-label">Email address</label>
            <input type="email" class="form-control" value="<?php echo $choirmember['emailaddress']?>"
            id="emailaddress" name="emailaddress" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        
        <div class="mb-3">
            <label for="gender">Gender</label>
            <select class="form-control"  id="gender" name="gender">
                <option selected>select your gender</option>  
                    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                        <option value ="<?php echo $r['gender_id'] ?>" 
                        
                        <?php if($r['gender_id'] == $choirmember['gender_id']) echo 'selected' ?>> 
                        
                        <?php echo $r ['gender_name']; ?> </option>
                    <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" value="<?php echo $choirmember['address']?>"
            id="address" name="address">
        </div>
       
        <a href="viewrecords.php" class="btn btn-info">Back to List</a> 
        <button type="submit" name="submit" class="btn btn-success">Save Changes</button> 
    </form>

    <?php } ?>

<?php require_once 'includes/footer.php'; ?>   