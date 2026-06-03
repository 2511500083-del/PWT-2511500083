<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Skripsi</h1>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_GET['id'];
$edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM skripsi_2511500083 WHERE id_skripsi083='$id' "));

if(isset($_POST['tambah'])){
    $id_skripsi083 = $_POST['id_skripsi083'];
    $judul_skripsi083 = $_POST['judul_skripsi083'];
    $topik_083 = $_POST['topik_083'];
    $semester_083 = $_POST['semester_083'];
    $thn_ajaran083 = $_POST['thn_ajaran083'];


    $insert = mysqli_query($koneksi, "UPDATE skripsi_2511500083 SET judul_skripsi083='$judul_skripsi083', topik_083='$topik_083', semester_083='$semester_083', thn_ajaran083='$thn_ajaran083' WHERE id_skripsi083='$id_skripsi083' ");
    if($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert"
        aria-hidden="true">X</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil DiEdit</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=skripsi_2511500083">';
    }else{
        echo '<div class="alert alert-warning alert-dismissible">
        button type="button class="close" data-dismiss="alert"
            aria-hidden="true">X</button>
        <h5> <i class="icon fas fa-info"></i> Info </h5>
        <h4>Gagal DiEdit</h4></div>';
    }
}
?>

  <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="card-body p-2">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="id_skripsi083">ID skripsi</label>
                                <input type="text" name="id_skripsi083" value="<?= $edit['id_skripsi083']; ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <Label for="judul_skripsi083">Judul skripsi</label>
                                <input type="text" name="judul_skripsi083" value="<?= $edit['judul_skripsi083']; ?>" id="judul_skripsi" placeholder="Judul skripsi" class="form-control">
                            </div>
                            <div class="form-group">
                                <Label for="topik_083">Topik</label>
                                <input type="text" name="topik_083" value="<?= $edit['topik_083']; ?>" id="topik" placeholder="Topik" class="form-control">
                            </div>
                            <div class="form-group">
                                <Label for="semester_083">Semester</label>
                                <select name="semester_083" id="Semester" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="1`">Semester 1</option>
                                <option value="2">Semester 2</option>
                                <option value="3">Semester 3</option>
                                <option value="4">Semester 4</option>
                                <option value="5">Semester 5</option>
                                <option value="6">Semester 6</option>
                                <option value="7">Semester 7</option>
                                <option value="8">Semester 8</option>
                                </select>
                            </div>
                             <div class="form-group">
                                <Label for="thn_ajaran083">Tahun Ajaran</label>
                                <select name="thn_ajaran083" id="thn_ajaran083" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="2025/2026">2025/2026</option>
                                <option value="2024/2025">2024/2025</option>
                                </select>
                            </div>

                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  </section>