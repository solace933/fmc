<?php
session_start();

error_reporting(0);
$error = "";
$msg = "";
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['del'])) {
        $id = $_GET['del'];

        $sql = "delete from testimonial WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data Deleted successfully";
    }

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobileno = $_POST['phone_no'];
        $title = $_POST['title'];
        $cat = $_POST['category'];
        $amt = $_POST['amount'];


        $email = $_SESSION['alogin'];
        $sql = "SELECT * from member where email = (:email);";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        $cnt = 1;

        if ($query->rowCount() > 0) {
            $user = htmlentities($result->id);
            $sql = "INSERT INTO `liabilty`(`user_id`, `details`, `type-liability`, `amount`) VALUES (:user,:title,:cat,:amt)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':user', $user, PDO::PARAM_STR);
            $query->bindParam(':title', $title, PDO::PARAM_STR);
            $query->bindParam(':cat', $cat, PDO::PARAM_STR);
            $query->bindParam(':amt', $amt, PDO::PARAM_STR);
            $query->execute();
            $msg = "Feedback Send";
        }
    }

?>

    <!DOCTYPE html>
    <html>


    <?php
    require_once "public/config/header.php";
    ?>

    <body>

        <div id="wrapper">
            <?php
            require_once "public/config/left-sidebar.php";
            ?>

            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">

                    <?php
                    require_once "public/config/topbar.php";
                    ?>

                </div>
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="panel-heading" style='padding:0;'>
                        <h2 class="page-title">Manage Liabilities</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">

                        <h1><a class="btn btn-md btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i></a></h1>
                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">List Users</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb tablePreview" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $sql = "SELECT * from liabilty";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {                ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($result->user_id); ?></td>
                                                    <td><?php echo htmlentities($result->details); ?></td>
                                                    <td><?php echo htmlentities($result->amount); ?></td>
                                                    <td><?php echo htmlentities($result->created_at); ?></td>

                                                    <td>
                                                        <a data-toggle="modal" href="#edit<?= $cnt ?>" data-toggle="modal" data-target="#edit<?= $cnt ?>">&nbsp;
                                                            <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;

                                                        <div class="modal fade" id="edit<?= $cnt ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content" style="height:auto">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span></button>
                                                                        <h4 class="modal-title">Add Detail</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="liabilitylist.php" method="POST" class="forma">
                                                                            <p>
                                                                                <label for="full_name">Full Name</label>
                                                                                <input type="text" name="full_name" disabled value="<?php echo $name; ?>">
                                                                            </p>


                                                                            <p>
                                                                                <label for="phone_no">Phone Number</label>
                                                                                <input type="number" name="phone_no" disabled value="<?php echo $phone; ?>">

                                                                            </p>

                                                                            <p>
                                                                                <label for="email">Email</label>
                                                                                <input type="email" name="email" disabled value="<?php echo $email; ?>">
                                                                            </p>

                                                                            <p>
                                                                                <label for="full_name">Description</label>
                                                                                <input type="text" name="title" value="">
                                                                            </p>

                                                                            <p>
                                                                                <label for="amount">Amount</label>
                                                                                <input type="text" name="amount" value="">
                                                                            </p>

                                                                            <p>
                                                                                <select name="category" id="">
                                                                                    <option selected>Select</option>


                                                                                    <?php
                                                                                    $sql = "SELECT * FROM `type-liability`";
                                                                                    $query = $dbh->prepare($sql);
                                                                                    $query->execute();
                                                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                                                    $cnt = 1;
                                                                                    if ($query->rowCount() > 0) {
                                                                                        foreach ($results as $result) {                ?>
                                                                                            <option value="<?php echo htmlentities($result->title); ?>"><?php echo htmlentities($result->title); ?></option>
                                                                                    <?php $cnt = $cnt + 1;
                                                                                        }
                                                                                    } ?>



                                                                                </select>
                                                                            </p>

                                                                            <p>
                                                                                <button type="submit" name="submit">
                                                                                    Submit
                                                                                </button>
                                                                            </p>

                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">

                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!--end of modal-dialog-->
                                                        <a href="testimolist.php?del=<?php echo $result->id; ?>;?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
                                                    </td>
                                                </tr>
                                        <?php $cnt = $cnt + 1;
                                            }
                                        } ?>

                                    </tbody>
                                </table>
                            </div>
                            <div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:auto">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Add New Product</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="liabilitylist.php" method="POST" class="forma">
                                                <p>
                                                    <label for="full_name">Full Name</label>
                                                    <input type="text" name="full_name" disabled value="<?php echo $name; ?>">
                                                </p>


                                                <p>
                                                    <label for="phone_no">Phone Number</label>
                                                    <input type="number" name="phone_no" disabled value="<?php echo $phone; ?>">

                                                </p>

                                                <p>
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" disabled value="<?php echo $email; ?>">
                                                </p>

                                                <p>
                                                    <label for="full_name">Description</label>
                                                    <input type="text" name="title" value="">
                                                </p>

                                                <p>
                                                    <label for="amount">Amount</label>
                                                    <input type="text" name="amount" value="">
                                                </p>

                                                <p>
                                                    <select name="category" id="">
                                                        <option selected>Select</option>


                                                        <?php
                                                        $sql = "SELECT * FROM `type-liability`";
                                                        $query = $dbh->prepare($sql);
                                                        $query->execute();
                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt = 1;
                                                        if ($query->rowCount() > 0) {
                                                            foreach ($results as $result) {                ?>
                                                                <option value="<?php echo htmlentities($result->title); ?>"><?php echo htmlentities($result->title); ?></option>
                                                        <?php $cnt = $cnt + 1;
                                                            }
                                                        } ?>



                                                    </select>
                                                </p>

                                                <p>
                                                    <button type="submit" name="submit">
                                                        Submit
                                                    </button>
                                                </p>

                                            </form>


                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                    <!--end of modal-dialog-->
                                </div>
                            </div>

                        </div>

                        <!---
                <div class="col-lg-4">
                        <?php
                        //    require_once "public/config/right-sidebar.php";
                        ?>

                            </div>
                                                    -->
                    </div>








                </div>


            </div>

        </div>

        <?php
        require_once "public/config/footer.php";
        ?>

    </body>

    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

    </html>

<?php } ?>