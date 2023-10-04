<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Ubah Data Barang</title>
    <style>
        *{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    </style>
</head>

<body>
<?php
include "koneksi.php";
$sql = mysqli_query($koneksi,"SELECT * FROM data_barang WHERE kode_barang='$_GET[kode]'");
$data=mysqli_fetch_array($sql);

?>
   
<section class="container">
<section class="row justify-content-center">
<section class="col-12 col-sm-6 col-md-4">
        <div class="tampilan mp-5 mt-5">
        <form method="post">
        <h1 class="text-center font-weight-bold mb-3 mt-3 pt-3 pb-3">Form Ubah Data</h1>
               
                    <div class="grup">
                        <label class="form-label pt-2" for="kode_barang">Kode Barang</label>
                         <input class="form-control" type="text" name="kode_barang" value="<?php echo $data['kode_barang'];?>">
                    </div>
                    <div class="grup">
                        <label class="form-label pt-2" for="nama_barang">Nama Barang</label>
                         <input class="form-control" type="text" name="nama_barang"value="<?php echo $data['nama_barang'];?>" >
                    </div>
                    <div class="grup">
                        <label class="form-label pt-2" for="harga">Harga</label>
                         <input class="form-control" type="text" name="harga" value="<?php echo $data['harga'];?>" >
                    </div>
                    <div class="grup">
                        <label class="form-label pt-2" for="jumlah">Jumlah Item</label>
                         <input class="form-control" type="text" name="jumlah" value="<?php echo $data['jumlah'];?>" >
                    </div>
                    <div>
                         <input class="btn btn-outline-primary w-100 mt-3" type="submit" value="Ubah" name="proses">
                    </div>
                    <div class="kembali">
                        <a class="btn btn-outline-success w-100 mt-3" href="data.barang.php"> Batal </a>
                    </div>
                
            </form>

        </div>
    </section>
    </section>
    </section>
    <?php
    include "koneksi.php";

    if(isset($_POST['proses'])){
        mysqli_query($koneksi,"UPDATE data_barang SET
        nama_barang = '$_POST[nama_barang]',
        harga = '$_POST[harga]',
        jumlah = '$_POST[jumlah]'
        
        WHERE kode_barang = '$_GET[kode]'");

        echo "<meta http-equiv=refresh content=1;URL='data.barang.php'>";

    }

    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>
