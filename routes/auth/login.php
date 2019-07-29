<?php
require("../../config/Global.php");
require("../../config/Setup.php");
require("../../config/DataHandler.php");
if (isset($_SESSION)) {
	session_destroy();
}
$g = new General();
$g->CheckRequest("xmlhttpRequest");

$response = array("form_error" => "", "error" => "", "success" => "");
if (isset($_POST["submit"]) && $_POST["submit"] == "Login") {
	unset($_POST["submit"]);
	foreach ($_POST as $key => $value) {
		if(!$value) {
			$response["form_error"] .= "<li>".ucfirst(substr(ucfirst($key),1))
			." is too short or empty</li>";
		}
	}
	if ($response["form_error"]) {
		echo json_encode($response);
		exit;
	}
	$email =		isset($_POST["lemail"])? $_POST["lemail"] : "";
	$password =	isset($_POST["lpassword"])? $_POST["lpassword"] : "";
	$initClass = new Init("Camagru");
	$db = $initClass->getDB();
	if ($db) {
		if (!$email && !preg_match('/^[A-Za-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{1,4}[^\\S]+$/', $email))
			$response["form_error"] .= "<li>Email has incorrect formart</li>";
		if(!$response["form_error"]) {
			$dh = new DataHandler($db);
			$validate = $dh->ValidateLogin($email, $password);
			if (!$validate) {
				$response["form_error"] .= "<li>Invalid email or password</li>";
			} else {
					session_start();
					$_SESSION["loggedin"] = 1;
					$_SESSION["email"] = $email;
					$_SESSION["Role"] = $validate["Role"];
					exit;
			}
		}
	} else {
			echo "Something went wrong";
			exit;
	}
	echo json_encode($response);
	exit;
}
?>
