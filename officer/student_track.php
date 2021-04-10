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

  <title>ITPROMOT|Tacking</title>

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
                  <a href="../officer/student_track.php" class="nav-link active">
             <i class="nav-icon fa fa-paper-plane"></i>
              <p>
       Student Track              </p>
            </a>
          </li>




            <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Schedule
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="create_schedule_proposal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Schedule Proposal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="create_schedule_project.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Schedule Project</p>
                </a>
              </li>

            </ul>
          </li>




            <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                News
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Annoucement.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Announcements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="show_topic.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Propose Topic </p>
                </a>
              </li>

            </ul>
          </li>


     <li class="nav-item">
            <a href="proposal_project.php" class="nav-link">
             <i class="nav-icon fa fa-paper-plane"></i>
              <p>
       All project topics        </p>
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
              <li class="breadcrumb-item"><a href="../admin/index.php">Home</a></li>
              <li class="breadcrumb-item active">Track Project</li>
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
                  <i class="fas fa-edit"></i>
                  View Track of Students
                </h3>

            </div>
            <!-- /.card-header -->
           <div class="card-body">
              <table  id="example1" class="table table-sm">
                <thead class="thead-light">
                  <tr align="center">
                   <th  style="font-size: 15px;" width="10%">No</th>
                  <th  style="font-size: 15px;" width="30%">Project Title</th>
                  <th   style="font-size: 15px;" width="30%">Owner Project</th>
                  <th  style="font-size: 15px;" width="10%">Project Progress</th>
                  <th   style="font-size: 15px;" width="10%">Action</th>
                </tr>
                  </thead>
                  <tbody align="center">
        <?php

$strSQL = "SELECT advisergroup.*,  advisergroup.advisergroup_id,files.files_id,files.files_filename_proposal,files.advisergroup_id,advisergroup.advisergroup_topic,files.pf FROM advisergroup

          LEFT JOIN files ON advisergroup.advisergroup_id = files.advisergroup_id

        LEFT JOIN member ON advisergroup.member_id = member.member_id

        WHERE advisergroup.member_id ";
$i = 1;
$count = 1;
?>
        <?php
if ($result = $db->query($strSQL)) {
    while ($objResult = $result->fetch_object()) {
        ?>
                  <td class="text-left" style="font-size: 14px;" width="5%" >  <?php echo $count++; ?></td>
                   <td class="text-left" style="font-size: 14px;" width="30%" >  <?php echo $objResult->advisergroup_topic; ?></td>
                   <td class="text-left" style="font-size: 14px;" width="30%" > <?php echo get_member_list($objResult->group_id); ?></td>
                    <td class="project_progress"><div class="text-left" width="40%"  >
                          <small>
                             <?php echo $objResult->pf; ?> /13 Complete
                          </small>
                      </td>
                  <td  class="text-left"  style="font-size: 14px;" width="10%" >
             <a href="forms/check_pf.php?id=<?php echo $objResult->advisergroup_id; ?>"class="btn btn-primary btn-sm" style="font-size: 14px;"> <i class="fa fa-eye" ></i> Track </a>


                  </td>


                </tr>
            <?php
$i++;
    }
}
?>

              </table>
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



  <link rel="stylesheet" href="asset/css/style.css">

<!-- Modal -->

<div class="modal fade" id="notify">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Alert</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form name="frmNotification" id="frmNotification" action="" method="post" >
      <div id="form-header" class="form-row">Add New Message</div>
      <div class="form-row">
        <div class="form-label">Subject:</div><div class="error" id="subject"></div>
        <div class="form-element">
          <input type="text"  name="subject" id="subject" required>

        </div>
      </div>
      <p>
      <div class="form-row">
        <div class="form-label">Comment:</div><div class="error" id="comment"></div>
        <div class="form-element">
          <textarea rows="4" cols="30" name="comment" id="comment"></textarea>
        </div>
      </div>
      <div class="form-row">
        <div class="form-element">
          <input type="submit" name="add" id="btn-send" value="Submit">
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>



<footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <class style="font-size: 14px;">   <b>Version</b> 3.0.3-pre
      </div>
       <class style="font-size: 14px;">   <strong>Copyright &copy; 2019-2020 <a href="#">IT Project Monitoring and Tracking</a>.</strong> All rights
      reserved.
    </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!--include message  -->
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
