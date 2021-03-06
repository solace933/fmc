<?php
        session_start();
     
        error_reporting(0);
        $error="";
        $msg="";
        include('includes/config.php');
        if(strlen($_SESSION['alogin'])==0)
            {	
        header('location:index.php');
        }
        else{
    
                    

?>

<!DOCTYPE html>
<html>

<body>

<?php
        require_once "public/config/header.php";
        ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title">Title</h4>
</div>
<div class="modal-body">

<?php
if (isset($_POST['edit'])) {
    $sn=$_POST['edit'];
    $name=$_POST['name'];
    $description = $_POST['description'];
    $serial_no = $_POST['snum'];
    $manufacturer = $_POST['manufacturer'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    
    $sql = "UPDATE `vehicle` SET `name`=(:name), `description`=(:description), `amount`=(:amount), `serial_no`=(:serial_no), `manufacturer`=(:manufacturer) WHERE sn=(:sn)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query-> bindParam(':serial_no', $serial_no, PDO::PARAM_STR);
    $query-> bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
    $query-> bindParam(':amount', $amount, PDO::PARAM_STR);
    $query-> bindValue(':sn', $sn, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Rent Updated Successfully";
    
    header('location:vehiclelist.php');
}
elseif (isset($_GET['s'])) {
    $sn=$_GET['s'];
    

    $sql = "SELECT * from `vehicle` WHERE sn=(:idedit)";
    $query = $dbh->prepare($sql);
    $query-> bindValue(':idedit', $sn, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetch(PDO::FETCH_OBJ);
    

?>
<form action="vehicleedit.php" method="POST" class="forma">


    <p>
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo ($results->name);?>">
    </p>


    <p>
        <label for="description">Description</label>
        <input type="text" name="description" value="<?php echo ($results->description);?>">
    </p>

    <p>
        <label for="snum">Item Serial Number</label>
        <input type="text" name="snum" value="<?php echo ($results->serial_no);?>">
    </p>

    <p>
        <label for="amount">Manufacturer</label>
        <input type="text" name="manufacturer" value="<?php echo ($results->manufacturer);?>">
    </p>

    <p>
        <label for="amount">Amount</label>
        <input type="text" name="amount" value="<?php echo ($results->amount);?>">
    </p>

    <p>
        <button type="submit" name="edit" value="<?php echo ($results->sn);?>">
            Submit
        </button>
    </p>

                                        </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-success">OK</button>
</div>

<?php
                require_once "public/config/footer.php";
                ?>

</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

</html>


<?php 
}}


?>