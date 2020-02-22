<?php 
  include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soal Nomor 4</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
     $id = $_GET['id'];
     $sql = "SELECT * FROM profile_tb WHERE id = $id";
     $query = $con->query($sql);
    ?>
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
        $data = $query->fetch_assoc();
        $id = $data['id'];
        $name = $data['name'];
        $photo = $data['photo'];
        $id_hobby = $data['hobby_id'];

        $sqlHobby = "SELECT * FROM hobby_tb WHERE id = '$id_hobby'";
        $queryHobby = $con->query($sqlHobby);
        $dataHobby = $queryHobby->fetch_assoc();
        $hobbyName = $dataHobby['name'];
    ?>
    <div class='doingFlex'>
      <div class="fotobutton">
        <img src="./uploads/<?= $photo ?>" alt="Foto" height='450'>
        <a href="index.php" class='btn-submit'>Back</a>
      </div>
      <div class="detailprofil">
        <h3>Detail Profil</h3>
        <table>
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $name ?></td>
          </tr>
          <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><?= $data['born_date'] ?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $data['address'] ?></td>
          </tr>
          <tr>
            <td>Hobi</td>
            <td>:</td>
            <td><?= $hobbyName ?></td>
          </tr>
        </table>
      </div>
    </div>
    
  </div>
</body>
</html>