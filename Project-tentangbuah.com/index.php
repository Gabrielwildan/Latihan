<?php

    require_once('db.php'); 

    if (isset($_GET['id'])& isset($_GET['menu'])) {
        $id=$_GET['id']; 
        $menu=$_GET['menu'];
        if ($menu=='hapus') {
            $buah='';
            $deskripsi='';
            $harga='';
            $sql="DELETE FROM tblbuah WHERE idbuah = $id";
            $koneksi->query($sql); 
            header("location:./");
        }else {
            $sql="SELECT * FROM tblbuah WHERE idbuah = $id";
            $hasil=$koneksi->query($sql);
            $row=$hasil->fetch_array();
             
                $buah = $row[1];
                $deskripsi =  $row[2];
                $harga = $row[3];
             
            
        }
        
    }else {
        $buah = '';
        $deskripsi = '';
        $harga = '';
    }



?>


<form action="" method="post">
    buah
    <input type="text" name="buah" value="<?=$buah?>">
    <br>
    deskripsi
    <input type="text" name="deskripsi" value="<?=$deskripsi?>">
    <br>
    harga
    <input type="number" name="harga" value="<?=$harga?>">
    <br>
    <input type="submit" name="simpan" value="Simpan">
</form>

<?php



    if (isset($_POST['simpan'])) {
        
        if (isset($_GET['menu'])) {
            $id=$_GET['id'];
            $buah=$_POST['buah'];
            $deskripsi=$_POST['deskripsi'];
            $harga=$_POST['harga'];
            $sql="UPDATE tblbuah SET buah='$buah',deskripsi='$deskripsi',harga=$harga WHERE idbuah = $id ";
            $koneksi->query($sql);
            header("location:./");
        }else {
            $buah=$_POST['buah'];
            $deskripsi=$_POST['deskripsi'];
            $harga=$_POST['harga']; 
            $sql="INSERT INTO tblbuah (buah,deskripsi,harga) VALUES ('$buah','$deskripsi',$harga)";
            $koneksi->query($sql);  
        }
       
        
       
        

    }

    
    $sql='SELECT * FROM tblbuah';

    // echo $sql;

    $hasil=$koneksi->query($sql);

    // print_r($hasil);

    // echo $hasil->num_rows;

    echo '<table border>';
    echo '<tr> 
    <th>idbuah</th> 
    <th>buah</th>
    <th>deskripsi</th>
    <th>harga</th>
    <th>gambar</th>
    <th>hapus</th>
    <th>Ubah</th>
    </tr>';
    
    if ($hasil->num_rows > 0) {
        while ($row=$hasil->fetch_array()) {
            echo '<tr>';
            echo '<td>'.$row[0].'</td>';
            echo '<td>'.$row[1].'</td>';
            echo '<td>'.$row[2].'</td>';
            echo '<td>'.$row[3].'</td>';
            echo '<td>'.$row[4].'</td>';
            echo '<td><a href="?id='.$row[0].'&menu=hapus"> hapus </a></td>';
            echo '<td><a href="?id='.$row[0].'&menu=edit"> Edit </a></td>';
            echo '</tr>';
        }
    } else {
       echo 'kosong';
    }
    
    echo '</table>';


    // require_once('db.php');

    // $sql='SELECT * FROM tbltrman';

    // $result=$koneksi->query($sql);

    // echo '<table border>';
    // echo '<tr>
    //     <th>idteman</th>
    //     <th>namateman</th>
    //     <th>alamat</th>
    //     <th>asalsekolah</th>
    //     </tr>';

    // if ($result->num_rows > 0) {
    //    while ($row=$result->fetch_array()) {
    //     echo '<tr>';
    //     echo '<td>'.$row[0].'</td>';
    //     echo '<td>'.$row[1].'</td>';
    //     echo '<td>'.$row[2].'</td>';
    //     echo '<td>'.$row[3].'</td>';
    //     echo '</tr>';
    //    }
    // } else {
    //     echo 'empty';
    // }

    // echo '</table>';
    

?>