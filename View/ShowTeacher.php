<?php session_start();
header("Cache-Control: public, max-age=" . 604800);
$path = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html lang="de">
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
                Lehrer Anzeigen
            </h1>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="ShowTeacher.php" target="_self" method="post">
                            <div class="form-group">
                                <label>Lehrer Ausw&auml;hlen</label>
                                <select class="custom-select" name='Lehrer'>
                                    <?php
                                    require $path . '/includes/Connect.php';
                                    if ($res = $con->query('SELECT L_ID, L_Vorname, L_Nachname FROM lehrer')) {
                                        $res->data_seek(0);
                                        while ($row = $res->fetch_assoc()) {
                                            if (isset($_POST["Lehrer"]) && $_POST["Lehrer"] == $row['L_ID']) {
                                                echo " <option value=" . $row['L_ID'] . " selected>" . $row['L_Vorname'] . " " . $row['L_Nachname'] . "</option>";
                                            } else {
                                                echo " <option value=" . $row['L_ID'] . ">" . $row['L_Vorname'] . " " . $row['L_Nachname'] . "</option>";
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
                        if (isset($_POST["Lehrer"])) {
                            echo "
                        <div class='card'>
                            <div class='card-header'>
                                <h3 class='card-title'>Allgemeine Informationen</h3>
                            </div>
                        <div class='card-body p-0'>
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>K&uuml;rzel</th>
                                        <th>VZ/TZ</th>
                                        <th>Eintrittsdatum</th>
                                        <th>Dienstgrad</th>";
                            if (isset($_SESSION["loggedin"])) {
                                echo "
                                        <th>Bearbeiten</th>
                                        <th>Löschen</th>";
                            }
                            echo '
                                    </tr>
                                </thead>
                            <tbody>';
                            if ($res = $con->query('SELECT * FROM lehrer,dienstgrad where L_ID=' . $_POST["Lehrer"] . ' AND L_DID=D_ID')) {
                                $res->data_seek(0);
                                while ($row = $res->fetch_assoc()) {
                                    echo " <tr>
                                <th scope='row'>" . $row['L_ID'] . "</th>
                                <td>" . $row['L_Vorname'] . " " . $row['L_Nachname'] . "</td>
                                <td>" . $row['L_Kuerzel'] . "</td>
                                <td>";
                                    if ($row['L_VZTZ'] == 1) {
                                        echo "Vollzeit";
                                    } else {
                                        echo "Teilzeit";
                                    }
                                    echo "</td>
                                <td>" . $row['L_Eintritt'] . "</td>
                                <td>" . $row['D_Bez'] . "</td>";
                                    if (isset($_SESSION["loggedin"])) {
                                        echo "
                                <td>
                                    <a class='btn btn-warning' style='color:white;' data-toggle='modal' data-target='#LehrerBearbeiten'>
                                        <i class='icon fas fa-pencil-ruler'></i>
                                    </a>
                                </td>
                                <td>
                                    <a class='btn btn-danger' data-toggle='modal' data-target='#LehrerLoeschen' style='color:white;'>
                                        <i class='icon fas fa-trash'></i>
                                    </a>
                                </td>
                                    <div class='modal fade' id='LehrerBearbeiten' data-backdrop='static'  tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog modal-xl' role='document'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='exampleModalLabel'>Lehrer Bearbeiten</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                    <form action='EditTeacher.php' target='_self' method='post'>
                                                        <div class='modal-body'>";
                                        if ($res = $con->query('SELECT * FROM lehrer,dienstgrad where L_ID=' . $_POST["Lehrer"] . ' AND L_DID=D_ID')) {
                                            $res->data_seek(0);
                                            while ($row = $res->fetch_assoc()) {
                                                $ldg = $row['L_DID'];
                                                $eintritt = $row['L_Eintritt'];
                                                echo "
                                                            <div class='form-group'>
                                                                <label>Lehrer-Identifikationsnummer</label>
                                                                <input type='text' class='p-0 form-control'  readonly name='Lehrer' value='" . $row["L_ID"] . "'></br>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label>Name</label>
                                                                <input type='text' class='p-0 form-control' name='Name' value='" . $row['L_Nachname'] . "'></br>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label> Vorname </label>
                                                                <input type='text' class='p-0 form-control' name='Vorname' value='" . $row['L_Vorname'] . "'></br>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label> K&uuml;rzel </label>
                                                                <input type='text' class='p-0 form-control' name='Kuerzel' value='" . $row['L_Kuerzel'] . "'></br>
                                                            </div>
                                                            <div class='form-check'>";
                                                if ($row['L_VZTZ'] == 1) {
                                                    echo "<input type='checkbox' class='form-check-input' name='VZTZ' checked id='VZTZ'>";
                                                } else {
                                                    echo "<input type='checkbox' class='form-check-input' name='VZTZ' id='VZTZ'>";
                                                }
                                                echo "
                                                            <label class='form-check-label' for='VZTZ'>Auf Vollzeit angestellt?</label>
                                                            </div></br>
                                                            <div class='form-group'>
                                                                <label>Eintrittsdatum</label>
                                                                <div class='input-group' id='Eintrittdtp'>
                                                                    <div class='input-group-prepend'>
                                                                        <span class='input-group-text'>
                                                                            <i class='far fa-calendar-alt'></i>
                                                                        </span>
                                                                    </div>
                                                                    <input class='form-control float-right' type='text' name='Eintritt' id='Eintritt'>
                                                                    </div>
                  <script type='text/javascript'>
                    $(function () {
                        $('#Eintritt').datetimepicker({
                            locale: 'de',
                            format: 'YYYY-MM-DD',
                            date: '" . $eintritt . "'
                            });
                        });
                  </script>
                  </div>
                  <div class='form-group'>
                    <label> Dienstgrad </label>
                    <select class='form-control' name='Dienstgrad'>";
                                                if ($res = $con->query('SELECT * FROM dienstgrad')) {
                                                    $res->data_seek(0);
                                                    while ($row = $res->fetch_assoc()) {
                                                        if ($ldg == $row['D_ID']) {
                                                            echo "<option value='" . $row['D_ID'] . "' selected>" . $row['D_Bez'] . "</option>";
                                                        } else {
                                                            echo "<option value='" . $row['D_ID'] . "'>" . $row['D_Bez'] . "</option>";
                                                        }
                                                    }
                                                }
                                                echo "</select>
                  </div>";
                                            }
                                        }
                                        echo "</div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Schlie&szlig;en</button>
        <button type='submit' class='btn btn-primary'>Speichern</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class='modal fade' id='LehrerLoeschen' tabindex='-1' role='dialog' aria-labelledby='LehrerLoeschen' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Best&auml;tigen</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        Möchten sie den Eintrag \"";
                                        if ($res = $con->query('SELECT L_ID, L_Vorname, L_Nachname FROM lehrer WHERE L_ID=' . $_POST['Lehrer'])) {
                                            $res->data_seek(0);
                                            while ($row = $res->fetch_assoc()) {
                                                echo $row['L_Vorname'] . " " . $row['L_Nachname'];
                                            }
                                        }
                                        echo "\" wirklich L&ouml;schen?</div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-outline-secondary' data-dismiss='modal'>Nein</button>
        <a href='LehrerLoeschen.php?Lehrer=" . $_POST['Lehrer'] . "' class='btn btn-danger'>Ja</a>
      </div>
    </div>
  </div>
</div>
                                    </tr>";
                                    }
                                }
                            }
                            echo '</tbody>
                    </table>
                </div>
            </div>';
                            echo '<script type="text/javascript">
                                function klconfirm(K_ID,L_ID) {
                                  if(confirm("Möchten sie den Eintrag wirklich Löschen?")){
                                      location.href = "/View/DeleteClassTeacher.php?K_ID="+arguments[0]+"&L_ID="+arguments[1];
                                  }
                                  }
                    </script>';
                            if ($res = $con->prepare('SELECT * FROM lehrer,kl_s,klassen where lehrer.L_ID=' . $_POST["Lehrer"] . ' AND lehrer.L_ID=kl_s.L_ID AND kl_s.K_ID=klassen.K_ID')) {
                                $res->execute();
                                $res->store_result();
                                if ($res->num_rows > 0) {
                                    echo '<div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">Klassenlehrer</h3>
                        </div>
                        <div class="card-body p-0">
                        <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Klasse</th>
                            <th>Klassenk&uuml;rzel</th>
                            <th>Status</th>';
                                    if (isset($_SESSION["loggedin"])) {
                                        echo "
                            <th>Bearbeiten</th>
                            <th>Löschen</th>";
                                    }
                                    echo '
                        </tr>
                        </thead>
                        <tbody>';
                                    if ($rest = $con->query('SELECT * FROM lehrer,kl_s,klassen where lehrer.L_ID=' . $_POST["Lehrer"] . ' AND lehrer.L_ID=kl_s.L_ID AND kl_s.K_ID=klassen.K_ID')) {
                                        $rest->data_seek(0);
                                        $i = 0;
                                        while ($row = $rest->fetch_assoc()) {
                                            $i = $i + 1;
                             echo " <tr>
                                        <th scope='row'>" . $row['K_ID'] . "</th>
                                        <td>" . $row['K_Bez'] . "</td>
                                        <td>" . $row['K_Kuerzel'] . "</td>
                                        <td>";
                                            if ($row['KL_status'] == 0) {
                                                echo "Stellvertretender Klassenlehrer";
                                            } else {
                                                echo "Klassenlehrer";
                                            }
                                            if(isset($_SESSION["loggedin"])){echo " </td>
                                        
                                        <td>
                                        <form class='hide' action='ShowTeacher.php?EditKL=true' target='_self' method='post'>
                                            <input type='text' style='display:none;' class='p-0 hide form-control' name='Lehrer' value='" . $_POST['Lehrer'] . "'>
                                            <input type='text' style='display:none;'  class='p-0 hide form-control' name='KID' value='" . $row['K_ID'] . "'>
                                            <button class='btn btn-warning' type='submit' style='color:white;' '><i class='icon fas fa-pencil-ruler'></i></a>
                                        </form></td>
                                        <td><a class='btn btn-danger' onclick='klconfirm(" . $row['K_ID'] . "," . $row['L_ID'] . ")' style='color:white;'><i class='icon fas fa-trash'></i></a></td>
                                    </tr>";
                                        }else{echo "</td></tr>";
                                        }}
                                        echo "</tbody></table></div>";
                                        if ($rest->num_rows < 2) {
                                            if(isset($_SESSION["loggedin"])){
                                            echo '<div class="card-footer">
                            <a class="btn btn-success" style="color:white;" data-toggle="modal" data-target="#Klassenlehrer1"><i class="nav-icon fas fa-plus" ></i> Hinzuf&uuml;gen</a>
                            </div>';
                                        }}
                                    }
                                } else {
                                    echo '<div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Klassenlehrer</h3>
                            </div>';
                                 if(isset($_SESSION["loggedin"]))  {
                            echo'<div class="card-body">
                                <a class="btn btn-success" style="color:white;" data-toggle="modal" data-target="#Klassenlehrer1"><i class="nav-icon fas fa-plus"></i> Hinzuf&uuml;gen</a>
                            </div>';}

                                }
                                echo "</div>
 <div class='modal fade' id='Klassenlehrer1' tabindex='-1' role='dialog' aria-labelledby='Klassenlehrer1' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Best&auml;tigen</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        Möchten sie den Eintrag \"";
                                if ($res = $con->query('SELECT L_ID, L_Vorname, L_Nachname FROM lehrer WHERE L_ID=' . $_POST['Lehrer'])) {
                                    $res->data_seek(0);
                                    while ($row = $res->fetch_assoc()) {
                                        echo $row['L_Vorname'] . " " . $row['L_Nachname'];
                                    }
                                }
                                echo "\" wirklich L&ouml;schen?</div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-outline-secondary' data-dismiss='modal'>Nein</button>
        <a href='LehrerLoeschen.php?Lehrer=" . $_POST['Lehrer'] . "' class='btn btn-danger'>Ja</a>
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
                                 <div class='modal show fade' id='Klassenlehrer2' tabindex='-1' role='dialog' aria-labelledby='Klassenlehrer1' aria-hidden='true'>
                                            <div class='modal-dialog' role='document'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='exampleModalLabel'>Bearbeiten</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action='EditClassTeacher.php' method='post'>
                                                    <div class='modal-body'>
                                                     <input type='text' readonly style='display:none;' class='p-0 hide form-control' name='Lehrer' value='" . $_POST['Lehrer'] . "'>
                                                     <input type='text' readonly style='display:none;'  class='p-0 hide form-control' name='KID' value='" . $_POST['KID'] . "'>
                                                    <div class='form-group' style='margin-left:20px;margin-top:25px;'>";
                                                     if ($rest = $con->query('SELECT * FROM lehrer,kl_s,klassen where lehrer.L_ID=' . $_POST["Lehrer"] . ' AND lehrer.L_ID=kl_s.L_ID AND kl_s.K_ID='.$_POST['KID'].' AND kl_s.K_ID=klassen.K_ID'))
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
        <button type='button' class='btn btn-outline-secondary' data-dismiss='modal'>Nein</button>
        <button type='submit' class='btn btn-primary'>Ja</a>
      </div>
    </div>
  </div>
</div>";}
                                echo " ";
                            }
                            if ($res = $con->prepare('SELECT * FROM lehrer,lehrer_hat_fakultas,fakultas where lehrer.L_ID=' . $_POST["Lehrer"] . ' AND lehrer.L_ID=lehrer_hat_fakultas.L_ID AND lehrer_hat_fakultas.F_ID=fakultas.F_ID')) {
                                $res->execute();
                                $res->store_result();
                                if ($res->num_rows > 0) {
                                    echo '<div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">Fakultas</h3>
                        </div>
                        <div class="card-body p-0">
                        <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Bezeichnung</th>';
                                    if (isset($_SESSION["loggedin"])) {
                                        echo "
                            <th>Bearbeiten</th>
                            <th>Löschen</th>";
                                    }
                                    echo '
                        </tr>
                        </thead>
                        <tbody>';
                                    if ($res = $con->query('SELECT * FROM lehrer,lehrer_hat_fakultas,fakultas where lehrer.L_ID=' . $_POST["Lehrer"] . ' AND lehrer.L_ID=lehrer_hat_fakultas.L_ID AND lehrer_hat_fakultas.F_ID=fakultas.F_ID')) {
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
                            if ($res = $con->prepare('SELECT * FROM lehrer,lehrer_hat_zks,zertifikatskurse where lehrer.L_ID=' . $_POST["Lehrer"] . ' AND lehrer.L_ID=lehrer_hat_zks.L_ID AND lehrer_hat_zks.ZK_ID=zertifikatskurse.ZK_ID')) {
                                $res->execute();
                                $res->store_result();
                                if ($res->num_rows > 0) {
                                    echo '<div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">Zertifikatskurse</h3>
                        </div>
                        <div class="card-body p-0">
                        <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Bezeichnung</th>
                            <th>Erhalten am</th>
                            <th>Kommentar</th>
                            ';
                                    if (isset($_SESSION["loggedin"])) {
                                        echo "
                            <th>Bearbeiten</th>
                            <th>Löschen</th>";
                                    }
                                    echo '
                        </tr>
                        </thead>
                        <tbody>';
                                    if ($res = $con->query('SELECT * FROM lehrer,lehrer_hat_zks,zertifikatskurse where lehrer.L_ID=' . $_POST["Lehrer"] . ' AND lehrer.L_ID=lehrer_hat_zks.L_ID AND lehrer_hat_zks.ZK_ID=zertifikatskurse.ZK_ID')) {
                                        $res->data_seek(0);
                                        $i = 1;
                                        while ($row = $res->fetch_assoc()) {
                                            echo " <tr>
                                        <th scope='row'>" . $i . "</th>
                                        <td>" . $row['ZK_Bez'] . "</td>
                                        <td>" . $row['zk_erhalt'] . "</td>
                                        <td>" . $row['ZK_Kommentar'] . "</td>";
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
                    <a class='btn btn-success' style='color:white;'><i class='nav-icon fas fa-plus'></i> Hinzuf&uuml;gen</a>
                </div>";}
                                        echo"</div>";
                                    }
                                } else {
                                    echo '<div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Zertifikatskurse</h3>
                        </div>';
                                    if (isset($_SESSION["loggedin"])) {
                                        echo '
                        <div class="card-body">
                        <a class="btn btn-success" style="color:white;"><i class=\'nav-icon fas fa-plus\'></i> Hinzuf&uuml;gen</a>
                        </div>';}
                                    echo'</div>';
                                }
                            }
                            if ($res = $con->prepare('SELECT * FROM lehrer,lehrer_bearbeitet_aufgaben,aufgaben where lehrer.L_ID=' . $_POST["Lehrer"] . ' AND lehrer.L_ID=lehrer_bearbeitet_aufgaben.L_ID AND lehrer_bearbeitet_aufgaben.A_ID=aufgaben.A_ID')) {
                                $res->execute();
                                $res->store_result();
                                if ($res->num_rows > 0) {
                                    echo '<div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Aufgaben</h3>
                        </div>
                        <div class="card-body p-0">
                        <table class="table table-head-fixed text-wrap" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Bezeichnung</th>
                            <th>Kommentar';
                                    if (isset($_SESSION["loggedin"])) {
                                        echo "
                            <th>Bearbeiten</th>
                            <th>Löschen</th>";
                                    }
                                    echo '
                        </tr>
                        </thead>
                        <tbody>';
                                    if ($res = $con->query('SELECT * FROM lehrer,lehrer_bearbeitet_aufgaben,aufgaben where lehrer.L_ID=' . $_POST["Lehrer"] . ' AND lehrer.L_ID=lehrer_bearbeitet_aufgaben.L_ID AND lehrer_bearbeitet_aufgaben.A_ID =aufgaben.A_ID')) {
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
