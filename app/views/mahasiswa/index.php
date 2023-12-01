<?php 
if(session_status()==PHP_SESSION_NONE)
session_start();

include 'template/header.php';
if (!empty($_GET['page'])) {
    include "module/" . $_GET['page'] . "/index.php";
} else {
    include 'template/home.php';
}
include 'template/footer.php';
?>
?>

<?php
<<<<<<< HEAD
// if (session_status() === PHP_SESSION_NONE)
//     session_start();

// if (!empty($_SESSION['level'])) {
//     require 'config/koneksi.php';
//     require 'fungsi/pesan_kilat.php';

//     include 'template/header.php';
//     if (!empty($_GET['page'])) {
//         include 'module/' . $_GET['page'] . '/index.php';
//     } else {
//         include 'template/home.php';
//     }
// }
// ?>
=======
echo $_SESSION["anas"];
>>>>>>> eef3c6f3b16e7c697d56b058ada33b287be26374
