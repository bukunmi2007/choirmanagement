<?php 
    $title = 'View Record';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //Get choir memeber by id

    if(!isset($_GET['id'])){
        echo "<h1 class='text-danger'> Please check ddetails and try again </h1>";
    }else{
        $id = $_GET['id'];
        $results = $crud->getChoirMemberDetails($id);
    
?>

<div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $results['firstname'] . ' ' . $results['lastname'];?></h5>
            <h6 class="card-subtitle mb-2 text-muted">
            Email: <?php echo $results['emailaddress']; ?>
            </h6>

            <h6 class="card-subtitle mb-2 text-muted">
            Gender: <?php echo $results['gender_name']; ?>
            </h6>

            <h6 class="card-subtitle mb-2 text-muted">
            Address: <?php echo $results['address']; ?>
            </h6>
        </div>
</div>
<br/>
        <a href= "viewrecords.php" class = "btn btn-info"> Back to List</a> 
        <a href= "edit.php?id=<?php echo $results['choir_member_id'] ?> " class = "btn btn-warning"> Edit </a> 
        <a onclick="return confirm('Are you sure you want to delete this record');" 
        href= "delete.php?id=<?php echo $results['choir_member_id'] ?> " class = "btn btn-danger"> Delete </a>

<?php } ?>

<?php require_once 'includes/footer.php'; ?>   