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

  <title>ITPROMOT|Tracking</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'><link rel="stylesheet" href="../forms/form01/style.css">
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
        echo '<a class="dropdown-item text-primary font-weight-light" href="../../read_noti.php?id=' . $result['id'] . '">' . $result['subject'] . '</a>';
        echo '<div class="dropdown-divider"></div>';

    }
} else {
    echo '<a href="#" class="dropdown-item text-danger font-weight-light"><i class="fas fa-frown"></i> Sorry! No Notification</a>';
}
?>
            <div class="dropdown-divider"></div>
          <a href="../../read_noti.php" class="dropdown-item dropdown-footer">See All Messages</a>
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
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
 <a href="../advisor/index.php" class="brand-link">
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
            <a href="../advisor/index.php" class="nav-link ">

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
$query = "SELECT advisergroup.*,  files.files_status,files.status_advisor,files.by_advisor10,advisergroup.advisergroup_id,partnergroup.group_id,partnergroup.group_number,advisergroup.member_id,member.member_id,advisergroup.advisergroup_status,files.by_advisor06 FROM advisergroup
          LEFT JOIN files ON advisergroup.advisergroup_id = files.advisergroup_id
        LEFT JOIN partnergroup ON advisergroup.group_id = partnergroup.group_id
        LEFT JOIN member ON advisergroup.member_id = member.member_id
        WHERE advisergroup.member_id = '$my_id'
        AND   advisergroup.advisergroup_status='Waiting' or files.files_status = 'Waiting'  or files.status_advisor = 'Waiting' or  files.by_advisor04='Waiting' or files.by_advisor06 ='Waiting' or by_advisor07 ='Waiting'  or files.by_advisor08 ='Waiting' or files.by_advisor10 ='Waiting'
          or files.by_advisor11 ='Waiting' or files. by_advisor12 ='Waiting'
               ";
$query_num = mysqli_query($con, $query);
$count = mysqli_num_rows($query_num);

?>
         <li class="nav-item">
            <a href="../advisor/advisor_request.php" class="nav-link ">
             <i class="nav-icon fa fa-paper-plane"></i>
              <p>
       Request
                    <span class="right badge badge-danger"><?php echo $count; ?></span>
             </p>
            </a>
          </li>


          <li class="nav-item has-treeview  menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Projects
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../advisor/proposal_status.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proposal Status</p>
                </a>
              </li>
              <li class="nav-item">
       <a href="../view track/student_track.php" class="nav-link" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Track</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="../advisor/proposal_project.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Project Topics</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item has-treeview  menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Schedule
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../advisor/display_schedule_proposal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proposal Schedule</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../advisor/display_schedule_project.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Schedule</p>
                </a>
              </li>

            </ul>
          </li>




  <li class="nav-item has-treeview  menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                News
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../advisor/Annoucement.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Annoucements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../advisor/add_general_topic.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Propose Topic </p>
                </a>
              </li>

            </ul>
          </li>

  <li class="nav-item">
            <a href="../committee/committee_request.php" class="nav-link active">
         <i class="nav-icon fa fa-tasks"></i>
              <p>
                For Committee
              </p>
            </a>
          </li>

  <li class="nav-item">
            <a href="../advisor/my_profile.php" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Personal Information
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="line_message.php" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
               Line notify
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


  <!-- PAGE CONTENT -->

        <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Track</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


      <div class="container-fluid">
        <div class="row">
     <div class="col-md-12 ">

            <!-- Profile Image -->

            <div class="card card-primary card-outline">









<!-- partial:index.partial.html -->


        <div class="form-wizard">
          <form action="check_pf3.php" method="post"  class="form-horizontal" enctype="multipart/form-data">
            <div class="form-wizard-header">
              <ul class="list-unstyled form-wizard-steps clearfix">
                      <li class="active" ><span>1</span></li>
           <li class="active" ><span>2</span></li>
                  <li class="active" ><span>3</span></li>
                <li class="active" ><span>4</span></li>
               <li class="active" ><span>5</span></li>
                <li class="active"><span>6</span></li>
                <li class="active"><span>7</span></li>
                <li class="active"><span>8</span></li>
               <li class="active"><span>9</span></li>
                <li class="active"><span>10</span></li>
                <li><span>11</span></li>
                <li><span>12</span></li>
                <li><span>13</span></li>
              </ul>
            </div>

            <fieldset class="wizard-fieldset show">
              <h5>PF10</h5>
            <?php
$id = $_GET['id'];
$strSQL = "SELECT advisergroup.*,  advisergroup.advisergroup_status,files.files_status,files.by_advisor10,files.Owner,files.advisergroup_id,files.pf,files.files_filename_project,files.files_id FROM advisergroup
          LEFT JOIN files ON advisergroup.advisergroup_id = files.advisergroup_id

        LEFT JOIN member ON advisergroup.member_id = member.member_id
        WHERE advisergroup.advisergroup_id = '$id'  ";

