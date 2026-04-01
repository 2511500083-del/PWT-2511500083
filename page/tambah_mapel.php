<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Mata Pelajaran</h1>
        </div>
    </div>
  </div>
</div>
<?php
$carikode = mysqli_query($koneksi, "select max(kd_mapel) from mapel") or die (
    mysqli_error());
$datakode = mysqli_fetch_array($carikode);
if($datakode) {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    
}
)


