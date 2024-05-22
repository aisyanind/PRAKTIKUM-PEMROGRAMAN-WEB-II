<?php
require "Koneksi.php";
require "Model.php";

$model = new Model($pdo);
if (!empty($_GET['id_peminjaman'])) {
    $id_peminjaman = $_GET['id_peminjaman'];
    $model->deleteDataByStruktur("peminjaman", $id_peminjaman, "id_peminjaman");
    header('location:Peminjaman.php');
    exit(); 
}
if (isset($_POST['submit']) && empty($_POST['id_peminjaman'])) {
    $data = array(
        'tanggal_pinjam' => $_POST['tanggal_pinjam'],
        'tanggal_kembali' => $_POST['tanggal_kembali'],
    );
    if ($model->insertPeminjaman($data)) {
        echo "Data Peminjaman berhasil ditambahkan.";
    } else {
        echo "Error: Gagal menambahkan data peminjaman.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #87cefa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .btn {
            background-color: #1692c6;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            text-decoration: none;
            margin: 5px;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #1692c6;
        }
        .btn-danger {
            background-color: #f44336;
        }
        .btn-danger:hover {
            background-color: #e53935;
        }
        .btn-secondary {
            background-color: #1692c6;
        }
        .btn-secondary:hover {
            background-color: #1692c6;
        }
        .action {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Peminjaman</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Peminjaman</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Kembali</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $result = $model->readAllData("peminjaman");
            if ($result !== false && !empty($result)) {
                foreach ($result as $data) { ?>
                    <tr>
                        <td><?php echo $data['id_peminjaman'] ?></td>
                        <td><?php echo $data['tanggal_pinjam'] ?></td>
                        <td><?php echo $data['tanggal_kembali'] ?></td>
                        <td class="action">
                            <a href="FormPeminjaman.php?id_peminjaman=<?php echo $data['id_peminjaman']; ?>"><button class="btn">Edit</button></a>
                            <a href="Peminjaman.php?id_peminjaman=<?php echo $data['id_peminjaman']; ?>" onclick="return confirm('Hapus data?')"><button class="btn btn-danger">Hapus</button></a>
                        </td>  
                    </tr>
                <?php }
            } else {
                echo '<tr><td colspan="6">Tidak ada data peminjaman</td></tr>';
            }
            ?>
            </tbody>
        </table>
        <div style="text-align: center;">
            <a href="FormPeminjaman.php"><button class="btn">Tambah Data Peminjaman</button></a>
        </div>
    </div>
</body>
</html>