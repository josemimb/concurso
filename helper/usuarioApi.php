<?php
include 'db.php';

$dbConn = new Database();
/*
  listar todos los usuarios o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id']))
    {
      //Mostrar un usuario
      $sql = $dbConn->connect()->prepare("SELECT * FROM usuarios where id=:id");
      $sql->bindValue(':id', $_GET['id']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
      exit();
	  }
    else {
      //Mostrar lista de usuarios
      $sql = $dbConn->connect()->prepare("SELECT * FROM usuarios");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      echo json_encode( $sql->fetchAll()  );
      exit();
	}
}

// Crear un nuevo usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $input = $_POST;
    $sql = "INSERT INTO usuarios
          (indicativo, email, localizacion, imagen, nombre, contraseña, rol) VALUES
          (:indicativo, :email, :localizacion, :imagen, :nombre, :contrasena, :rol)";
    $statement = $dbConn->connect()->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->connect()->lastInsertId();
    if($postId)
    {
      $input['id'] = $postId;
      header("HTTP/1.1 200 OK");
      echo json_encode($input);
      exit();
	 }
}

//Borrar un usuario
if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
	$id = $_GET['id'];
  $statement = $dbConn->connect()->prepare("DELETE FROM usuarios where id=:id");
  $statement->bindValue(':id', $id);
  $statement->execute();
	header("HTTP/1.1 200 OK");
	exit();
}

//Actualizar un usuario
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
  parse_str(file_get_contents('php://input'),$_PUT);
  var_dump($_PUT);
	
  //$input = $_GET;
 // $postId = $input['id'];
	$id = $_GET['id'];
  $sql = "UPDATE usuarios
          SET $_PUT
          WHERE id=$id";

  $statement = $dbConn->connect()->prepare($sql);
  //var_dump($statement);
  $statement->bindValue(':id', $id);

  //bindAllValues($statement, $input);
  $statement->execute();
	header("HTTP/1.1 200 OK");
	exit();
   /* $input = $_GET;
    $postId = $input['id'];
    $fields = getParams($input);

    $sql = "
          UPDATE post
          SET $fields
          WHERE id='$postId'
           ";

    $statement = $dbConn->connect()->prepare("UPDATE usuarios SET $fields WHERE id= $postId");
    bindAllValues($statement, $input);

    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();*/
}


//En caso de que ninguna de las opciones anteriores se haya ejecutado
//header("HTTP/1.1 400 Bad Request");

?>