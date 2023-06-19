<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    // Menghubungkan ke database
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'mydatabase';

    $koneksi = mysqli_connect($host, $username, $password, $database);

    // Memeriksa koneksi database
    if (mysqli_connect_errno()) {
      echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
      exit();
  }

  // Mengambil data mahasiswa dari database
  $query = "SELECT * FROM mahasiswa";
  $result = mysqli_query($koneksi, $query);

  // Menampilkan data mahasiswa
  echo "<table>";
  echo "<tr><th>NIM</th><th>Nama</th><th>Prodi</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
      $nim = $row['nim'];
      $nama = $row['nama'];
      $prodi = $row['prodi'];

      echo "<tr>";
      echo "<td>$nim</td>";
      echo "<td>$nama</td>";
      echo "<td>$prodi</td>";
      echo "</tr>";
  }
  echo "</table>";

  // Menutup koneksi database
  mysqli_close($koneksi);
  ?>
</body>
</html>