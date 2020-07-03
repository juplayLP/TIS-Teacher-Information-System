<?php session_start();
header("Cache-Control: public, max-age=" . 604800);
$path = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html lang="de">
<?php
include_once($path.'/includes/head.php');
?>
<body class="hold-transition skin-black fixed sidebar-mini">
<?php
include_once($path.'/includes/navbar.php');
include($path.'/includes/Connect.php');
?>
<!-- Left side column. contains the logo and sidebar -->
<?php
include_once($path.'/includes/Sidebar.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="content-header">
        <h1 class="m-0 text-dark">
            Kollegium
        </h1>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table class='table'>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>K&uuml;rzel</th>
                            <th>VZ/TZ</th>
                            <th>Eintrittsdatum</th>
                            <th>Dienstgrad</th><?php
                            if (isset($_SESSION["loggedin"])) {
                            echo "
                            <th>Bearbeiten</th>
                            <th>Löschen</th>";
                            }?>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($res = $con->query('SELECT * FROM lehrer,dienstgrad WHERE L_DID=D_ID')){
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
                                        <form class='hide'>
                                            <input type='text' style='Display:none;' readonly name='Lehrer' value='" . $row["L_ID"] . "'>
                                            <a class='btn btn-danger' data-toggle='modal' data-target='#LehrerLoeschen' style='color:white;'>
                                                <i class='icon fas fa-trash'></i>
                                            </a>
                                            <form>
                                        </td>";
                                    }
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
                <?php
                if (isset($_SESSION["loggedin"])) {
                    echo '
                <div class="card-footer">
                    <a class="btn btn-success" data-toggle="modal" data-target="#LehrerHinzufuegen" style="color:white;"><i class="icon fas fa-plus"></i> Hinzuf&uuml;gen</a>
                </div>
                <div class="modal fade" id="LehrerHinzufuegen" data-backdrop="static"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Lehrer Bearbeiten</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <form action="AddTeacher.php" target="_self" method="post">
                                    <div class="modal-body">';
                                        if ($res = $con->query('SELECT MAX(L_ID)+1 AS L_ID FROM lehrer,dienstgrad WHERE L_DID=D_ID')) {
                                            $res->data_seek(0);
                                            while ($row = $res->fetch_assoc()) {
                                                echo "
                                                            <div class='form-group'>
                                                                <label>Lehrer-Identifikationsnummer</label>
                                                                <input type='text' class='p-0 form-control'  readonly name='Lehrer' value='" . $row["L_ID"] . "'></br>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label>Name</label>
                                                                <input type='text' class='p-0 form-control' name='Name'></br>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label> Vorname </label>
                                                                <input type='text' class='p-0 form-control' name='Vorname'></br>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label> K&uuml;rzel </label>
                                                                <input type='text' class='p-0 form-control' name='Kuerzel'></br>
                                                            </div>
                                                            <div class='form-check'>    
                                                             <input type='checkbox' class='form-check-input' name='VZTZ' id='VZTZ'>
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
                            format: 'YYYY-MM-DD'                           
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
                                                          echo "<option value='" . $row['D_ID'] . "'>" . $row['D_Bez'] . "</option>";
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
";}
                ?>
            </div>
            <noscript><p>This Site Requires Javascript to be enabled to work. please enable Javascript.</p></noscript>
        </div>
    </section>

</div>
<!-- /.content-wrapper -->
<?php
include_once($path.'/includes/Footer.php');
?>
