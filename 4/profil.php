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
  <?php 
    include 'koneksi.php';
    $sqlHobby = "SELECT * FROM hobby_tb";
    $queryHobby = $con->query($sqlHobby);
  ?>

    <form action="" method="post" class='form__tambah' enctype="multipart/form-data">
      <h2>Tambah Profile</h2>
      <label>Nama</label><input type="text" name="nama">
      <label>Tanggal Lahir</label><input type="date" name="born_date">
      <label>Alamat</label><input type="text" name="address">
      <label> Hobby</label><select name="hobby">
        <?php 
          while ($dataHobby = $queryHobby->fetch_assoc()){
            echo "
            <option value='$dataHobby[id]'>$dataHobby[name]</option>
            ";
          }
        ?>
      </select>
      <label>Foto</label><input type="file" name="foto">
      <button type="submit" class='btn-submit'>Tambah</button>
    </form>
  </div>
</body>
</html>

<?php 
  if (isset($_POST['nama'])) {
    $name = $_POST['nama'];
    $bornDate = $_POST['born_date'];
    $address = $_POST['address'];
    $hobby = $_POST['hobby'];

    $target_dir = "uploads/";
    $namePhoto = $_FILES["foto"]['name'];
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $sql = "INSERT INTO profile_tb (id, name, born_date, address, hobby_id, photo) VALUES ('', '$name', '$bornDate', '$address', '$hobby', '$namePhoto')";
    if ($con->query($sql)) {
      move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
      header('location:index.php');

    }else{
      echo "gagal";
    }
  }
?>