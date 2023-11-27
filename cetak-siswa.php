<?php
include 'koneksi.php';
?>

<script>
    window.print();
</script>

<table border=1 cellpading="5" cellspacing="0" width="100%">
    <tr>
        <th colspan="8">Data Siswa</th>
    </tr>
        <tr>
            <th>NISN</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Tempat lahir</th>
            <th>tanggal lahir</th>
            <th>Jenis kelamin</th>
            <th>Kelas</th>
            <th>Jurusan</th>
        </tr>
    <tbody>
        <?php
        if (isset($_GET['kelas'])) {
            $kelas = $_GET['kelas'];
            $query = mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE nm_kelas='$kelas'");
        } else {
            $query = mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
        }
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $data['nisn'] ?></td>
                <td><?php echo $data['nis'] ?></td>
                <td><?php echo $data['nm_siswa'] ?></td>
                <td><?php echo $data['tempat_lahir'] ?></td>
                <td><?php echo $data['tgl_lahir'] ?></td>
                <td><?php echo $data['jenis_kelamin'] ?></td>
                <td><?php echo $data['nm_kelas'] ?></td>
                <td><?php echo $data['nm_jurusan'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>