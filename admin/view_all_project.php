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

  <title>ITPROMOT |PROJECT TOPIC</title>

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
        echo '<a class="dropdown-item text-primary font-weight-light" href="../admin/read_noti.php?id=' . $result['id'] . '">' . $result['subject'] . '</a>';
        echo '<div class="dropdown-divider"></div>';

    }
} else {
    echo '<a href="#" class="dropdown-item text-danger font-weight-light"><i class="fas fa-frown"></i> Sorry! No Notification</a>';
}
?>
            <div class="dropdown-divider"></div>
            <a href="../admin/read_noti.php" class="dropdown-item dropdown-footer">See All Messages</a>
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

            <li class="nav-item has-treeview">
              <a href="index.php" class="nav-link">

                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashbord
                  <span class="right badge badge-danger"></span>
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link ">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Manage User
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../admin/accept_member.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User Request</p>
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
                  <a href="../admin/all_member.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View All Users</p>
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
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Projects
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../admin/student_track.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Project Track</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../admin/view_all_project.php" class="nav-link active">
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
                  <a href="../admin/add_announcement.php" class="nav-link">
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
                <li class="breadcrumb-item active">View all Projects</li>
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
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddPS">
                    <i class="nav-icon fas fa-plus"></i>
                    Add New Project
                  </button>
                </h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-sm ">
                  <thead class="thead-light">
                    <tr align="center">
                      <th style="font-size: 15px;" width="4%" class="text-left">No</th>
                      <th style="font-size: 15px;" width="7%" class="text-left">Group</th>
                      <th style="font-size: 15px;" width="6%" class="text-left">Status</th>

                      <th style="font-size: 15px;" width="25%" class="text-left">Owner Project</th>
                      <th style="font-size: 15px;" width="30%" class="text-left">Topic</th>
                      <th style="font-size: 15px;" width="16%" class="text-left">Field of Study</th>

                      <th style="font-size: 15px;" width="8%" class="text-left">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

$strSQL = "SELECT topic_project.*,  topic_project.Owner,topic_project.topic_topic,topic_project.advisergroup_id,advisergroup.group_id,topic_project.topic_years,topic_project.status,topic_project.group_number,topic_project.topic_keyword,topic_project.topic_abstrack,topic_project.topic_fieldstudy FROM topic_project

          LEFT JOIN advisergroup ON topic_project.advisergroup_id = advisergroup.advisergroup_id
        LEFT JOIN member ON advisergroup.member_id = member.member_id
        LEFT JOIN partnergroup ON advisergroup.group_id = partnergroup.group_id
         WHERE topic_project.topic_id ";

$i = 1;
$count = 1;

?>
                    <?php
