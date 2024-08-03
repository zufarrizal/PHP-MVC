<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Arsip Buku</h1>
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addBookModal">
            Tambah Buku
        </button>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Penerbitan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($books as $book): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($book['id']); ?></td>
                                <td><?php echo htmlspecialchars($book['judul']); ?></td>
                                <td><?php echo htmlspecialchars($book['penulis']); ?></td>
                                <td><?php echo htmlspecialchars($book['penerbit']); ?></td>
                                <td><?php echo htmlspecialchars($book['tahun_penerbitan']); ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-edit" data-id="<?php echo $book['id']; ?>" data-judul="<?php echo $book['judul']; ?>" data-penulis="<?php echo $book['penulis']; ?>" data-penerbit="<?php echo $book['penerbit']; ?>" data-tahun="<?php echo $book['tahun_penerbitan']; ?>">Edit</button>
                                    <button type="button" class="btn btn-danger btn-delete" data-id="<?php echo $book['id']; ?>">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="addBookModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Buku Baru</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="addBookForm">
                        <div class="form-group">
                            <label for="judul">Judul:</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="form-group">
                            <label for="penulis">Penulis:</label>
                            <input type="text" class="form-control" id="penulis" name="penulis" required>
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit:</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun Penerbitan:</label>
                            <input type="number" class="form-control" id="tahun" name="tahun" required>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- The Edit Modal -->
    <div class="modal fade" id="editBookModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Buku</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="editBookForm">
                        <input type="hidden" id="editId" name="id">
                        <div class="form-group">
                            <label for="editJudul">Judul:</label>
                            <input type="text" class="form-control" id="editJudul" name="judul" required>
                        </div>
                        <div class="form-group">
                            <label for="editPenulis">Penulis:</label>
                            <input type="text" class="form-control" id="editPenulis" name="penulis" required>
                        </div>
                        <div class="form-group">
                            <label for="editPenerbit">Penerbit:</label>
                            <input type="text" class="form-control" id="editPenerbit" name="penerbit" required>
                        </div>
                        <div class="form-group">
                            <label for="editTahun">Tahun Penerbitan:</label>
                            <input type="number" class="form-control" id="editTahun" name="tahun" required>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Tambah Buku
        document.getElementById('addBookForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch('index.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Buku berhasil ditambahkan.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
            })
            .catch(error => {
                Swal.fire({
                    title: 'Error!',
                    text: 'Terjadi kesalahan saat menambahkan buku.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        });

        // Edit Buku
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
                var id = this.dataset.id;
                var judul = this.dataset.judul;
                var penulis = this.dataset.penulis;
                var penerbit = this.dataset.penerbit;
                var tahun = this.dataset.tahun;

                document.getElementById('editId').value = id;
                document.getElementById('editJudul').value = judul;
                document.getElementById('editPenulis').value = penulis;
                document.getElementById('editPenerbit').value = penerbit;
                document.getElementById('editTahun').value = tahun;

                $('#editBookModal').modal('show');
            });
        });

        document.getElementById('editBookForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch('index.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Buku berhasil diperbarui.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
            })
            .catch(error => {
                Swal.fire({
                    title: 'Error!',
                    text: 'Terjadi kesalahan saat memperbarui buku.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        });

        // Hapus Buku
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                var id = this.dataset.id;

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formData = new FormData();
                        formData.append('id', id);
                        formData.append('delete', true);

                        fetch('index.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.text())
                        .then(data => {
                            Swal.fire({
                                title: 'Sukses!',
                                text: 'Buku berhasil dihapus.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                location.reload();
                            });
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Terjadi kesalahan saat menghapus buku.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        });
                    }
                });
            });
        });
    </script>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
