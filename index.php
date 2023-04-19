<?php
require('koneksi.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Data Barang</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container">
    <h1>Data Barang</h1>
    <div class="main">
      <a href='tambah.php' class="btn">Tambah Barang</a>
      <table>
        <tr>
          <th>Gambar</th>
          <th>Nama Barang</th>
          <th>Kategori</th>
          <th>Harga Jual</th>
          <th>Harga Beli</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
        <?php
        $sql = "SELECT * FROM data_barang";
        $result = mysqli_query($conn, $sql);
        ?>
        <?php if (mysqli_num_rows($result) > 0) : ?>
          <?php while ($row = mysqli_fetch_array($result)) : ?>
            <tr>
              <td><img src="gambar/<?php echo $row['gambar']; ?>" width="60" height="80" /></td>
              <td><?php echo $row['nama']; ?></td>
              <td><?php echo $row['kategori']; ?></td>
              <td><?php echo $row['harga_jual']; ?></td>
              <td><?php echo $row['harga_beli']; ?></td>
              <td><?php echo $row['stok']; ?></td>
              <td>
                <a href="ubah.php?id=<?php echo $row['id_barang']; ?>" class="btn">Ubah</a>
                <a href="hapus.php?id=<?php echo $row['id_barang']; ?>" class="btn">Hapus</a>
              </td>
            </tr>
          <?php endwhile; ?>
          <?php mysqli_data_seek($result, 0); ?>
        <?php else : ?>
          <tr>
            <td colspan="7">Belum ada data</td>
          </tr>
        <?php endif; ?>
      </table>
    </div>
  </div>
</body>

</html>
