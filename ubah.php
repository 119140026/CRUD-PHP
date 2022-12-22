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

    function edit($post){
        global $db;

        $id = $post['id'];
        $nama = $post['nama'];
        $nim = $post['nim'];
        $prodi = $post['prodi'];

        $query = "UPDATE mhs SET nama='$nama', nim='$nim', prodi='$prodi' WHERE id='$id'";

        mysqli_query($db,$query);

        return mysqli_affected_rows($db);
    }
    
    $id = (int)$_GET['id'];

    $mhs = select("SELECT * FROM mhs WHERE id = $id")[0];

    if (isset($_POST['tambah'])){
        if(edit($_POST)>0){
            echo "<script>
                    alert('Berhasil diedit');
                    document.location.href='index.php';
                </script>";
        } else{
            echo "<script>
                    alert('Gagal diedit');
                    document.location.href='index.php';
                </script>";
        }
    }
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
        <H3>Edit Data Mahasiswa ITERA</H3> <br>
        
        <form action="" method="post">
            <div class="mb-3">
                <input type='hidden' name="id" value= "<?= $mhs['id'];?>">

                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value = "<?= $mhs['nama'];?>">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim" value = "<?= $mhs['nim'];?>">
                <label for="prodi" class="form-label">Prodi</label>
                <input type="text" class="form-control" id="prodi" name="prodi" value = "<?= $mhs['prodi'];?>">
                <br>
                <button type="submit" name="tambah" class="btn btn-primary">EDIT</button>
            </div>
        </form>

    </div>


    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>