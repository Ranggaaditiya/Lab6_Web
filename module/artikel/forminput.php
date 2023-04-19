<?php
require("../../class/database.php");
require("../../class/form.php");
require("../../template/sidenav.php");

$database = new database();

if (isset($_POST['submit'])) {
  $data = [
    'Nim' => $_POST['txtNim'],
    'Nama' => $_POST['txtNama'],
    'Kelas' => $_POST['txtKelas'],
    'Status' => $_POST['txtStatus'],
    'Alamat' => $_POST['txtAlamat'],
    'Nomer' => $_POST['txtNomer']
  ];
  $database->insert('tb_latihan', $data);
  // Menampilkan notifikasi jika data berhasil disimpan
  echo "<script>alert('Data berhasil disimpan')</script>";
}
?>
<html>

<head>
  <title>Identitas Mahasiswa</title>
  <link rel="stylesheet" href="../../template/main.css">
</head>

<body>
  <div class="form-container">
    <h2 style="margin-left: 80px;">Silahkan isi form berikut ini</h2>
    <?php
    $form = new Form("form_input.php", "submit");
    $form->addField("txtNim", "Nim");
    $form->addField("txtNama", "Nama");
    $form->addField("txtKelas", "Kelas");
    $form->addField("txtStatus", "Status");
    $form->addField("txtAlamat", "Alamat");
    $form->addField("txtNomer", "Nomer");
    $form->displayForm();
    ?>
  </div>
  <?php require("../../template/footer.php"); ?>
</body>

</html>