<?php 

require "database.php";

session_start();

if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  return;
}

$id = $_GET["id"];

$statament = $conn->prepare("SELECT *  FROM contacts WHERE id = :id LIMIT 1");
$statament->execute([":id" => $id]); 

if($statament->rowCount() == 0) {
  http_response_code(404);
  echo("HTTP 404 NOT FOUND");
  return;
}

$contact = $statament->fetch(PDO::FETCH_ASSOC);

if ($contact["user_id"] !== $_SESSION["user"]["id"]) {
  http_response_code(403);
  echo("HTTP 403 UNAUTHORIZED");
}

$conn->prepare("DELETE FROM contacts WHERE id = :id")->execute([":id" => $id]); 

$_SESSION["flash"] = ["message" => "Contact {$_POST['name']} deleted."];

    header("Location: home.php");
    return;

