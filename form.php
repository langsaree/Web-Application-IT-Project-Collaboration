<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ITPROMOT | Forms</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="auth/login.php" class="nav-link">Login</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="auth/register.php" class="nav-link">Register</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="dist/img/n2.png" width="100%">
        <span class="brand-text font-weight-light"></span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview ">
              <a href="Annoucement.php" class="nav-link ">
                <i class="nav-icon fa fa-bullhorn"></i>
                <p>
                  Announcements
                  <span class="right badge badge-danger"></span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="show_topic.php" class="nav-link">
                <i class="nav-icon fa fa-file"></i>
                <p>
                  Topics
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="proposal_project.php" class="nav-link ">
                <i class="nav-icon fa fa-book"></i>
                <p>
                  Proposal Project
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="guide.php" class="nav-link ">
                <i class="nav-icon fa fa-bars"></i>
                <p>
                  Guide
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="course_syllabus.php" class="nav-link ">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                  Schedule
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="form.php" class="nav-link active">
                <i class="nav-icon fa fa-edit"></i>
                <p>
                  Forms
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="booked.php" class="nav-link">
                <i class="nav-icon fa fa-book"></i>
                <p>
                  Books
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
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Wrapper. Contains page content -->
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
                <li class="breadcrumb-item active"> Forms</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Forms ID</th>
                      <th scope="col">Form Name</th>
                      <th scope="col">Download</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">PF01</th>
                      <td>Adviser Proposal Project Approval Letter</td>
                      <td>
                        <!--<a href="#" class="btn btn-success btn-sm " role="button" aria-pressed="true">DOC</a>-->
                        <a href="assets/forms/PF01%20-%20IT%20Project%20-%20Adviser%20Proposal%20Project%20Approval%20Letter.pdf"
                          class="btn btn-primary btn-sm " role="button" aria-pressed="true" target="_blank">PDF</a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">PF02</th>
                      <td>Officer receive copy of Project Proposal <br>
                      <small class="text-muted">This form is with officer</small>
                      </td>
                      <td>
                        <a href="assets/forms/PF02%20-%20IT%20Project%20-%20Officer%20recieve%20copy%20of%20Project%20Proposal.pdf"
                          class="btn btn-primary btn-sm " role="button" aria-pressed="true" target="_blank">PDF</a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">PF03</th>
                      <td>Project Proposal Revision Sheet <br>
                        <small class="text-muted">Student will get this form during proposal presentations
                          defend</small>
                      </td>
                      <td>
                        <a href="#" class="btn btn-primary btn-sm disabled" role="button" aria-pressed="true"
                          target="_blank">PDF</a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">PF04</th>
                      <td>Project Proposal Approval Letter <br>
                        <small class="text-muted">This form will use to insert in Proposal Booked.
                          <span class="text-danger"> Please READ and EDIT the document detail before print and get
                            signature</span>
                        </small>
                      </td>
                      <td>
                        <a href="assets/forms/PF04%20-%20IT%20Project%20-%20Project%20Proposal%20Approval%20Letter.docx"
                          class="btn btn-success btn-sm" role="button" aria-pressed="true" target="_blank">.DOCX</a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">PF05</th>
                      <td>Officer Receive Completed Project Proposal <br>
                        <small class="text-muted">This form is with officer</small>
                      </td>
                      <td>
                        <a href="assets/forms/PF05%20-%20IT%20Project%20-%20Officer%20recieve%20Complete%20Project%20Proposal.pdf"
                          class="btn btn-primary btn-sm " role="button" aria-pressed="true" target="_blank">PDF</a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">PF06</th>
                      <td>Consultation Log Book</td>
                      <td>
                        <a href="assets/forms/PF06%20-%20IT%20Project%20-%20Consultation%20Log%20Book.pdf"
                          class="btn btn-primary btn-sm " role="button" aria-pressed="true" target="_blank">PDF</a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">PF07</th>
                      <td>Project Seminar</td>
                      <td>
                        <a href="#" class="btn btn-primary btn-sm " role="button" aria-pressed="true"
                          target="_blank">PDF</a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">PF08</th>
                      <td>Adviser Project Approval Letter</td>
                      <td>
                        <a href="assets/forms/PF08%20-%20IT%20Project%20-%20Adviser%20Project%20Approval%20Letter.pdf"
                          class="btn btn-primary btn-sm " role="button" aria-pressed="true" target="_blank">PDF</a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">PF09</th>
                      <td>Officer Receive Copy Of 5 Chapters Project</td>
                      <td>
                        <a href="assets/forms/PF09%20-%20IT%20Project%20-%20Officer%20Receive%20Copy%20of%205%20Chapter%20Project.pdf"
                          class="btn btn-primary btn-sm " role="button" aria-pressed="true" target="_blank">PDF</a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">PF10</th>
                      <td>Project Revision Sheet <br>
                        <small class="text-muted">Student will get this form during project presentations defend</small>
                      </td>
                      <td>
                        <a href="#" class="btn btn-primary btn-sm disabled" role="button" aria-pressed="true"
                          target="_blank">PDF</a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">PF11</th>
                      <td>Project Approval Letter <br>
                        <small class="text-muted">This form will use to insert into Project Booked.
                          <span class="text-danger"> Please READ and EDIT the form detail before print and get
                            signature</span>
                        </small>
                      </td>
                      <td>
                        <a href="assets/forms/PF11%20-%20IT%20Project%20-%20Project%20Approval%20Letter.docx"
                          class="btn btn-success btn-sm " role="button" aria-pressed="true" target="_blank">.DOCX</a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">PF12</th>
                      <td>Free From Adviser Letter</td>
                      <td>
                        <a href="assets/forms/PF12%20-%20IT%20Project%20-%20Free%20From%20Adviser%20Letter.pdf"
                          class="btn btn-primary btn-sm " role="button" aria-pressed="true" target="_blank">PDF</a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">PF13</th>
                      <td>Officer Receive Project Booked</td>
                      <td>
                        <a href="#" class="btn btn-primary btn-sm " role="button" aria-pressed="true"
                          target="_blank">PDF</a>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>

              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="dist/js/pages/dashboard3.js"></script>
</body>

</html>