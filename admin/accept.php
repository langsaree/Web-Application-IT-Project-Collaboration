<?php
session_start();
require '../menu/connect.php';
include '../menu/function.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ITPROMOT |Approval page</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">

          <a href="../admin/index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#notify">Notify</a>
        </li>

      </ul>

      <?php
$conn = new mysqli("localhost", "root", "", "projects_itproject");
$count = 0;
if (!empty($_POST['add'])) {
    $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
    $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
    $sql = "INSERT INTO notify (subject,comment) VALUES('" . $subject . "','" . $comment . "')";
    mysqli_query($conn, $sql);
}
$sql2 = "SELECT * FROM notify WHERE status = 0";
$result = mysqli_query($conn, $sql2);
$count = mysqli_num_rows($result);
?>

      <script type="text/javascript">
        function myFunction() {
          $.ajax({
            url: "view_notification.php",
            type: "POST",
            processData: false,
            success: function (data) {
              $("#notification-count").remove();
              $("#notification-latest").show();
              $("#notification-latest").html(data);
            },
            error: function () {}
          });
        }

        $(document).ready(function () {
          $('body').click(function (e) {
            if (e.target.id != 'notification-icon') {
              $("#notification-latest").hide();
            }
          });
        });
      </script>


      <!-- Display the alert of notification -->

      <?php
$con = mysqli_connect('localhost', 'root', '', 'projects_itproject');
$query = "SELECT * FROM notify WHERE status=0";
$query_num = mysqli_query($con, $query);
$count = mysqli_num_rows($query_num);

?>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-globe" style="font-size:20px;"></i><span class="badge badge-danger"
              id="count"><?php echo $count; ?></span>

          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="../auth/logout.php" class="dropdown-item">
              <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout
            </a>
            <a href="#" class="dropdown-item">
              <i class="fas fa-user"></i>&nbsp;&nbsp;My Profile
            </a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-user"></i>
            <?php echo $_SESSION['name']; ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="../auth/logout.php" class="dropdown-item">
              <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout
            </a>
            <a href="#" class="dropdown-item">
              <i class="fas fa-user"></i>&nbsp;&nbsp;My Profile
            </a>
          </div>
        </li>
      </ul>

    </nav>
    <!-- /.navbar -->


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->


      <a href="index.php" class="brand-link">
        <img src="../dist/img/n2.png" width="100%">
        <span class="brand-text font-weight-light"></span>
      </a>




      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../dist/img/user1.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item has-treeview menu-open">
              <a href="../admin/index.php" class="nav-link ">

                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashbord
                  <span class="right badge badge-danger"></span>
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Manage User
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../admin/accept_member.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Accept Member</p>
                    <?php
$con = mysqli_connect('localhost', 'root', '', 'projects_itproject');
$query = "SELECT member_id FROM member WHERE admin_id=0";
$query_num = mysqli_query($con, $query);
$count = mysqli_num_rows($query_num);

?>
                    <span class="right badge badge-danger"><?php echo $count; ?></span>

                  </a>
                </li>
                <li class="nav-item">
                  <a href="../admin/choose_committee.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Choose Committee</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../admin/all_member.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View All Member</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                  Manage Schedule
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../admin/add_schedule_proposal.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Proposal Schedule</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../admin/add_schedule_project.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Project Schedule</p>
                  </a>
                </li>
              </ul>
            </li>



            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Projects
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="create_proposal.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Project Track</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>project proposal</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tables/jsgrid.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Project Topics</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-calendar"></i>
                <p>
                  Manage Annoucements
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="display_schedule_proposal.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Annoucements</p>
                  </a>
                </li>

              </ul>
            </li>

      


          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../admin/index.php">Home</a></li>
                <li class="breadcrumb-item active">User request</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  User Detail
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="../admin/check_confirm.php?id=<?php echo $_GET["id"]; ?>" name="fromEdit" method="post"
                  onsubmit="return checkForm()">

                  <?php

$strSQL = "SELECT * FROM member  WHERE member_id='" . $_GET['id'] . "'";
?>
                  <?php
if ($result = $db->query($strSQL)) {
    while ($objResult = $result->fetch_object()) {
        ?>
                  <div class="form-group row ">
                    <div class="col-md-2">
                      <label class="control-label col-form-label">ID card</label>
                    </div>

                    <div class="col-md-9">
                      <input type="text" class="form-control" name="member_idcard" id="member_idcard"
                        value="<?php echo $objResult->member_idcard; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-2">
                      <label class="control-label col-form-label">Fullname</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="member_fullname" id="member_fullname"
                        value="<?php echo $objResult->member_fullname; ?>"> </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-2">
                      <label class="control-label col-form-label">Usename</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="member_username" id="member_username"
                        value="<?php echo $objResult->member_username; ?>"> </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-2">
                      <label class="control-label col-form-label">Phone</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="member_phone" id="member_phone"
                        value="<?php echo $objResult->member_phone; ?>"> </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-2">
                      <label class="control-label col-form-label">Gender</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="member_gender" id="member_gender"
                        value="<?php echo gender($objResult->member_gender); ?>"> </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-2">
                      <label class="control-label col-form-label">Email Address</label>
                    </div>
                    <div class="col-md-9">
                      <div class="input-group">

                        <input type="text" class="form-control" name="member_email" id="member_email"
                          value="<?php echo $objResult->member_email; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="pull-right" align="center">

                    <input type="hidden" name="member_id" value="<?php echo $objResult->member_id; ?>" />

                    <a href="delete_approve.php?id=<?php echo $objResult->member_id; ?>" class="btn btn-danger"
                      onclick="return confirm('Are You sure Delete?')">
                      <i class="fa fa-refresh position-right"></i>Reject</a>

                    <button type="submit" class="btn btn-primary">
                      Approve
                      <i class="fa fa-arrow-right position-right"></i>
                    </button>
                  </div>


                </form>
                <?php
}
}
?>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.3-pre
      </div>
      <class style="font-size: 12px;"><strong>Copyright &copy; 2019-2020 <a href="#">IT PROJECT</a>.</strong> All rights
        reserved.
    </footer>

    <!-- /.control-sidebar -->
    <!-- ./wrapper -->

    <!--include message  -->

    <?php

include '../notification/notification.php';
?>
    <!--end for include message  -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="../dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <script src="../dist/js/demo.js"></script>
    <script src="../dist/js/pages/dashboard3.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
        });
      });
    </script>
</body>

</html>