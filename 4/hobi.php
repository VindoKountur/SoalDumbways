<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soal Nomor 4</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="logo"><a href="index.php"><h1>Helu School</h1></a></div>
    <nav class="mainnav">
      <ul>
        <li><a href="./profil.php">Add Profile</a></li>
        <li><a href="./hobi.php">Add Hobby</a></li>
      </ul>
    </nav>
  </header>
  <div class="main mid">
    
    <form action="" method="post" class='form__tambah'>
      <h2>Tambah Hobby</h2>
      <label>Nama Hobi</label><input type="text" name="nama_hobi">
      <button type="submit" class='btn-submit'>Tambah</button>
    </form>
  </div>
</body>
</html>
<?php 
  if (isset($_POST['nama_hobi'])) {
    $name = $_POST['nama_hobi'];

    $sql = "INSERT INTO hobby_tb (id, name) VALUES ('', '$name')";

    echo $sql;
    if ($con->query($sql)) {
      header('location:index.php');
    }else{
      echo "gagal";
    }
  }
?>