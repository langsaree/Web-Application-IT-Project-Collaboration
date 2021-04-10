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

  <title>ITPROMOT</title>

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
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>

    </ul>
   <!-- Right navbar links -->
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
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header"><?php echo $count; ?> Notifications</span>
            <?php
$con = mysqli_connect('localhost', 'root', '', 'projects_itproject');
$sq = "SELECT * FROM notify WHERE status=0";
$qu_num = mysqli_query($con, $query);
if (mysqli_num_rows($qu_num) > 0) {
    while ($result = mysqli_fetch_assoc($qu_num)) {
        echo '<a class="dropdown-item text-primary font-weight-light" href="read_noti.php?id=' . $result['id'] . '">' . $result['subject'] . '</a>';
        echo '<div class="dropdown-divider"></div>';

    }
} else {
    echo '<a href="#" class="dropdown-item text-danger font-weight-light"><i class="fas fa-frown"></i> Sorry! No Notification</a>';
}
?>
            <div class="dropdown-divider"></div>
          <a href="read_noti.php" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>


      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
          <?php echo $_SESSION['name']; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="../auth/logout.php" class="dropdown-item">
            <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout
          </a>
          <a href="my_profile.php" class="dropdown-item">
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
        <img src="../dist/img/n2.png" width="100%" >
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

                   <li class="nav-item has-treeview ">
            <a href="index.php" class="nav-link ">

              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashbord
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>


  <?php
$my_id = $_SESSION['id'];
$con = mysqli_connect('localhost', 'root', '', 'projects_itproject');

$query = "SELECT * FROM files WHERE by_officer = 'Waiting' or  by_officer05='Waiting'
   or by_officer09='Waiting' or  by_officer13='Waiting' ";

$query_num = mysqli_query($con, $query);
$count = mysqli_num_rows($query_num);
?>

         <li class="nav-item">
            <a href="officer_request.php" class="nav-link">
             <i class="nav-icon fa fa-paper-plane"></i>
              <p>
       Request
               <span class="badge badge-danger right"><?php echo $count; ?></span>
             </p>
            </a>
          </li>



  <li class="nav-item">
                  <a href="../officer/student_track.php" class="nav-link">
             <i class="nav-icon fa fa-paper-plane"></i>
              <p>
       Student Track              </p>
            </a>
          </li>



            <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Schedule
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="create_schedule_proposal.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Schedule Proposal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="create_schedule_project.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Schedule Project</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active active">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                News
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Annoucement.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Announcements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="show_topic.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Propose Topic </p>
                </a>
              </li>

            </ul>
          </li>

   <li class="nav-item">
                <a href="proposal_project.php" class="nav-link  ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Project Topics</p>
                </a>
              </li>

  <li class="nav-item">
            <a href="my_profile.php" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Personal Information
              </p>
            </a>
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Topic Require</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <!-- Main content -->




   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

                     <?php

$strSQL = "SELECT  news_topic.news_id,news_topic.news_topic, news_topic.news_detail, news_topic.news_date,member.member_fullname,news_topic.parent_comment_id FROM news_topic
          LEFT JOIN member ON news_topic.member_id = member.member_id
WHERE news_topic.news_id and parent_comment_id='parent_comment_id' ";
if ($objQuery = $db->query($strSQL)) {
    while ($objResult = $objQuery->fetch_object()) {

        ?>


            <div class="callout callout-info">


   <img class="img-circle img-bordered-sm" src="../dist/img/user.png" alt="user image"  width="30" height="30">
                        <span class="username" style="font-size: 15px;">
               &nbsp;&nbsp;<?php echo $objResult->member_fullname; ?>
                         <span class="float-right">
                        <span class="description" style="font-size: 13px;">Shared publicly - <?php echo $objResult->news_date; ?></span>
                      </span>
                        <!-- /.user-block -->
              <p>   <class style="font-size: 16px;">     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> <?php echo $objResult->news_topic; ?></b></p>

                      <class style="font-size: 15px;">   <?php echo $objResult->news_detail; ?>


                       <p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="float-right">
                           <a href="view_newstopic.php?id=<?php echo $objResult->news_id; ?>" >
                   Reply </a>
                        </span>
                      </p>
                     </p>
</div>
                    <!-- /.post -->
    <?php
}
}
?>

                  <!-- /.tab-pane -->

                  <!-- /.tab-pane -->


            <!-- /.nav-tabs-custom -->


    <!-- /.content -->
  </br>
  </div>
</class>
</class>
</p>
</span>
</div>
</div>
</div>
  <!-- /.content-wrapper -->

  <!-- /.content-wrapper -->
<footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <class style="font-size: 14px;">   <b>Version</b> 3.0.3-pre
      </div>
       <class style="font-size: 14px;">   <strong>Copyright &copy; 2019-2020 <a href="#">IT Project Monitoring and Tracking</a>.</strong> All rights
      reserved.
    </footer>




<!-- REQUIRED SCRIPTS -->

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
