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
    
    function hapus($id){
        global $db;

        $query = "DELETE FROM mhs WHERE id=$id";

        mysqli_query($db,$query);

        return mysqli_affected_rows($db);
    }
    
    $id = (int)$_GET['id'];

    $mhs = select("SELECT * FROM mhs WHERE id = $id")[0];

        if(hapus($id)>0){
            echo "<script>
                    alert('Berhasil dihapus');
                    document.location.href='index.php';
                </script>";
        } else{
            echo "<script>
                    alert('Gagal dihapus');
                    document.location.href='index.php';
                </script>";
        }
    
?>