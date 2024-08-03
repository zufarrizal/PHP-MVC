<?php

require_once '../models/Book.php';

class BookController
{
    private $bookModel;

    public function __construct($pdo)
    {
        $this->bookModel = new Book($pdo);
    }

    public function index()
    {
        $books = $this->bookModel->getAllBooks();
        require '../views/book/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['judul'])) {
            $judul = $_POST['judul'];
            $penulis = $_POST['penulis'];
            $penerbit = $_POST['penerbit'];
            $tahun = $_POST['tahun'];

            $this->bookModel->createBook($judul, $penulis, $penerbit, $tahun);

            header('Location: ../public/index.php');
            exit();
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && !isset($_POST['delete'])) {
            $id = $_POST['id'];
            $judul = $_POST['judul'];
            $penulis = $_POST['penulis'];
            $penerbit = $_POST['penerbit'];
            $tahun = $_POST['tahun'];

            $this->bookModel->updateBook($id, $judul, $penulis, $penerbit, $tahun);

            header('Location: ../public/index.php');
            exit();
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['delete'])) {
            $id = $_POST['id'];

            $this->bookModel->deleteBook($id);

            header('Location: ../public/index.php');
            exit();
        }
    }
}
