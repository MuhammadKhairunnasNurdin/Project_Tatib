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
<!-- =======
//<<<<<<< HEAD
//// if (session_status() === PHP_SESSION_NONE)
////     session_start();
//
//// if (!empty($_SESSION['level'])) {
////     require 'config/koneksi.php';
////     require 'fungsi/pesan_kilat.php';
//
////     include 'template/header.php';
////     if (!empty($_GET['page'])) {
////         include 'module/' . $_GET['page'] . '/index.php';
////     } else {
////         include 'template/home.php';
////     }
//// }
//// ?>
>>>>>>> 2d8bd2813e641db3da7e3bdf24f715fa28baec11 -->
