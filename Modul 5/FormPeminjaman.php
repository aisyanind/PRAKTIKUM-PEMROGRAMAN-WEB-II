<?php
require "koneksi.php";
require "model.php";
$model = new Model($pdo);

if (isset($_POST['submit'])) {
    $data = array(
        "id_peminjaman" => $_POST['id_peminjaman'] . "'",
        "tanggal_pinjam" => date('Y-m-d', strtotime($_POST['tanggal_pinjam'])) . "'",
        "tanggal_kembali" => date('Y-m-d', strtotime($_POST['tanggal_kembali'])) . "'",
    );
    $model->insertPeminjaman($data, 'Peminjaman');
    header('location:Peminjaman.php');
}

if (isset($_POST['edit'])) {
    $id = isset($_GET['id_peminjaman']) ? $_GET['id_peminjaman'] : '';
    $data = array(
        "id_peminjaman" => $_POST['id_peminjaman'] . "'",
        "tanggal_pinjam" => date('Y-m-d', strtotime($_POST['tanggal_pinjam'])) . "'",
        "tanggal_kembali" => date('Y-m-d', strtotime($_POST['tanggal_kembali'])) . "'",
    );
    $model->updateData('Peminjaman', 'id_peminjaman', $id, $data);
    header("location:Peminjaman.php");
}

if (isset($_POST['kembali'])) {
    header("location:Peminjaman.php");
}

$id = isset($_GET['id_peminjaman']) ? $_GET['id_peminjaman'] : '';
$data = $model->selectDataById('peminjaman', $id, "id_peminjaman");

?>
<!doctype html>
<html lang="en">
<head>
    <title>Form Peminjaman</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FF6FFF;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: auto;
            overflow: hidden;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        button {
            width: 300px;
            background-color: #E0115F;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
        }
        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($_GET['id_peminjaman'])) : ?>
            <h1>Edit Peminjaman</h1>
            <form method="POST">
                <div>
                    <label for="id_peminjaman">ID Peminjaman:</label>
                    <input type="text" id="id_peminjaman" name="id_peminjaman" value="<?php echo isset($data['id_peminjaman']) ? htmlspecialchars($data['id_peminjaman']) : ''; ?>" required>
                </div>
                <div>
                    <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                    <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" value="<?php echo isset($data['tanggal_pinjam']) ? htmlspecialchars($data['tanggal_pinjam']) : ''; ?>" required>
                </div>
                <div>
                    <label for="tanggal_kembali">Tanggal Kembali:</label>
                    <input type="date" id="tanggal_kembali" name="tanggal_kembali" value="<?php echo isset($data['tanggal_kembali']) ? htmlspecialchars($data['tanggal_kembali']) : ''; ?>" required>
                </div>
                <div class="button-container">
                    <button type="submit" name="edit">Simpan Perubahan</button>
                </div>
            </form>
        <?php else : ?>
            <h1>Tambah Peminjaman</h1>
            <form method="POST">
                <div>
                    <label for="id_peminjaman">ID Peminjaman:</label>
                    <input type="text" id="id_peminjaman" name="id_peminjaman">
                </div>
                <div>
                    <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                    <input type="date" id="tanggal_pinjam" name="tanggal_pinjam">
                </div>
                <div>
                    <label for="tanggal_kembali">Tanggal Kembali:</label>
                    <input type="date" id="tanggal_kembali" name="tanggal_kembali">
                </div>
                <div class="button-container">
                    <button type="submit" name="submit">Tambah Data</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>