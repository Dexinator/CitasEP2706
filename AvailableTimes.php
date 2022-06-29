<?php
define("DB_HOST", "localhost");
define("DB_NAME", "pequecitas");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");

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
  ?timeslots= array("10:45",  "11:30",  "12:15",  "13:00",  "13:45", "16:00", "16:45",  "17:30",  "18:15");
  if (isset($_GET["selected_day"])){
    $selected_day=$_GET["selected_day"];
    $taken=check($selected_day);

  }



  // (C) SAVE RESERVATION


  function check ($selected_date) {

    // (C2) DATABASE ENTRY
    try {
      $this->stmt = $this->pdo->prepare("SELECT res_eventTime FROM reservations WHERE res_eventTime LIKE <= ?");
      $this->stmt->execute([$selected_date]);
      return stmt;
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }
  }

?>