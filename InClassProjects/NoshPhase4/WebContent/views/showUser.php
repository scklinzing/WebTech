<?php
// Displays a user Input: an array of UserData objects
function showUser($user) {
    $user->printUser();
	echo '<h3><a href="../index.php">Back to home</a>';
}
?>