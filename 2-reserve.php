<?php
class Reservation {
  // (A) CONSTRUCTOR - CONNECT TO DATABASE
  private $pdo; // PDO object
  private $stmt; // SQL statement
  public $error; // Error message
  function __construct() {
    try {
      $this->pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
        DB_USER, DB_PASSWORD, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NAMED
        ]
      );
    } catch (Exception $ex) { exit($ex->getMessage()); }
  }

  // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct() {
    $this->pdo = null;
    $this->stmt = null;
  }


  // (C) SAVE RESERVATION
  function save ($i_mail, $i_start, $i_end, $i_name, $i_tel) {
    // (C2) DATABASE ENTRY
    $i_mail = explode (",", $i_mail);
    $i_start = explode (",", $i_start);
    $i_end = explode (",", $i_end);
    $i_name = explode (",", $i_name);
    $i_tel = explode (",", $i_tel); 


    $corr_start=array_map('correct_times', $i_start);
    $corr_end=array_map('correct_times', $i_end);

      try {
    for($i = 0;$i < count($i_name);$i++){
        $this->stmt = $this->pdo->prepare(
          "INSERT INTO `reservations` (`res_mail`, `res_name`, `res_telefono`,`res_eventTime`,`res_endTime`) VALUES (?,?,?,FROM_UNIXTIME(?),FROM_UNIXTIME(?))");
        $this->stmt->execute([$i_mail[$i], $i_name[$i], $i_tel[$i],$corr_start[$i],$corr_end[$i]]);
      }
        return true;
      } catch (Exception $ex) {
        $this->error = $ex->getMessage();
        return false;
      }

    // (C3) EMAIL
    // @TODO - REMOVE IF YOU WANT TO MANUALLY CALL TO CONFIRM OR SOMETHING
    // OR EMAIL THIS TO A MANAGER OR SOMETHING
    /*$subject = "Reservation Received";
    $message = "Thank you, we have received your request and will process it shortly.";
    @mail($email, $subject, $message);
    return true;*/
  }

  // (D) GET RESERVATIONS FOR THE DAY
  function getDay ($day="") {
    // (D1) DEFAULT TO TODAY
    if ($day=="") { $day = date("Y-m-d"); }

    // (D2) GET ENTRIES
    $this->stmt = $this->pdo->prepare(
      "SELECT * FROM `reservations` WHERE `res_eventTime`=?"
    );
    $this->stmt->execute([$day]);
    return $this->stmt->fetchAll();
  }
}

function correct_times($item) {
  return $item/ 1000;
}


// (E) DATABASE SETTINGS - CHANGE THESE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "pequecitas");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");

/*
define("DB_HOST", "localhost");
define("DB_NAME", "dbscdmx58tuama");
define("DB_CHARSET", "utf8");
define("DB_USER", "ucd4zyhryxc8w");
define("DB_PASSWORD", "968*d0aJ");
*/


// (F) NEW RESERVATION OBJECT
$_RSV = new Reservation();
