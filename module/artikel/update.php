<?php
require("../../class/database.php");
require("../../class/form.php");
require("../../template/sidenav.php");

$database = new database();
$Nim = $_GET["Nim"];


if (isset($_POST['submit'])) {
    $data = [
        'Nim' => $_POST['txtNim'],
        'Nama' => $_POST['txtNama'],
        'Kelas' => $_POST['txtKelas'],
        'Status' => $_POST['txtStatus'],
        'Alamat' => $_POST['txtAlamat'],
        'Nomer' => $_POST['txtNomer']
    ];
    $database->update("tb_latihan", $data, "Nim=" . $Nim);
    header("location: Home");
}

$data = $database->get("tb_latihan", "where Nim=" . $Nim);
?>
<html>

<head>
    <title>Update Data Mahasiswa</title>
    <link rel="stylesheet" href="../../template/main.css">
</head>

<body>
    <div class="form-container">
        <h2 style="margin-left: 80px;">Silahkan isi form berikut ini</h2>
        <?php
        $form = new Form("", "submit");
        $form->addField("txtNim", "Nim", $data["Nim"]);
        $form->addField("txtNama", "Nama", $data["Nama"]);
        $form->addField("txtKelas", "Kelas", $data["Kelas"]);
        $form->addField("txtStatus", "Status", $data["Status"]);
        $form->addField("txtAlamat", "Alamat", $data["Alamat"]);
        $form->addField("txtNomer", "Nomer", $data["Nomer"]);
        $form->displayForm();
        ?>
    </div>
    <?php require("../../template/footer.php"); ?>
</body>

</html>