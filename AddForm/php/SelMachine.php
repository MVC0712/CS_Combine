<?php
require_once('../../connection.php');
$dbh = new DBHandler();
if ($dbh->getInstance() === null) {
    die("No database connection");
}
if ($_POST['line_id'] != 0) {
    $line_id = $_POST['line_id'];
    $sql = "SELECT id, machine FROM check_sheet.t_machine WHERE line_id = '$line_id';";
} else {
    $sql = "SELECT id, machine FROM check_sheet.t_machine;";
}
try {
    $stmt = $dbh->getInstance()->prepare($sql);
    $stmt->execute();
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} 
catch(PDOException $e) {
    echo $e;
}
?>