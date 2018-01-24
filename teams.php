<?php
if (!isset($_SESSION['id'])) {
	header("Location: login.php");
}
require_once 'php/config.php';

require_once 'php/includes/header.php';
?>

<?php
require_once 'php/includes/footer.php';
?>