<?php
if (isset($_GET['hapus'])) {
    $kd_jadwal = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM detailjadwal WHERE id_jadwal = '$kd_jadwal'");
    $hapus = mysqli_query($koneksi, "DELETE FROM jadwal WHERE kd_jadwal = '$kd_jadwal'");

    if ($hapus) {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Berhasil!</strong> Data jadwal telah dihapus.
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button>
      </div>";
    } else {
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Gagal!</strong> Tidak dapat menghapus data.
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times</span>
      </button>
      </div>";
    }
}
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Jadwal</h1>
      </div>
    </div>
  </div>
</div>
<div class="content">
  <div class="container-flukelas">
    <div class="card">
      <div class="card-body">
        <a href="index.php?page=tambah_jadwal" class="btn btn-primary btn-sm">Tambah Jadwal</a>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Kode Jadwal</th>
            <th>Guru</th>
            <th>Semester</th>
            <th>Tahun Ajaran</th>
            <th>Detail Jadwal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php
        $query = mysqli_query($koneksi,
"SELECT *
FROM jadwal j
JOIN detailjadwal d ON j.kd_jadwal = d.id_jadwal
JOIN guru g ON d.kd_guru = g.kd_guru
");
        while ($row = mysqli_fetch_assoc($query)) {
          echo "<tr>
          <td>{$row['kd_jadwal']}</td>
          <td>{$row['nm_guru']}</td>
          <td>{$row['semester']}</td>
          <td>{$row['tahun_ajaran']}</td>
          <td>
          <ul>";
          $det = mysqli_query($koneksi, "SELECT d.*, m.nm_mapel FROM detailjadwal d JOIN mapel m ON d.kd_mapel = m.kd_mapel WHERE d.id_jadwal = '{$row['kd_jadwal']}'");

while ($d = mysqli_fetch_assoc($det)) {
    echo "<li>
        {$d['nm_mapel']} -
        {$d['hari']} -
        " . date('H:i', strtotime($d['jam_mulai'])) . " s/d " .
date('H:i', strtotime($d['jam_selesai'])) . "
        {$d['kelas']}
    </li>";
}
          echo    "</ul>
          </td>
          <td>
          <a href='index.php?page=jadwal&hapus={$row['kd_jadwal']}'
          onclick=\"return confirm('Yakin ingin menghapus data ini?')\"
          class='btn btn-danger btn-sm'>Hapus</a>
          </td>
          </tr>";
        }
        ?>
        </tbody>
      </table>

      </div>
    </div>
  </div>
</div>