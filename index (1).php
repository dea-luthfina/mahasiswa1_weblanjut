<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "akademik";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    test koneksi
    if(!$conn){
        echo mysqli_error($conn);
    } else{
        echo "berhasil terknoneksi ke database";
    }

    // buat tabel
    $table_name = "mahasiswa";

    $query = "CREATE TABLE mahasiswa (
        id_mahasiswa INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        nama VARCHAR(20),
        nim INT(5),
        tugas INT(5),
        uts INT(5),
        uas INT(5)
    );";


    $result = mysqli_query($conn, $query);
    if(!$result){
        echo mysqli_error($result);
    } else{
        echo "berhasil menambahkan tabel";
    }

    // input data
    $sql = "INSERT INTO `mahasiswa`(`id_mahasiswa`, `nama`, `nim`, `tugas`, `uts`, `uas`) VALUES 
    ('','Dea Luthfina A','2107412046','90','90','100'),
    ('','Daffara Chairunnisa Z','2107412043','80','85','90'),
    ('','Kanira Erliana Azwa Z','2107412041','100','90','95'),
    ('','Ghania Shafiqa R','2107412053','90','85','95'),
    ('','Galih Lanjar P','2107412037','80','85','100');";

    //mengambil data
    $select = mysqli_query($conn, "SELECT * FROM mahasiswa");

    $query = "SELECT id_mahasiswa, nama, nim, tugas, uts, uas, (tugas+uts+uas)/3 AS nilai_akhir FROM mahasiswa;";
    $temp = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <title>Data Akademik</title>
        <style>
            .container{
                width: 60%;
                margin-top: 10%;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h3>DATA AKADEMIK MAHASISWA</h3>
            <table class="table table-bordered">
                <thead class="table-dark">
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Tugas</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Nilai Akhir</th>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_array($temp)):
                    ?>
                    <tr>
                        <td><?= $row["id_mahasiswa"];?></td>
                        <td><?= $row["nama"];?></td>
                        <td><?= $row["nim"];?></td>
                        <td><?= $row["tugas"];?></td>
                        <td><?= $row["uts"];?></td>
                        <td><?= $row["uas"];?></td>
                        <td><?= $row["nilai_akhir"]?></td>
                    </tr>
                    <?php
                        endwhile;
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>

