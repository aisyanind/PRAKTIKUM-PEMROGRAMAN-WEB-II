<?php
require 'Koneksi.php';
require 'Model.php';

$model = new Model($pdo);
if (isset($_GET['action']) && $_GET['action'] === 'delete' && !empty($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];
    $model->deleteDataByStruktur("buku", $id_buku, "id_buku");
    header('Location: Buku.php');
    exit();
}
if (isset($_POST['submit']) && empty($_POST['id_buku'])) {
    $data = array(
        'judul_buku' => $_POST['judul'],
        'penulis' => $_POST['pengarang'],
        'penerbit' => $_POST['penerbit'],
        'tahun_terbit' => $_POST['tahun_terbit']
    );

    if ($model->insertBuku($data)) {
        echo "Data buku berhasil ditambahkan.";
    } else {
        echo "Error: Gagal menambahkan data buku.";
    }
}
if (isset($_POST['update'])) {
    $id_buku = $_POST['id_buku'];
    $data = [
        'judul_buku' => $_POST['judul_buku'],
        'penulis' => $_POST['penulis'],
        'penerbit' => $_POST['penerbit'],
        'tahun_terbit' => $_POST['tahun_terbit']
    ];
    $model->updateData('buku', 'id_buku', $id_buku, $data); 
    header('Location: Buku.php');
}
$bukuToEdit = null;
if (isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];
    $bukuToEdit = $model->readDataByStruktur($id_buku);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Buku Perpus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e79cff; 
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #6b47a2;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-danger {
            background-color: #f44336;
        }
        .btn:hover {
            background-color: #6b47a2;
        }
        .btn-danger:hover {
            background-color: #d32f2f;
        }
        .form-container {
            max-width: 500px;
            margin: 0 auto;
        }
        .form-container form {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
        }
        .form-container label, .form-container input[type="text"] {
            display: block;
            margin-bottom: 10px;
        }
        .form-container input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input[type="submit"] {
            padding: 10px 16px;
            background-color: #6b47a2;
            color: #6b47a2;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #6b47a2;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Buku</h1>
    <?php if ($bukuToEdit): ?>
        <div class="form-container">
            <h2>Edit Buku</h2>
            <form method="post" action="Buku.php">
                <input type="hidden" name="id_buku" value="<?php echo htmlspecialchars($bukuToEdit['id_buku']); ?>">
                <label for="judul">Judul Buku:</label>
                <input type="text" id="judul" name="judul_buku" value="<?php echo htmlspecialchars($bukuToEdit['judul_buku']); ?>">

                <label for="pengarang">Pengarang Buku:</label>
                <input type="text" id="pengarang" name="penulis" value="<?php echo htmlspecialchars($bukuToEdit['penulis']); ?>">

                <label for="penerbit">Penerbit Buku:</label>
                <input type="text" id="penerbit" name="penerbit" value="<?php echo htmlspecialchars($bukuToEdit['penerbit']); ?>">

                <label for="tahun_terbit">Tahun Terbit Buku:</label>
                <input type="text" id="tahun_terbit" name="tahun_terbit" value="<?php echo htmlspecialchars($bukuToEdit['tahun_terbit']); ?>">

                <input type="submit" name="update" value="Update" class="btn">
            </form>
        </div>
    <?php else: ?>
        <table>
            <thead>
            <tr>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $result = $model->readAllData('buku');
            if ($result !== false) {
                foreach ($result as $data) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($data['id_buku']); ?></td>
                        <td><?php echo htmlspecialchars($data['judul_buku']); ?></td>
                        <td><?php echo htmlspecialchars($data['penulis']); ?></td>
<td><?php echo htmlspecialchars($data['penerbit']); ?></td>
<td><?php echo htmlspecialchars($data['tahun_terbit']); ?></td>
<td class="actions">
    <a href="Buku.php?id_buku=<?php echo htmlspecialchars($data['id_buku']); ?>" class="btn btn-primary">Edit</a>
    <a href="Buku.php?action=delete&id_buku=<?php echo htmlspecialchars($data['id_buku']); ?>" onclick="return confirm('Hapus data?')" class="btn btn-danger">Hapus</a>
</td>
</tr>
<?php }
             } else {
                 echo '<tr><td colspan="6">No data found</td></tr>';
             }
             ?>
             </tbody>
        </table>
        <br>
        <div style="text-align: center;">
            <a href="FormBuku.php" class="btn btn-success">Tambah Buku</a>
        </div>
    <?php endif; ?>
</div>
</body>
</html>