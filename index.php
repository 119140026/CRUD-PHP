<?php 
    $db= mysqli_connect('localhost','root','','mahasiswa');

    function select($query){
        global $db;

        $result = mysqli_query($db,$query);
        $rows=[];

        while($row= mysqli_fetch_assoc($result)){
            $rows[] =$row;
        }

        return $rows;
    }
    $mhs = select("SELECT * FROM mhs");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>119140026</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-5">
        <H3>CRUD Mahasiswa ITERA</H3> <br>
        <a href="tambah.php" class="btn btn-primary">ADD</a>

        <table class="table table-hover">
            <thead>
                <tr>
                <th >ID</th>
                <th >Nama</th>
                <th >NIM</th>
                <th >Prodi</th>
                <th >Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;?>
                <?php foreach ($mhs as $mhs):?>
                <tr>
                <td><?= $no++;?></td>
                <td><?= $mhs['nama'];?></td>
                <td><?= $mhs['nim'];?></td>
                <td><?= $mhs['prodi'];?></td>
                <td>
                    <a href="ubah.php?id=<?=$mhs['id'];?>" class="btn btn-warning">EDIT</a>
                    <a href="hapus.php?id=<?=$mhs['id'];?>" class="btn btn-danger" onclick= "return confirm('Yakin datanya mau dihapus?');">DELETE</a>
                </td>
                </tr>
                <?php endforeach;?>
                
            </tbody>
        </table>
    </div>


    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>