if ($result = $db->query($strSQL)) {
    while ($objResult = $result->fetch_object()) {
        ?>


         <fieldset>  <div style="font-size: 15px;"> 
               <?php echo get_member_list($objResult->group_id); ?>
             </div>
            </br>
              <h5>Project Presentation& Project Revision Form</h5>
           <h6><small class="text-muted">Approval Form Agreed to Approve By Advisor & Committee</small>

              </h6>
                <div class="card">
                  <div class="card-block">
                    <table class="table">
                      <thead class="thead-default">
                        <tr>
                        <th>To do list</th>
                          <th><font color='red'>Advisor</font></th>
                          <th><font color='red'>Committee</font></th>
                        </tr>
                      </thead>
                      <tbody>

                        <tr>
                          <td>1).Project Presentation
                          </br>2).Project Revision</td>

                         <td>
                          </br>Status</br>
                            <?php echo status_08($objResult->by_advisor10); ?>
                              </span> <?php echo get_advisor($objResult->group_id); ?>
                          </td>

                          <td>
                            </br>
                            <span><?php echo get_status_committee1($objResult->group_id); ?></span>
                            <p>

                          </td>

                        </tr>

                          <input type="hidden" name="files_id"  value="<?php echo $objResult->files_id; ?>">
                              <input type="hidden" name="advisergroup_id"  value="<?php echo $objResult->advisergroup_id; ?>">


                        <td class="hidden"> 5 chapters of Project Revision<p>



                                                     <br>
                <input type="hidden"
                            class="form-control"
                                                name="hdnOldFilen"                                     value="<?php echo $objResult->files_filename_project; ?>">






    <td>
<?php if ($objResult->files_filename_project != "") {?>
                      <a href="../forms/form01/download.php?pdf=<?php echo $objResult->files_filename_project; ?>">
                        <input type="button" class="btn btn-success btn-sm" value="Download File" ></a>
 <?php } else {?>
                    <a href="#"> <button class="btn btn-danger btn-xs">
                        <i class="glyphicon glyphicon-remove"> No file </i></button></a>
                    <?php }?>
                              </td>
                              <td></td>

</tr>
                      </tbody>
                    </table>



             
                    
            </fieldset>
          </form>



              </div>



              </div>



            <?php
}}
?>


 <div class="container-fluid">
        <div class="row">
     <div class="col-md-12 ">



   <link rel="stylesheet" href="../assets/comment/style.css">



  <!-- From -->
  <div class="comment-form">
    <!-- Comment Avatar -->
    <div class="comment-avatar">
         <img src="../dist/img/user1.png" >
    </div>

    <form method="post" action="check_comment10.php" class="form" name="form" ng-submit="form.$valid && cmntCtrl.addComment()" >

      <div class="form-row">
        <textarea  class="input" name="comment_content" id="comment_content"
         placeholder="Add comment..." class="form-control"   required></textarea>


      </div>



  <?php
$strSQL = "SELECT * FROM member  WHERE member_id='" . $_SESSION['id'] . "'";
?>

                        <?php
if ($result = $db->query($strSQL)) {
    while ($row = $result->fetch_object()) {
        ?>

                                <input type="text" class="form-control" name="member_id" value="<?php echo $_SESSION['name']; ?>" hidden>

<?php
}
}
?>

                   <input type="hidden" name="group_id" id="group_id"  />


          <?php
$id = $_GET['id'];

$strSQL = "SELECT advisergroup.*,  advisergroup.advisergroup_id FROM advisergroup

LEFT JOIN member ON advisergroup.member_id = member.member_id
WHERE advisergroup.advisergroup_id = '$id'  ";

if ($result = $db->query($strSQL)) {
    while ($objResult = $result->fetch_object()) {
        ?>

     <input type="hidden" name="advisergroup_id" id="advisergroup_id" value="<?php echo $objResult->advisergroup_id; ?>">
  <?php
}}
?>
          <input type="hidden" name="form_pf" id="form_pf"  value="10" />



      <div class="form-row">
        <input type="submit" value="Add Comment">
      </div>
    </form>
  </div>


  <?php
$id = $_GET['id'];

$strSQL = "SELECT advisergroup.*, partnergroup.group_number,partnergroup.group_id,advisergroup.member_id,advisergroup.group_id,advisergroup.advisergroup_id,comment.comment_content,comment.date,comment.member_id,member.member_fullname FROM advisergroup
          LEFT JOIN comment ON advisergroup.advisergroup_id = comment.advisergroup_id

          LEFT JOIN partnergroup ON advisergroup.group_id = partnergroup.group_id



        LEFT JOIN member ON advisergroup.member_id = member.member_id

        WHERE advisergroup.advisergroup_id = '$id' and form_pf='10' ";
if ($result = $db->query($strSQL)) {
    while ($objResult = $result->fetch_object()) {

        ?>



   <div class="callout callout-info">
                <img class="img-circle img-bordered-sm" src="../dist/img/user.png" alt="user image"  width="30" height="30">
<class style="font-size: 15px;">   &nbsp;&nbsp;<?php echo $objResult->member_id; ?>




                   <span class="float-right">
                        <span class="description" style="font-size: 13px;">Shared publicly - <?php echo $objResult->date; ?></span>
                      </span>
             <p>


            <class style="font-size: 15px;">    <?php echo $objResult->comment_content; ?>
            </div>




          <?php
}
}
?>


    <!-- /.content -->
   <!-- /.content -->
 
 </div>
  </div>

        </div>
      </div>
    </div>
  </section>

   </div>
     </div>

  <!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">     <class style="font-size: 12px;">
      <b>Version</b> 3.0.3-pre
    </div>
       <class style="font-size: 12px;">   <strong>Copyright© 2019-2020  <a href="#">IT Project Monitoring and Tracking</a>.</strong> All rights reserved.
  </footer>


  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>



    <!-- /.content -->

<!-- ./wrapper -->

<!-- partial -->
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script><script  src="../form01/script.js"></script>



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
