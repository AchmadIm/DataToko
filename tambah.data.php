<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Form Tambah Data</title>
    <style>
        *{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body>
    <section class="container">
    <section class="row justify-content-center">
    <section class="col-12 col-sm-6 col-md-4">
        
        <div class="tampilan mp-5 mt-5">
            <form method="post">
                <h1 class="text-center font-weight-bold mt-3 mb-3" >Form Tambah Data</h1>

                    <div class="grup">
                        <label class="form-label pt-2" for="kode_barang">Kode Barang</label>
                         <input class="form-control" type="text" name="kode_barang">
                    </div>
                    <div class="grup">
                        <label class="form-label pt-2" for="nama_barang">Nama Barang</label>
                         <input class="form-control" type="text" name="nama_barang">
                    </div>
                    <div  class="grup">
                        <label class="form-label pt-2" for="harga">Harga</label>
                         <input class="form-control" type="text" name="harga">
                    </div>
                    <div class="grup">
                        <label class="form-label pt-2" for="jumlah">Jumlah Item</label>
                         <input class="form-control" type="text" name="jumlah">
                    </div>
                        <div class="submit">
                            <input class=" btn btn-outline-primary w-100 mt-3" type="submit" value="Submit" name="proses">
                        </div>
                        <div class="kembali">
                            <a class="btn btn-outline-success w-100 mt-3" href="data.barang.php"> Ke Data Barang </a>
                        </div>
                    
            </form>
           
        </div>
    </section>
    </section>
    </section>



    <?php
    include "koneksi.php";

    if(isset($_POST['proses'])){
        mysqli_query($koneksi,"INSERT INTO data_barang SET
        kode_barang = '$_POST[kode_barang]',
        nama_barang = '$_POST[nama_barang]',
        harga = '$_POST[harga]',
        jumlah = '$_POST[jumlah]'");

        echo "<meta http-equiv=refresh content=1;URL='data.barang.php'>";

    }

    ?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>