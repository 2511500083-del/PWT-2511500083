<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data kelas</h1>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['tambah'])){
    $pl = $_POST['pl'];
    $pb = $_POST['pb'];
    $cek = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM admin WHERE Username = '$Username' "));

if($cek){
    $update = mysqli_query($koneksi,"UPDATE admin SET Password = '$pb' WHERE Password = '$pl' AND Username = '$Username' ");
    if($update){
        echo "benar";
    }
}
}
?>
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <a href="index.php?page=tambah_kelas" class="btn btn-primary btn-sm">Tambah Kelas</a>
      <table class="table table-striped">
        <tread>
          <tr>
            <th>NO</th>
            <th>Id Kelas</th>
            <th>Nama Kelas</th>
          </tr>
        </tread>
        <?php
        $no = 0;
        $query = mysqli_query($koneksi, "SELECT * FROM kelas");
        while ($result = mysqli_fetch_array($query) ) {
            $no++
        ?>
        <tbody>
            <tr>
            <td><?= $no;?></td>
            <td><?=$result['id_kelas']; ?></td>
            <td><?=$result['nm_kelas']; ?></td>
            <td>
                <a href="index.php?page=kelas&action=hapus&id=<?= $result['id_kelas'] 
                ?>" title="">
                  <span class="badge badge-danger">Hapus</span>
                <a href="index.php?page=edit_kelas&id=<?= $result['id_kelas'] ?>" title=""><span class="badge badge-warning">Edit</span></a>        
            </td>
            </tr>
        </tbody>
        <?php } ?>
      </table>
      </div>
    </div>
  </div>
</div>