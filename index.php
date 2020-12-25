
<?php 
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getGender();
?>

    <h1 class="text-center">Registration as Choir member</h1>

    <!--
        Name
        Email
        Gender
        Address 
    -->

    <form method="post" action="success.php">
        <div class="mb-3">
            <label for="firstname">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>

        <div class="mb-3">
            <label for="lastname">Last Name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname">
        </div>

        <div class="mb-3">
            <label for="emailaddress" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="emailaddress" name="emailaddress" 
            aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        
        <div class="mb-3">
            <label for="gender">Gender</label>
            <select class="form-control"  id="gender" name="gender">
                <option selected>select your gender</option>  

                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value ="<?php echo $r['gender_id'] ?>"> <?php echo $r ['gender_name']; ?> </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="address">Address</label>
            <input required type="text" class="form-control" id="address" name="address">
        </div>

        <br/>
       
        <div class="custom-file">
            <input required type="file" accept="image/*" class= "custom-file-input" id="avatar" name="avatar">
            <label class="custom-file-label" for="avatar"> Choose File </label>
            <small id="avatar" class="form-text text-danger"> File upload is optional</small>
        </div>

        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button> 
    </form>

<?php require_once 'includes/footer.php'; ?>   