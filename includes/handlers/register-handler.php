<?php

function formatFormUserName($inputText)
{
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ","", $inputText);
	return $inputText;
}

function formatFormString($inputText)
{
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ","", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

function formatFormPassword($inputText)
{
	$inputText = strip_tags($inputText);
	return $inputText;
}

if(isset($_POST['registerButton']))
{
	// Register button pressed
	$username = formatFormUserName($_POST['username']);
	$firstName = formatFormString($_POST['firstName']);
	$lastName = formatFormString($_POST['lastName']);
	$email = formatFormString($_POST['email']);
	$email2 = formatFormString($_POST['email2']);
	$password = formatFormPassword($_POST['password']);
	echo "Password: $password";
	$password2 = formatFormPassword($_POST['password2']);

	$wasSuccessful = $account->register($username, $firstName, $lastName, $email,
		$email2, $password, $password2);

	if($wasSuccessful)
	{
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
	}
}

?>