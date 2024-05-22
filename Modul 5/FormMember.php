<?php
require "Koneksi.php";
require "Model.php";

$model = new Model($pdo);
$id_member = isset($_GET['id']) ? $_GET['id'] : '';
$mode = isset($_GET['mode']) ? $_GET['mode'] : '';
if ($mode === 'edit' && $id_member) {
    $member = $model->readMemberById($id_member);
} else {
    $member = array(
        "id_member" => "",
        "nama_member" => "",
        "nomor_member" => "",
        "alamat" => "",
        "tanggal_mendaftar" => "",
        "tanggal_terakhir_bayar" => ""
    );
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = array(
        "id_member" => $_POST['id_member'],
        "nama_member" => $_POST['nama_member'],
        "nomor_member" => $_POST['nomor_member'],
        "alamat" => $_POST['alamat'],
        "tanggal_mendaftar" => date ('Y-m-d H:i:s'),
        "tanggal_terakhir_bayar" => $_POST['tanggal_terakhir_bayar']
    );
    if ($data['id_member']) {
        if ($model->updateMember($data)) {
            header('location: Member.php');
            exit();
        } else {
            echo "Gagal mengupdate member.";
        }
    } else {
        if ($model->insertMember($data)) {
            header('location: Member.php');
            exit();
        } else {
            echo "Gagal menambahkan member.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Member</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e79cff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"] {
            width: calc(100% - 12px); 
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; 
        }

        button[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #bf00ff; 
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #bf00ff; 
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2 class="form-header"><?php echo ($id_member && $mode === 'edit') ? 'Edit' : 'Tambah'; ?> Member</h2>
    <form method="post">
        <input type="hidden" name="id_member" value="<?php echo $member['id_member']; ?>">
        <div>
            <label for="nama_member">Nama Member:</label>
            <input type="text" id="nama_member" name="nama_member" value="<?php echo $member['nama_member']; ?>">
        </div>
        <div>
            <label for="nomor_member">Nomor Member:</label>
            <input type="text" id="nomor_member" name="nomor_member" value="<?php echo $member['nomor_member']; ?>">
        </div>
        <div>
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" value="<?php echo $member['alamat']; ?>">
        </div>
        <div>
            <label for="tanggal_mendaftar">Tanggal Mendaftar:</label>
            <input type="date" id="tanggal_mendaftar" name="tanggal_mendaftar" value="<?php echo $member['tanggal_mendaftar']; ?>">
        </div>
        <div>
            <label for="tanggal_terakhir_bayar">Tanggal Terakhir Bayar:</label>
            <input type="date" id="tanggal_terakhir_bayar" name="tanggal_terakhir_bayar" value="<?php echo $member['tanggal_terakhir_bayar']; ?>">
        </div>
        <button type="submit" name="submit">Simpan</button>
    </form>
</div>
</body>
</html>