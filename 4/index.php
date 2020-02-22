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
     $sql = "SELECT * FROM profile_tb";
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
  <div class="main">
    <?php 
      while ($data = $query->fetch_assoc()) {
        $id = $data['id'];
        $name = $data['name'];
        $photo = $data['photo'];
        $id_hobby = $data['hobby_id'];

        $sqlHobby = "SELECT * FROM hobby_tb WHERE id = '$id_hobby'";
        $queryHobby = $con->query($sqlHobby);
        $dataHobby = $queryHobby->fetch_assoc();
        $hobbyName = $dataHobby['name'];

        echo "
        <div class='box'>
        <div class='box__data'>
          <img src='./uploads/$photo' height='300' width='230' alt='Foto'>
          <h3 class='box__data__nama'>$name</h3>
          <p class='box__data__hobby'>$hobbyName</p>
        </div>
        <div>
          <button class='box__btn'>Detail</button>
        </div>
        <div>
          <button class='box__btn edit'><a href='edit.php?id=$id'>Edit</a></button>
        </div>
        <div>
          <button class='box__btn hapus'><a href='del.php?id=$id'>Hapus</a></button>
        </div>
      </div>
        ";
      }
    ?>
    
  </div>
</body>
</html>