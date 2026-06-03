<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Skripsi</h1>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_GET['action'])) {
    if($_GET['action'] == "hapus") {
        $id =$_GET['id'];
        $query = mysqli_query($koneksi, "DELETE FROM skripsi_2511500083 where id_skripsi083 = '$id' ");
        if ($query){
            echo '
            <div class="alert alert-warning alert-dismissible">
            Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=skripsi_2511500083">';
        }
    }
}
?>
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <a href="index.php?page=tambah_skripsi2511500083" class="btn btn-primary btn-sm">Tambah Skripsi</a>
      <table class="table table-striped">
        <tread>
          <tr>
            <th>NO</th>
            <th>Id Skripsi</th>
            <th>Judul Skripsi</th>
            <th>Topik</th>
            <th>Semester</th>
            <th>Tahun Ajaran</th>
            <th>Aksi</th>
          </tr>
        </tread>
        <?php
        $no = 0;
        $query = mysqli_query($koneksi, "SELECT * FROM skripsi_2511500083");
        while ($result = mysqli_fetch_array($query) ) {
            $no++
        ?>
        <tbody>
            <tr>
            <td><?= $no;?></td>
            <td><?=$result['id_skripsi083']; ?></td>
            <td><?=$result['judul_skripsi083']; ?></td>
            <td><?=$result['topik_083']; ?></td>
            <td><?=$result['semester_083']; ?></td>
            <td><?=$result['thn_ajaran083']; ?></td>
            <td>
                <a href="index.php?page=skripsi_2511500083&action=hapus&id=<?= $result['id_skripsi083'] 
                ?>" title="">
                  <span class="badge badge-danger">Hapus</span>
                <a href="index.php?page=edit_skripsi2511500083&id=<?= $result['id_skripsi083'] ?>" title=""><span class="badge badge-warning">Edit</span></a>        
            </td>
            </tr>
        </tbody>
        <?php } ?>
      </table>
      </div>
    </div>
  </div>
</div>