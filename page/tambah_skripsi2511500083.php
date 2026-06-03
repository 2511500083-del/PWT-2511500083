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
$carikode = mysqli_query($koneksi, "select max(id_skripsi083) from skripsi_2511500083") or die (
    mysqli_error());
$datakode = mysqli_fetch_array($carikode);
if($datakode) {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode ="S-" .str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {$hasilkode ="S-"; }
$_SESSION["KODE"] = $hasilkode;

if(isset($_POST['tambah'])){
    $id_skripsi083 = $_POST['id_skripsi083'];
    $judul_skripsi083 = $_POST['judul_skripsi083'];
    $topik_083 = $_POST['topik_083'];
    $semester_083 = $_POST['semester_083'];
    $thn_ajaran083 = $_POST['thn_ajaran083'];
    

    $insert = mysqli_query($koneksi,"INSERT INTO skripsi_2511500083 value ('$id_skripsi083','$judul_skripsi083','$topik_083','$semester_083','$thn_ajaran083')");
    if($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert"
        aria-hidden="true">X</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil DIsimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=skripsi_2511500083">';
    }else{
        echo '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"
        aria-hidden="true">X</button
        <h5> <i class="icon fas fa-info"></i> Info </h5>
        <h4>Gagal Disimpan</h4></div>';
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
                                <label for="id_skripsi">ID skripsi</label>
                                <input type="text" name="id_skripsi083" value="<?= $hasilkode; ?>" placeholder="Id Kat" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <Label for="judul_skripsi083">Judul skripsi</label>
                                <input type="text" name="judul_skripsi083" id="judul_skripsi" placeholder="Nama skripsi" class="form-control">
                            </div>
                            <div class="form-group">
                                <Label for="topik_083">Topik</label>
                                <input type="text" name="topik_083" id="topik" placeholder="topik" class="form-control">
                            </div>
                            <div class="form-group">
                                <Label for="semester_083">Semester</label>
                                <select name="semester_083" id="semester" class="form-control">
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
                                <select name="thn_ajaran083" id="thn_ajaran" class="form-control">
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


