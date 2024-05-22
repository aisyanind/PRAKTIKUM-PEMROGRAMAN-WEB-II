<?php
require 'Koneksi.php';
require 'Model.php';

$model = new Model($pdo);
if (isset($_POST['submit'])) {
    $data = array(
        'judul_buku' => $_POST['judul'],
        'penulis' => $_POST['pengarang'],
        'penerbit' => $_POST['penerbit'],
        'tahun_terbit' => $_POST['tahun_terbit']
    );
    if (empty($data['judul_buku']) || empty($data['penulis']) || empty($data['penerbit']) || empty($data['tahun_terbit'])) {
        echo "Error: Semua bidang harus diisi.";
    } else {
        if ($model->insertBuku($data)) {
            echo "Data buku berhasil ditambahkan.";
            header('Location: Buku.php');
            exit();
        } else {
            echo "Error: Gagal menambahkan data buku.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e79cff; 
        }
        .form-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #fff; 
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px; 
        }
        .form-container h2 {
            text-align: center;
            color: #333;
        }
        .form-container label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        .form-container input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #8359a3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-container input[type="submit"]:hover {
            background-color: #6b47a2;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Formulir Data Buku</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="judul">Judul Buku:</label>
        <input type="text" id="judul" name="judul">

        <label for="pengarang">Pengarang Buku:</label>
        <input type="text" id="pengarang" name="pengarang">

        <label for="penerbit">Penerbit Buku:</label>
        <input type="text" id="penerbit" name="penerbit">

        <label for="tahun_terbit">Tahun Terbit Buku:</label>
        <input type="text" id="tahun_terbit" name="tahun_terbit">

        <input type="submit" name="submit" value="Tambah">
    </form>
</div>
</body>
</html>