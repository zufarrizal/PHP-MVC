<?php
// Setel path untuk autoload dan file lainnya
require_once '../config/config.php';
require_once '../controllers/BookController.php';

// Inisialisasi controller dan rute aplikasi
$controller = new BookController($pdo);

// Tangani rute
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $controller->delete();
    } else if (isset($_POST['id'])) {
        $controller->update();
    } else {
        $controller->create();
    }
} else {
    $controller->index();
}
