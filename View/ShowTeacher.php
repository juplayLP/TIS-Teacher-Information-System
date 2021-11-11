<?php session_start();
header("Cache-Control: public, max-age=" . 604800);
$path = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once $path . '/includes/head.php';
?>

<body class="hold-transition skin-black layout-fixed layout-footer-not-fixed sidebar-mini">
    <?php
    include_once $path . '/includes/navbar.php';
    ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php
    include_once $path . '/includes/Sidebar.php';
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <h1 class="m-0 text-dark">
                Show Teacher Details
            </h1>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="ShowTeacher.php" target="_self" method="post">
                            <div class="form-group">
                                <label>Select Teacher</label>
                                <select class="custom-select" name='teacher'>
                                    <?php
                                    require $path . '/includes/Connect.php';
                                    if ($res = $con->query('SELECT T_ID, T_FN, T_LN FROM teacher')) {
                                        $res->data_seek(0);
                                        while ($row = $res->fetch_assoc()) {
                                            if (isset($_POST["teacher"]) && $_POST["teacher"] == $row['T_ID']) {
                                                echo " <option value=" . $row['T_ID'] . " selected>" . $row['T_FN'] . " " . $row['T_LN'] . "</option>";
                                            } else {
                                                echo " <option value=" . $row['T_ID'] . ">" . $row['T_FN'] . " " . $row['T_LN'] . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-success">
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        if (isset($_POST["teacher"])) {
                            echo "
                        <div class='card'>
                            <div class='card-header'>
                                <h3 class='card-title'>General Informations</h3>
                            </div>
                        <div class='card-body p-0'>
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Shorthand</th>
                                        <th>Full/- Parttime</th>
                                        <th>Date of Entry</th>
                                        <th>seniority</th>";
                            if (isset($_SESSION["loggedin"])) {
                                echo "
                                        <th>Edit</th>
                                        <th>Delete</th>";
                            }
                            echo '
                                    </tr>
                                </thead>
                            <tbody>';
                            if ($res = $con->query('SELECT * FROM teacher,seniority where T_ID=' . $_POST["teacher"] . ' AND T_SID=S_ID;')) {
                                while ($row = $res->fetch_assoc()) {
                                    echo " <tr>
                                <th scope='row'>" . $row['T_ID'] . "</th>
                                <td>" . $row['T_FN'] . " " . $row['T_LN'] . "</td>
                                <td>" . $row['T_SH'] . "</td>
                                <td>";
                                    if ($row['T_ET'] == 1) {
                                        echo "Full Time";
                                    } else {
                                        echo "Part Time";
                                    }
                                    echo "</td>
                                <td>" . $row['T_DOE'] . "</td>
                                <td>" . $row['S_RNK'] . "</td>";
                                    if (isset($_SESSION["loggedin"])) {
                                        echo "
                                <td>
                                    <a class='btn btn-warning' style='color:white;' data-toggle='modal' data-target='#EditTeacher'>
                                        <i class='icon fas fa-pencil-ruler'></i>
                                    </a>
                                </td>
                                <td>
                                    <a class='btn btn-danger' data-toggle='modal' data-target='#DeleteTeacher' style='color:white;'>
                                        <i class='icon fas fa-trash'></i>
                                    </a>
                                </td>
                                    <div class='modal fade' id='EditTeacher' data-backdrop='static'  tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog modal-xl' role='document'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='exampleModalLabel'>Edit Teacher</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                    <form action='EditTeacher.php' target='_self' method='post'>
                                                        <div class='modal-body'>";}
                                        if ($res = $con->query('SELECT * FROM teacher,seniority where T_ID=' . $_POST["teacher"] . ' AND T_SID=S_ID')) {
                                            $res->data_seek(0);
                                            while ($row = $res->fetch_assoc()) {
                                                $ldg = $row['T_SID'];
                                                $entry = $row['T_DOE'];
                                                echo "
                                                            <div class='form-group'>
                                                                <label>Teacher ID</label>
                                                                <input type='text' class='p-0 form-control'  readonly name='teacher' value='" . $row["T_ID"] . "'></br>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label>Last name</label>
                                                                <input type='text' class='p-0 form-control' name='ln' value='" . $row['T_LN'] . "'></br>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label> first name </label>
                                                                <input type='text' class='p-0 form-control' name='fn' value='" . $row['T_FN'] . "'></br>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label> shorthand </label>
                                                                <input type='text' class='p-0 form-control' name='sh' value='" . $row['T_SH'] . "'></br>
                                                            </div>
                                                            <div class='form-check'>";
                                                if ($row['T_ET'] == 1) {
                                                    echo "<input type='checkbox' class='form-check-input' name='ET' checked id='ET'>";
                                                } else {
                                                    echo "<input type='checkbox' class='form-check-input' name='ET' id='ET'>";
                                                }
                                                echo "
                                                            <label class='form-check-label' for='ET'>Fulltime employed?</label>
                                                            </div></br>
                                                            <div class='form-group'>
                                                                <label>Date of Entry</label>
                                                                <div class='input-group' id='DOE'>
                                                                    <div class='input-group-prepend'>
                                                                        <span class='input-group-text'>
                                                                            <i class='far fa-calendar-alt'></i>
                                                                        </span>
                                                                    </div>
                                                                    <input class='form-control float-right' type='text' name='DOE id='DOE'>
                                                                    </div>
                  <script type='text/javascript'>
                    $(function () {
                        $('#DOE').datetimepicker({
                            locale: 'EN',
                            format: 'YYYY-MM-DD',
                            date: '" . $entry . "'
                            });
                        });
                  </script>
                  </div>
                  <div class='form-group'>
                    <label> Seniority </label>
                    <select class='form-control' name='Seniority'>";
                                                if ($res = $con->query('SELECT * FROM seniority')) {
                                                    $res->data_seek(0);
                                                    while ($row = $res->fetch_assoc()) {
                                                        if ($ldg == $row['S_ID']) {
                                                            echo "<option value='" . $row['S_ID'] . "' selected>" . $row['S_RNK'] . "</option>";
                                                        } else {
                                                            echo "<option value='" . $row['S_ID'] . "'>" . $row['S_RNK'] . "</option>";
                                                        }
                                                    }
                                                }
                                                echo "</select>
                  </div>";
                                            }
                                        }
                                        echo "</div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Abort and Close</button>
        <button type='submit' class='btn btn-primary'>Save</button>
      </div>
      </form>
    </div>
  </div>
</div>";} echo"
<div class='modal fade' id='DeleteTeacher' tabindex='-1' role='dialog' aria-labelledby='DeleteTeacher' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Confirm</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        Do you really want to delete the entry of the following teacher: </br>";
                                        if ($res = $con->query('SELECT T_ID, T_FN, T_LN FROM teacher WHERE T_ID=' . $_POST['teacher'])) {
                                            $res->data_seek(0);
                                            while ($row = $res->fetch_assoc()) {
                                                echo $row['T_FN'] . " " . $row['T_LN'];
                                            }
                                        }
                                        echo "</div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-outline-secondary' data-dismiss='modal'>No</button>
        <a href='DeleteTeacher.php?Teacher=" . $_POST['teacher'] . "' class='btn btn-danger'>Yes</a>
      </div>
    </div>
</div>
                                    </tr>";
                                    }
                                }
                            echo '</tbody>
                    </table>
                </div>
            </div>';
                            echo '<script type="text/javascript">
                                function klconfirm(C_ID,T_ID) {
                                  if(confirm("Möchten sie den Eintrag wirklich Löschen?")){
                                      location.href = "/View/DeleteClassTeacher.php?C_ID="+arguments[0]+"&T_ID="+arguments[1];
                                  }
                                  }
                    </script>';
                            if ($res = $con->prepare('SELECT * FROM teacher,cl_t,classes where teacher.T_ID=' . $_POST["teacher"] . ' AND teacher.T_ID=cl_t.T_ID AND cl_t.C_ID=classes.C_ID')) {
                                $res->execute();
                                $res->store_result();
                                if ($res->num_rows > 0) {
                                    echo '<div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">Class Teacher</h3>
                        </div>
                        <div class="card-body p-0">
                        <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Class</th>
                            <th>Shorthand</th>
                            <th>Status</th>';
                                    if (isset($_SESSION["loggedin"])) {
                                        echo "
                            <th>Edit</th>
                            <th>Delete</th>";
                                    }
                                    echo '
                        </tr>
                        </thead>
                        <tbody>';
                                    if ($rest = $con->query('SELECT * FROM teacher,cl_t,classes where teacher.T_ID=' . $_POST["teacher"] . ' AND teacher.T_ID=cl_t.T_ID AND cl_t.C_ID=classes.C_ID')) {
                                        $rest->data_seek(0);
                                        $i = 0;
                                        while ($row = $rest->fetch_assoc()) {
                                            $i = $i + 1;
                             echo " <tr>
                                        <th scope='row'>" . $row['C_ID'] . "</th>
                                        <td>" . $row['C_D'] . "</td>
                                        <td>" . $row['C_SH'] . "</td>
                                        <td>";
                                            if ($row['CT_S'] == 0) {
                                                echo "Supplementary Classteacher";
                                            } else {
                                                echo "Classteacher";
                                            }
                                            if(isset($_SESSION["loggedin"])){echo " </td>
                                        
                                        <td>
                                        <form class='hide' action='ShowTeacher.php?EditKL=true' target='_self' method='post'>
                                            <input type='text' style='display:none;' class='p-0 hide form-control' name='Lehrer' value='" . $_POST['teacher'] . "'>
                                            <input type='text' style='display:none;'  class='p-0 hide form-control' name='KID' value='" . $row['C_ID'] . "'>
                                            <button class='btn btn-warning' type='submit' style='color:white;' '><i class='icon fas fa-pencil-ruler'></i></a>
                                        </form></td>
                                        <td><a class='btn btn-danger' onclick='klconfirm(" . $row['C_ID'] . "," . $row['T_ID'] . ")' style='color:white;'><i class='icon fas fa-trash'></i></a></td>
                                    </tr>";
                                        }else{echo "</td></tr>";
                                        }}
                                        echo "</tbody></table></div>";
                                        if ($rest->num_rows < 2) {
                                            if(isset($_SESSION["loggedin"])){
                                            echo '<div class="card-footer">
                            <a class="btn btn-success" style="color:white;" data-toggle="modal" data-target="#Classteacher1"><i class="nav-icon fas fa-plus" ></i> Hinzuf&uuml;gen</a>
                            </div>';
                                        }}
                                    }
                                } else {
                                    echo '<div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Class Teacher</h3>
                            </div>';
                                 if(isset($_SESSION["loggedin"]))  {
                            echo'<div class="card-body">
                                <a class="btn btn-success" style="color:white;" data-toggle="modal" data-target="#ClassTeacher1"><i class="nav-icon fas fa-plus"></i> Add</a>
                            </div>';}

                                }
                                echo "</div>
 <div class='modal fade' id='ClassTeacher1' tabindex='-1' role='dialog' aria-labelledby='ClassTeacherLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='ClassTeacherLabel'>Assign Class Teacher</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        
      <div class='modal-footer'>
        <button type='button' class='btn btn-outline-secondary' data-dismiss='modal'>No</button>
        <a href='AddClassTeacher.php?' class='btn btn-danger'>Ja</a>
      </div>
    </div>
</div>
</div>
</div>";
                                if (isset($_POST["KID"])&&isset($_GET["EditKL"])){
                                  echo "  <script>
                                    $(document).ready(function(){
                                        $('#Klassenlehrer2').modal('show');
                                    });
                                    </script>
                                 <div class='modal show fade' id='ClassTeacher2' tabindex='-1' role='dialog' aria-labelledby='ClassTeacher2' aria-hidden='true'>
                                            <div class='modal-dialog' role='document'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='exampleModalLabel'>Edit</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action='EditClassTeacher.php' method='post'>
                                                    <div class='modal-body'>
                                                     <input type='text' readonly style='display:none;' class='p-0 hide form-control' name='Teacher' value='" . $_POST['teacher'] . "'>
                                                     <input type='text' readonly style='display:none;'  class='p-0 hide form-control' name='CID' value='" . $_POST['CID'] . "'>
                                                    <div class='form-group' style='margin-left:20px;margin-top:25px;'>";
                                                     if ($rest = $con->query('SELECT * FROM teacher,cl_t,classes where teacher.T_ID=' . $_POST["teacher"] . ' AND teacher.T_ID=cl_t.T_ID AND cl_t.C_ID='.$_POST['CID'].' AND cl_t.C_ID=classes.C_ID'))
                                                         $rest->data_seek(0);
                                                        while ($row = $rest->fetch_assoc()) {
                                                    if ($row['KL_status'] == 1) {
                                                    echo "<input type='checkbox' class='form-check-input' name='KLStat' checked id='KLStat'>";
                                                } else {
                                                    echo "<input type='checkbox' class='form-check-input' name='KLStat' id='KLStat'>";
                                                }}
                                                echo "
                                                            <label class='form-check-label' for='KLStat'>Zuständiger Klassenlehrer?</label>
                                                            </div></div></br>
                                
      <div class='modal-footer'>
        <button type='button' class='btn btn-outline-secondary' data-dismiss='modal'>No</button>
        <button type='submit' class='btn btn-primary'>Yes</a>
      </div>
    </div>
  </div>
</div>";}
                                echo " ";
                            }
                            if ($res = $con->prepare('SELECT * FROM teacher,thf,faculties where teacher.T_ID=' . $_POST["teacher"] . ' AND teacher.T_ID=thf.T_ID AND thf.F_ID=faculties.F_ID')) {
                                $res->execute();
                                $res->store_result();
                                if ($res->num_rows > 0) {
                                    echo '<div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">Faculties</h3>
                        </div>
                        <div class="card-body p-0">
                        <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Descriptor</th>';
                                    if (isset($_SESSION["loggedin"])) {
                                        echo "
                            <th>Edit</th>
                            <th>Delete</th>";
                                    }
                                    echo '
                        </tr>
                        </thead>
                        <tbody>';
                                    if ($res = $con->query('SELECT * FROM teacher,thf,faculties where teacher.T_ID=' . $_POST["teacher"] . ' AND teacher.T_ID=thf.T_ID AND thf.F_ID=faculties.F_ID')) {
                                        $res->data_seek(0);
                                        $x = 1;
                                        while ($row = $res->fetch_assoc()) {
                                            echo " <tr>
                                        <th scope='row'>" . $x . "</th>
                                        <td>" . $row['F_Bez'] . "</td>";
                                            if (isset($_SESSION["loggedin"])) {
                                        echo "
                                        <td><a class='btn btn-warning' style='color:white;' data-toggle='modal' data-target='#Fakulta1'><i class='icon fas fa-pencil-ruler'></i></a></td>
                                        <td><a class='btn btn-danger' style='color:white;' data-toggle='modal' data-target='#Fakulta2'><i class='icon fas fa-trash'></i></a></td>";}
                          echo"</tr>";
                                            $x = $x + 1;
                                        }
                                        echo "</tbody>
                    </table>
                </div>";
                                        if ($x < 2&&isset($_SESSION["loggedin"])) {
                                            echo '<div class="card-footer">
                        <a class="btn btn-success" style="color:white;"><i class="nav-icon fas fa-plus"></i> Hinzuf&uuml;gen</a>
                     </div>';
                                        }
                                        echo "</div></div>";
                                    }
                                } else {
                                    echo '<div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Fakultas</h3>
                        </div>';
                                    if(isset($_SESSION["loggedin"])){
                                        echo'                                    
                        <div class="card-body">
                        <a class="btn btn-success" style="color:white;"><i class=\'nav-icon fas fa-plus\'></i> Hinzuf&uuml;gen</a>
                        </div>';}
                                    echo'
                        </div>
                        </div>';
                                }
                            }
                            echo "<div class=col-md-6>";
                            if ($res = $con->prepare('SELECT * FROM teacher,thcc,certificates where teacher.L_ID=' . $_POST["teacher"] . ' AND teacher.T_ID=thcc.T_ID AND thcc.C_ID=certificates.C_ID')) {
                                $res->execute();
                                $res->store_result();
                                if ($res->num_rows > 0) {
                                    echo '<div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">Certificate Courses</h3>
                        </div>
                        <div class="card-body p-0">
                        <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Descriptor</th>
                            <th>Date of Obtaining</th>
                            <th>Comments</th>
                            ';
                                    if (isset($_SESSION["loggedin"])) {
                                        echo "
                            <th>Edit</th>
                            <th>Delete</th>";
                                    }
                                    echo '
                        </tr>
                        </thead>
                        <tbody>';
                                    if ($res = $con->query('SELECT * FROM teacher,thcc,certificates where teacher.T_ID=' . $_POST["teacher"] . ' AND teacher.T_ID=thcc.T_ID AND thcc.CC_ID=certificates.CC_ID')) {
                                        $res->data_seek(0);
                                        $i = 1;
                                        while ($row = $res->fetch_assoc()) {
                                            echo " <tr>
                                        <th scope='row'>" . $i . "</th>
                                        <td>" . $row['CC_Desc'] . "</td>
                                        <td>" . $row['CC_DOR'] . "</td>
                                        <td>" . $row['CC_Comm'] . "</td>";
                                             if (isset($_SESSION["loggedin"])) {
                                        echo "
                                        <td><a class='btn btn-warning' style='color:white;' data-toggle='modal' data-target='#ZK1'><i class='icon fas fa-pencil-ruler'></i></a></td>
                                        <td><a class='btn btn-danger' style='color:white;' data-toggle='modal' data-target='#ZK2'><i class='icon fas fa-trash'></i></a></td>";}
                                             echo"</tr>";
                                            $i = $i + 1;
                                        }
                                        echo "</tbody>
                    </table>
                </div>";
                                        if (isset($_SESSION["loggedin"])) {
                                        echo "
                <div class='card-footer'>
                    <a class='btn btn-success' style='color:white;'><i class='nav-icon fas fa-plus'></i> Add</a>
                </div>";}
                                        echo"</div>";
                                    }
                                } else {
                                    echo '<div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Certificate Courses</h3>
                        </div>';
                                    if (isset($_SESSION["loggedin"])) {
                                        echo '
                        <div class="card-body">
                        <a class="btn btn-success" style="color:white;"><i class=\'nav-icon fas fa-plus\'></i> Add</a>
                        </div>';}
                                    echo'</div>';
                                }
                            }
                            if ($res = $con->prepare('SELECT * FROM teacher,twot,task where teacher.T_ID=' . $_POST["teacher"] . ' AND teacher.T_ID=twot.T_ID AND twot.TASK_ID=task.TASK_ID')) {
                                $res->execute();
                                $res->store_result();
                                if ($res->num_rows > 0) {
                                    echo '<div class="card">
                        <div class="card-header">
                            <h3 class="card-title">tasks</h3>
                        </div>
                        <div class="card-body p-0">
                        <table class="table table-head-fixed text-wrap" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Descriptor</th>
                            <th>Comment';
                                    if (isset($_SESSION["loggedin"])) {
                                        echo "
                            <th>Edit</th>
                            <th>Delete</th>";
                                    }
                                    echo '
                        </tr>
                        </thead>
                        <tbody>';
                                    if ($res = $con->query('SELECT * FROM teacher,twot,task where teacher.T_ID=' . $_POST["teacher"] . ' AND teacher.T_ID=lehrer_bearbeitet_aufgaben.L_ID AND lehrer_bearbeitet_aufgaben.A_ID =aufgaben.A_ID')) {
                                        $res->data_seek(0);
                                        $i = 1;
                                        while ($row = $res->fetch_assoc()) {
                                            echo " <tr>
                                        <th scope='row'>" . $i . "</th>
                                        <td>" . $row['A_Bez'] . "</td>
                                        <td>" . $row['A_Kommentar'] . "</td>";
                                            if (isset($_SESSION["loggedin"])) {
                                        echo "
                                        <td><a class='btn btn-warning' style='color:white;' data-toggle='modal' data-target='#Fakulta1'><i class='icon fas fa-pencil-ruler'></i></a></td>
                                        <td><a class='btn btn-danger' style='color:white;' data-toggle='modal' data-target='#Fakulta2'><i class='icon fas fa-trash'></i></a></td>";}
                                        echo"</tr>";
                                            $i = $i + 1;
                                        }
                                        echo "</tbody>
                    </table>
                </div>";
                                        if (isset($_SESSION["loggedin"])) {
                                        echo "
                <div class='card-footer'>
                    <a class='btn btn-success' style='color:white;'><i class='nav-icon fas fa-plus'></i> Hinzuf&uuml;gen</a>
                </div>";}
                                        echo"</div> </div>";
                                    }
                                } else {
                                    echo '<div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Aufgaben</h3>
                        </div>';
                                    if (isset($_SESSION["loggedin"])) {
                                        echo '
                        <div class="card-body">
                        <a class="btn btn-success" style="color:white;"><i class=\'nav-icon fas fa-plus\'></i> Hinzuf&uuml;gen</a>
                        </div>';}
                                    echo' </div> ';
                                }
                            }
                        ?>
                    </div>
                </div>
                <noscript>
                    <p>This Site Requires Javascript to be enabled to work. please enable Javascript.</p>
                </noscript>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
    <?php
    include_once $path . '/includes/Footer.php';
    ?>
