// plantilla de página
<?php
require_once 'layouts/header.php';
?>

<?php
require_once 'layouts/footer.php';
?>

// plantilla de página post-login
<?php
require_once 'layouts/header.php';
if (!isset($_SESSION["logged"])) {
    header("Location: auth/login");
    exit();
} else {
    if ($_SESSION["logged"] != true) {
        header("Location: auth/login");
        exit(); 
    }
}
?>

<?php
require_once 'layouts/footer.php';
?>
