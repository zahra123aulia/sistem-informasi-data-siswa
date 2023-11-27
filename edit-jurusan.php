<?php
$id = $_GET['id'];
if (isset($_POST['nama_jurusan'])) {
    $nama_jurusan = $_POST['nama_jurusan'];

    $query = mysqli_query($koneksi, "UPDATE jurusan SET nm_jurusan='$nama_jurusan' WHERE id_jurusan='$id'");

    if ($query) {
        echo '<script>alert("Data Berhasil di update");location.href="?page=jurusan"</script>';
    }
}
$query = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_jurusan='$id'");
$data = mysqli_fetch_array($query);
?>

<h1 class="h3 mb-3"> Ubah jurusan</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card flex-fill">
                                <div class="card-body">
                                    <form method="post">
                                        <div class="mb-3">
                                            <label for="form-label">Nama Jurusan</label>
                                            <div class="col-12">
                                                <input type="text" name="nama_jurusan" class="form-control" value="<?php echo $data['nm_jurusan'] ?> ">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>