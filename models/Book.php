<?php

class Book
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllBooks()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM buku");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createBook($judul, $penulis, $penerbit, $tahun)
    {
        $stmt = $this->pdo->prepare("INSERT INTO buku (judul, penulis, penerbit, tahun_penerbitan) VALUES (:judul, :penulis, :penerbit, :tahun)");
        $stmt->execute([
            ':judul' => $judul,
            ':penulis' => $penulis,
            ':penerbit' => $penerbit,
            ':tahun' => $tahun
        ]);
    }

    public function updateBook($id, $judul, $penulis, $penerbit, $tahun)
    {
        $stmt = $this->pdo->prepare("UPDATE buku SET judul = :judul, penulis = :penulis, penerbit = :penerbit, tahun_penerbitan = :tahun WHERE id = :id");
        $stmt->execute([
            ':id' => $id,
            ':judul' => $judul,
            ':penulis' => $penulis,
            ':penerbit' => $penerbit,
            ':tahun' => $tahun
        ]);
    }

    public function deleteBook($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM buku WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
