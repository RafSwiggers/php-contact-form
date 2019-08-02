<?php
print_r($_POST);

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$name = filter_var($_POST['name'], FILTER_SANITIZE_EMAIL);
if (true ==== filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "This cleaned email address is considered valid."
} else {
	echo "This cleaned email address is not valid. Sorry. xoxo."
}

?>