if ($result = $db->query($strSQL)) {
    while ($objResult = $result->fetch_object()) {
        ?>
                    <td class="text-left" style="font-size: 15px;"> <?php echo $count++; ?></td>
                    <td class="text-left" style="font-size: 15px;"><?php echo $objResult->group_number; ?></td>
                    <td class="text-left" style="font-size: 15px;"><?php echo get_status_project($objResult->status); ?>
                    </td>
                    <td class="text-left" style="font-size: 15px;"><?php echo substr($objResult->Owner, 0, 50); ?></td>
                    <td class="text-left" style="font-size: 15px;"><?php echo $objResult->topic_topic; ?></td>
                    <td class="text-left" style="font-size: 15px;">
                      <?php echo fieldstudy($objResult->topic_fieldstudy); ?></td>


<td>
<button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
                                                    data-target="#editsub<?php echo $i; ?>">
                                                  <i class="fa fa-edit" title="Edit"></i> </button></center>


          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                        data-target="#show<?php echo $i; ?>">
                      <i class="fa fa-eye"></i></button>



                  <a href="delete_project.php?id=<?php echo $objResult->topic_id; ?>"class="btn btn-danger btn-xs" onclick="return confirm('Are You sure Delete?')">
                  <i class="fa fa-trash" title="Delete"></i></a>


             
                         <div class="modal fade" id="editsub<?php echo $i; ?>" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                            <div class="modal-header bg-info">
                              <h5 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i>
                                                                Edit Information</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>


                                                        </div>

                                                <div class="modal-body">
                     <form method="post" action="check_edit_proposal.php">

                                           <div class="form-group row margin-top-10">
                                  <div class="col-md-2">
                                    <label class="control-label ">Group</label>
                                  </div>
                                  <div class="col-md-10">
       <input type="text" class="form-control" name="group_number" id="group_number" value="<?php echo $objResult->group_number; ?> ">


                                  </div>
                                </div>

                                <div class="form-group row margin-top-10">
                                  <div class="col-md-2">
                                    <label class="control-label ">Owner</label>
                                  </div>
                                  <div class="col-md-10">
       <input type="text" class="form-control" name="Owner" id="Owner" value="<?php echo $objResult->Owner; ?> ">


                                  </div>
                                </div>

                     <input type="hidden" name="topic_id" value="  <?php echo $objResult->topic_id; ?>">

                        

   <div class="form-group row">
                <div class="col-md-2">
                  <label class="control-label col-form-label">Topic</label>
                </div>
                <div class="col-md-10">
        <input type="text" class="form-control" id="topic_topic" name="topic_topic"value="<?php echo $objResult->topic_topic; ?> ">
                </div>
              </div>



         <div class="form-group row">
                <div class="col-md-2">
                  <label class="control-label col-form-label">Keyword</label>
                </div>
                <div class="col-md-10">
          <input type="text" class="form-control" name="topic_keyword" id="topic_keyword" value="<?php echo $objResult->topic_keyword; ?>">
                </div>
              </div>
             


                       <div class="form-group row">
                                                 <div class="col-md-2">
                                          <label class="control-label col-form-label">Filed of Study</label>
                                             </div>
                                         <div class="col-md-10">
                                <select class="form-control" name="topic_fieldstudy" id="topic_fieldstudy" onChange="getTeam(this.value);"  >
        <option  value="<?php echo $objResult->topic_id; ?>"><?php echo $objResult->topic_fieldstudy; ?> </option>
                                  <option value="Software Engineering">Software Engineering</option>
                                  <option value="Computer Multimedia">Computer Multimedia</option>
                                  <option value="Computer Networking">Computer Networking</option>

                                        </select>
                                          </div>
                                              </div>


        <div class="form-group row">
                <div class="col-md-2">
                  <label class="control-label col-form-label">Years</label>
                </div>
                <div class="col-md-10">
       <input type="text" class="form-control" name="topic_years" id="topic_years" value="<?php echo $objResult->topic_years; ?>
">
                </div>
              </div>
                              


                                <!--get project Proposal status -->


                                <div class="form-group row">
                                  <div class="col-md-2">
                                    <label class="control-label ">Advisor</label>
                                  </div>
                                  <div class="col-md-10">
      <input type="text" class="form-control" name="adviser" id="adviser" value="<?php echo $objResult->adviser; ?>">                   
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <div class="col-md-2">
                                    <label class="control-label ">Committee</label>
                                  </div>
                                  <div class="col-md-10">
                                    <?php echo get_committee1($objResult->group_id); ?>
                                  </div>
                                </div>

                            

    <div class="form-group row">
                                                 <div class="col-md-2">
                                          <label class="control-label col-form-label">Status</label>
                                             </div>
                                         <div class="col-md-10">
                                <select class="form-control" name="status" id="status" onChange="getTeam(this.value);"  >
        <option  value="<?php echo $objResult->topic_id; ?>"><?php echo get_status_project($objResult->status); ?> </option>
                                 <option value="1">Wait for the proposal Trail</option>
                    <option value="2">Revision Proposal</option>
                    <option value="3">OK</option>
                    <option value="4">Reject</option>
                    <option value="5">Cancel</option>
                    <option value="6">Graduate</option>
                    <option value="7">Not Pass</option>


                                        </select>
                                          </div>
                                              </div>







                                <div class="form-group row">
                                  <div class="col-md-2">
                                    <label class="control-label ">Abstrack</label>
                                  </div>
                                  <div class="col-md-10">
 <textarea class="form-control" rows="10" name="topic_abstrack" id="topic_abstrack"    >   <?php echo $objResult->topic_abstrack; ?></textarea>

                          
                                  </div>
                                </div>




                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i>
                                                                        Cancle</button>
                                                                    <button type="submit" class="btn btn-success"><i
                                                                            class="glyphicon glyphicon-ok"></i>
                                                                        Edit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
</div>

         


                      <!-- Modal -->

                      <div class="modal fade" id="show<?php echo $i; ?>" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header bg-info">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h5 class="modal-title">View Proposal</h5>
                            </div>

                            <div class="modal-body">
                              <form method="post" action="check_status.php">
                                <div class="form-group row margin-top-10">
                                  <div class="col-md-2">
                                    <label class="control-label ">Owner</label>
                                  </div>
                                  <div class="col-md-10">
                                    <?php echo $objResult->Owner; ?>

                                  </div>
                                </div>


                                <div class="form-group row">
                                  <div class="col-md-2">
                                    <label class="control-label ">Topic Project</label>
                                  </div>
                                  <div class="col-md-10">
                                    <?php echo $objResult->topic_topic; ?> </div>
                                </div>




                                <div class="form-group row">
                                  <div class="col-md-2">
                                    <label class="control-label ">Keyword</label>
                                  </div>
                                  <div class="col-md-10">
                                    <?php echo $objResult->topic_keyword; ?>
                                  </div>
                                </div>



                                <div class="form-group row">
                                  <div class="col-md-2">
                                    <label class="control-label ">Field of study</label>
                                  </div>
                                  <div class="col-md-10">
                                    <?php echo $objResult->topic_fieldstudy; ?>
                                  </div>
                                </div>




                                <div class="form-group row">
                                  <div class="col-md-2">
                                    <label class="control-label ">Years</label>
                                  </div>
                                  <div class="col-md-10">
                                    <?php echo $objResult->topic_years; ?>
                                  </div>
                                </div>



                                <!--get project Proposal status -->


                                <div class="form-group row">
                                  <div class="col-md-2">
                                    <label class="control-label ">Advisor</label>
                                  </div>
                                  <div class="col-md-10">
                                <?php echo $objResult->adviser; ?>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <div class="col-md-2">
                                    <label class="control-label ">Committee</label>
                                  </div>
                                  <div class="col-md-10">
                                    <?php echo get_committee1($objResult->group_id); ?>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <div class="col-md-2">
                                    <label class="control-label ">Status</label>
                                  </div>
                                  <div class="col-md-10">
                                    <?php echo get_status_project($objResult->status); ?>
                                  </div>
                                </div>





                                <div class="form-group row">
                                  <div class="col-md-2">
                                    <label class="control-label ">Abstrack</label>
                                  </div>
                                  <div class="col-md-10">
                                    <?php echo $objResult->topic_abstrack; ?>
                                  </div>
                                </div>




                            </div>

                            </form>
                          </div>
                        </div>
                      </div>



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



    <div id="dataModal" class="modal fade">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-info">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title"> Details</h5>
          </div>
          <div class="modal-body" id="employee_detail">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

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
            <form name="frmNotification" id="frmNotification" action="" method="post">
              <div id="form-header" class="form-row">Add New Message</div>
              <div class="form-row">
                <div class="form-label">Subject:</div>
                <div class="error" id="subject"></div>
                <div class="form-element">
                  <input type="text" name="subject" id="subject" required>

                </div>
              </div>
              <p>
                <div class="form-row">
                  <div class="form-label">Comment:</div>
                  <div class="error" id="comment"></div>
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


  <div class="modal fade" id="AddPS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header bg-info">
                              <h5 class="modal-title">Add New Project</h5>
                         <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>

                            <div class="modal-body">
        <form  method="post" action="check_proposal.php">
              <div class="form-group row margin-top-10">
                <div class="col-md-2">
                  <label class="control-label ">Group Code</label>
                </div>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="group_number" id="group_number" placeholder="Group Code">

                </div>
              </div>


              <div class="form-group row">
                <div class="col-md-2">
                  <label class="control-label col-form-label">Owner Project</label>
                </div>
                <div class="col-md-10">
             <textarea rows="2" class="form-control" id="Owner" name="Owner" placeholder=""></textarea>
                </div>
              </div>




              <div class="form-group row">
                <div class="col-md-2">
                  <label class="control-label col-form-label">Topic</label>
                </div>
                <div class="col-md-10">
                                        <input type="text" class="form-control" id="topic_topic" name="topic_topic"placeholder="Topic" autocomplete="off" required aria-describedby="basic-addon1">
                </div>
              </div>


            <div class="form-group row">
                <div class="col-md-2">
                  <label class="control-label col-form-label">Keyword</label>
                </div>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="topic_keyword" id="topic_keyword" >
                </div>
              </div>
             


<div class="form-group row">           
       <div class="col-md-2">
             <label class="control-label col-form-label">Filed of Study</label>
           </div>
             <div class="col-md-10">
                                    <select class="form-control" name="topic_fieldstudy" id="topic_fieldstudy">

        
           <option value="no"> Select Filed</option>
                                        <option value="Software Engineering">Software Engineering</option>
                                        <option value="Computer Multimedia">Computer Multimedia</option>
                                        <option value="Computer Networking">Computer Networking</option>
                                        </select>
      
            </div>
          </div>




              <div class="form-group row">
                <div class="col-md-2">
                  <label class="control-label col-form-label">Years</label>
                </div>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="topic_years" id="topic_years" placeholder="2018" >
                </div>
              </div>

 <div class="form-group row">           
       <div class="col-md-2">
             <label class="control-label col-form-label">Lecturer</label>
           </div>
             <div class="col-md-9">
             <select class="form-control" name="adviser">
              <option value="no">- Select Lecturer -</option>
                <?php
                include '../menu/connect.php';
                $strSQL = "SELECT member_fullname , member_fullname FROM member WHERE member_pos ='Lecturer'";
                if($result = $db->query($strSQL)){
                  while($objResult = $result->fetch_object()){
                    echo "<option value='".$objResult->member_fullname."'>".$objResult->member_fullname."</option>";
                  }
                }else{
                }
                ?>
              </select>
      
            </div>
          </div>


   <div class="form-group row">
                              <div class="col-md-2">
                                <label class="control-label col-form-label">Abstarck</label>

                              </div>
                              <div class="col-md-9">



  <textarea type="text" style="width: 600px; height: 200px"  class="form-control" id="topic_abstrack"
   name="topic_abstrack"> </textarea>

                              </div>

                            </div>

                      
              <!--get project Proposal status -->

                    <div class="form-group row">
                <div class="col-md-2">
                  <label class="control-label col-form-label">Proposal status</label>

                </div>
                <div class="col-md-9">
                  <select class="form-control" name="status" id="status">
                    <option value="1">Wait for the proposal Trail</option>
                    <option value="2">Revision Proposal</option>
                    <option value="3">OK</option>
                    <option value="4">Reject</option>
                    <option value="5">Cancel</option>
                    <option value="6">Graduate</option>
                    <option value="7">Not Pass</option>

                  </select>

                </div>

              </div>

      </div>

     <input type="text" class="form-control" id="position" name="position" value="1" hidden="">





  <div class="modal-footer">
   <button type="submit" class="btn btn-success">
    <i class="glyphicon glyphicon-ok"></i>
      Submit</button>                    </div>



    </div>

    </form>
    </fieldset>

    </section>
    <!-- /.content -->

  </div>

</div>

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.3-pre
      </div>
      <strong>Copyright &copy; 2019-2020 <a href="#">IT PROJECT</a>.</strong> All rights
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