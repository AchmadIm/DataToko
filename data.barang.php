<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Data Barang</title>
    <style>
        *{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body>


        <div class="data container">
        <div class="container-fluit">
            <table class="table table-striped table-hover mt-4" border="2">
            <h1 class="text-center mt-3 mb-3 pt-3 pb-3">Data Barang</h1>
                 <div class="container-fluit d-flex">
                        <form action="data.barang.php" menthod="get">

                        <input class=" cari form-control d-flex m-1 w-100" type="text" placeholder="Cari Barang" aria-label="Search" name="keyword" autocomplete="off" value="<?php if(isset($_GET['keyword'])) { echo $_GET['keyword']; } ?>">
                        <button class=" btn btn-outline-warning m-1 d-flex mt-2 mb-2" type="submit" name="cari" >Search</button>

                        <a class="btn btn-outline-success m-1 " href="tambah.data.php"> Input Data </a>

                        </form>
                    </div>   

                <tr class="text-center " style="background-color: #FFED00;" >
                    <th class="tabel">No</th>
                    <th class="tabel">Kode Barang</th>
                    <th class="tabel">Nama Barang</th>
                    <th class="tabel">Harga</th>
                    <th class="tabel">Jumlah</th>
                    <th class="tabel">Aksi</th>
                </tr>
    
                       

                <?php
                    include "koneksi.php";

                    $no = 1;
                    $ambildata = mysqli_query($koneksi,"SELECT * FROM data_barang");

                    if(isset($_GET['keyword'])){
                        $keyword = $_GET['keyword'];

                        $query = "SELECT * FROM data_barang WHERE kode_barang like '%".$keyword."%' OR nama_barang like '%".$keyword."%' OR harga like '%".$keyword."%' OR jumlah like '%".$keyword."%' ORDER BY kode_barang ASC" ;
                    }else{
                        $query = "SELECT * FROM data_barang ORDER BY kode_barang ASC";
                    }

                    $result = mysqli_query($koneksi, $query);

                    if(!$result){
                        die("Query Error : ".mysqli_errno($koneksi)."-".mysqli_errno($koneksi));
                    }
                    while ($tampil = mysqli_fetch_assoc($result)){
                        echo "
                        <tr align='center'>
                        <td> $no </td>
                        <td> $tampil[kode_barang] </td>
                        <td> $tampil[nama_barang] </td>
                        <td> $tampil[harga] </td>
                        <td> $tampil[jumlah] </td> 
                        <td> <a href = '?kode=$tampil[kode_barang]' class='btn btn-sm btn-danger'> Hapus </a>  <a href = 'update.php?kode=$tampil[kode_barang]' class='btn btn-sm btn-success mt-2 mb-2'>Ubah</a> </td>           
                        </tr> ";                     
                    }

                
                ?>

                                  
            </table>
        
        </div>
        </div>
       

<?php
if(isset($_GET['kode'])){

    mysqli_query($koneksi,"DELETE FROM data_barang WHERE kode_barang='$_GET[kode]'");

    echo "<meta http-equiv=refresh content=2;URL='data.barang.php'>";
}
?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>
