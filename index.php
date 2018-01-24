<?php
require_once 'php/config.php';

require_once 'php/includes/header.php';

if (!isset($_SESSION['id'])) header("Location: login.php");

?>

<h1>Hello</h1>

<?php
require_once 'php/includes/footer.php';
?>