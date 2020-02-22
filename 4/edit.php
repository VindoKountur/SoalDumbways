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
    $id = $_GET['id'];
    $sqlGet = "SELECT * FROM profile_tb WHERE id = '$id'";
    $queryGet = $con->query($sqlGet);
    $dataGet = $queryGet->fetch_assoc();
    $sqlHobby = "SELECT * FROM hobby_tb";
    $queryHobby = $con->query($sqlHobby);
  ?>

    <form action="" method="post" class='form__tambah' enctype="multipart/form-data">
      <h2>Edit Profile</h2>
      <label>Nama</label><input type="text" name="nama" value="<?= $dataGet['name'] ?>">
      <label>Tanggal Lahir</label><input type="date" name="born_date" value="<?= $dataGet['born_date'] ?>">
      <label>Alamat</label><input type="text" name="address" value="<?= $dataGet['address'] ?>">
      <label>Hobby</label><select name="hobby">
        <?php 
          while ($dataHobby = $queryHobby->fetch_assoc()){
            if ($dataGet['hobby_id'] == $dataHobby['id']) {
              echo "
              <option value='$dataHobby[id]' selected>$dataHobby[name]</option>
              ";
            }else{
              echo "
              <option value='$dataHobby[id]'>$dataHobby[name]</option>
              ";
            }
           
          }
        ?>
      </select>
      <!-- <label>Foto : <input type="file" name="foto"></label> -->
      <button type="submit" class='btn-submit'>Edit</button>
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
    $sql = "UPDATE profile_tb SET name = '$name', born_date = '$bornDate', address = '$address', hobby_id = '$hobby' WHERE id = '$id'";

    if ($con->query($sql)) {
      header('location:index.php');
    }else{
      echo "gagal";
    }
  }
?>