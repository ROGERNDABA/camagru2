<?php
require("../../config/Global.php");
require("../../config/Setup.php");

print_r($_POST);

// if (isset($_SESSION)) {
// 	session_destroy();
// }
// $g = new General();
// $g->CheckRequest("xmlhttpRequest");
// $response = array("form_error" => "", "error" => "", "success" => "");
// if (isset($_POST["submit"]) && $_POST["submit"] == "ok") {
// 	unset($_POST["submit"]);
// 	foreach ($_POST as $key => $value) {
// 		if(!$value) {
// 			$response["form_error"] .= "<li>".ucfirst($key)." is too short or empty</li>";
// 		}
// 	}
// 	if ($response["form_error"]) {
// 		echo json_encode($response);
// 		exit;
// 	}
// 	$firstname =	isset($_POST["firstname"])? $_POST["firstname"] : "";
// 	$lastname =		isset($_POST["lastname"])? $_POST["lastname"] : "";
// 	$username =		isset($_POST["username"])? $_POST["username"] : "";
// 	$email =			isset($_POST["email"])? $_POST["email"] : "";
// 	$password1 =	isset($_POST["password1"])? $_POST["password1"] : "";
// 	$password2 = 	isset($_POST["password2"])? $_POST["password2"] : "";
// 	$initClass = new Init("GetSchwifty");
// 	$db = $initClass->getDB();
// 	if ($db) {
// 		if (!$firstname && !preg_match('/^[a-zA-Z]\'?[-a-zA-Z]+$/', $firstname))
// 			$response["form_error"] .= "<li>Firstname has incorrect formart</li>";
// 		if (!$lastname && !preg_match('/^[a-zA-Z]\'?[-a-zA-Z]+$/', $lastname))
// 			$response["form_error"] .= "<li>Lastname has incorrect formart</li>";
// 		if (!$username && !preg_match('/^[a-zA-Z0-9_]+$/', $username))
// 			$response["form_error"] .= "<li>Username has incorrect formart</li>";
// 		if (!$email && !preg_match('/^[A-Za-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{1,4}[^\\S]+$/', $email))
// 			$response["form_error"] .= "<li>Email has incorrect formart</li>";
// 		if (!$password1 && $password1 != $password2)
// 			$response["form_error"] .= "<li>Passwords don't match</li>";
// 		if(!$password1 && strlen($password1) < 7)
// 			$response["form_error"] .= "<li>Password too short</li>";
// 		if(!$password1 && !preg_match('/[a-z]{2,}/', $password1) &&
// 			!preg_match('/[0-9]{1,}/', $password1) &&
// 			!preg_match('/[A-Z]{1,}/', $password1))
// 			$response["form_error"] .= "<li>Password too weak</li>";
// 		if(!$response["form_error"]) {
// 			$dh = new DataHandler($db);
// 			$check = $dh->CheckUserExists($username, $email);
// 			if ($check) {
// 				$response["form_error"] .= "<li>".$check." already exists</li>";
// 			} else {
// 				$register = $dh->RegisterUser($firstname, $lastname, $username, $email, $password1);
// 				print_r($register);
// 				if (!$register) {
// 					echo "Something went wrong";
// 					exit;
// 				} else {
// 					session_start();
// 					$_SESSION["loggedin"] = 1;
// 					$_SESSION["user"] = $username;
// 					exit;
// 				}
// 				exit;
// 			}
// 		}
// 	} else {
// 			echo "Something went wrong";
// 			exit;
// 	}
// 	echo json_encode($response);
// 	exit;
// }
?>
