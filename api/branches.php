<?php

include_once 'ca_assistant.php';

class CorreoArgentinoAPI
{

  static $_dbh;

  private function __construct()
  {
    $this->connectDB();
  }

  static function getInstance()
  {
    if (is_null(self::$_dbh)) {
      return new self();
    } else {
      return self::$_dbh;
    }
  }

  public function connectDB()
  {
    try {
      self::$_dbh = new PDO("mysql:dbname=dbnamea;host=localhost;port=3306", 'user','password');
    } catch (PDOException $e) {
      echo 'Conexión fallida: ' . $e->getMessage();
    }
  }

  public function disconnectDB()
  {
    self::$_dbh = null;
  }

  public function findLocalitiesWithBranchesFrom($province)
  {
    $statement = self::$_dbh->prepare("SELECT DISTINCT LOCALIDAD FROM sucursales WHERE PROVINCIA = :province ORDER BY LOCALIDAD asc");
    $statement->bindValue(':province', $province, PDO::PARAM_STR);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_OBJ);
  }

  public function findBranchesFromLocalitie($localitie)
  {
    $statement = self::$_dbh->prepare("SELECT CODIGO_NIS, DENOMINACION, CALLE, NUMERO FROM sucursales WHERE LOCALIDAD = :localitie ORDER BY DENOMINACION asc");
    $statement->bindValue(':localitie', $localitie, PDO::PARAM_STR);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_OBJ);
  }

  public function findBranchesByPostalCode($postalCode)
  {
    $statement = self::$_dbh->prepare("SELECT * FROM sucursales WHERE CPA LIKE CONCAT('%', :postalCode, '%')");
    $statement->bindValue(':postalCode', $postalCode, PDO::PARAM_STR);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_OBJ);
  }
}

$ca_api = CorreoArgentinoAPI::getInstance();
$ca_assistant = new CA_Assistant();
if (isset($_POST['action'])){
switch ($_POST['action']) {
  case 'localities':
    $province= strtoupper($ca_assistant -> get_province_name($_POST['province']));
    echo json_encode($ca_api->findLocalitiesWithBranchesFrom($province));
    break;
  case 'branches':
    $localitie= strtoupper($_POST['localitie']);
    echo json_encode($ca_api->findBranchesFromLocalitie($localitie));
    break;
  default:
    # code...
    break;
}




}