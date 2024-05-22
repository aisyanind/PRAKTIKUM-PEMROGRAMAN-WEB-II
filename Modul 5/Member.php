<?php
require "Koneksi.php";
require "Model.php";

$model = new Model($pdo);
if (isset($_POST['delete'])) {
    $id_member_to_delete = $_POST['id_member'];
    $model->deleteMember($id_member_to_delete);
}
$members = $model->readAllMembers();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Member</title>
    <style>
        body {
            text-align: center;
            background-color: #ffadad; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            padding-top: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px auto;
            background-color: #fff; 
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            background-color: #ff0000;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #ff0000;
        }
        .add-button {
            display: block;
            margin: 20px auto;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Data Member</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Nomor</th>
            <th>Alamat</th>
            <th>Tanggal Daftar</th>
            <th>Tanggal Bayar Terakhir</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($members as $member): ?>
            <tr>
                <td><?php echo $member['id_member']; ?></td>
                <td><?php echo $member['nama_member']; ?></td>
                <td><?php echo $member['nomor_member']; ?></td>
                <td><?php echo $member['alamat']; ?></td>
                <td><?php echo $member['tanggal_mendaftar']; ?></td>
                <td><?php echo $member['tanggal_terakhir_bayar']; ?></td>
                <td>
                    <form style="display: inline-block;" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus member ini?')">
                        <input type="hidden" name="id_member" value="<?php echo $member['id_member']; ?>">
                        <button type="submit" name="delete">Hapus</button>
                    </form>
                    <a href="FormMember.php?mode=edit&id=<?php echo $member['id_member']; ?>"><button>Edit</button></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="add-button">
        <a href="FormMember.php?mode=tambah"><button>Tambah Member</button></a>
    </div>
</div>
</body>
</html>