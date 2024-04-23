<?php
function validateStudentData($name, $nim, $gender) {
    $errors = [];
    if (empty($name)) {
        $errors["nama"] = "Nama tidak boleh kosong";}
    if (empty($nim)) {
        $errors["nim"] = "NIM tidak boleh kosong";}
    if (empty($gender)) {
        $errors["jenis_kelamin"] = "Jenis kelamin tidak boleh kosong";}
    return $errors;}

function main() {
    $errors = [];
    $studentData = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['nama'] ?? '';
        $nim = $_POST['nim'] ?? '';
        $gender = $_POST['jenis_kelamin'] ?? '';
        $errors = validateStudentData($name, $nim, $gender);
        if (empty($errors)) {
            $studentData["nama"] = $name;
            $studentData["nim"] = $nim;
            $studentData["jenis_kelamin"] = $gender;}} 
        else {
        $name = '';
        $nim = '';
        $gender = '';}
    ?>
    <form method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($name); ?>"><span style="color:red;">*</span>
        <?php if (isset($errors['nama'])) {
            echo "<span style='color:red;'>".$errors['nama']."</span>";} ?><br><br>
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?php echo htmlspecialchars($nim); ?>"><span style="color:red;">*</span>
        <?php if (isset($errors['nim'])) {
            echo "<span style='color:red;'>".$errors['nim']."</span>";} ?><br><br>
        <label for="jenis_kelamin">Jenis Kelamin:</label><span style="color:red;">*</span>
        <?php if (isset($errors['jenis_kelamin'])) {
            echo "<span style='color:red;'>".$errors['jenis_kelamin']."</span>";} ?><br>
        <input type="radio" id="laki" name="jenis_kelamin" value="Laki-laki" <?php if ($gender === 'L') echo 'checked'; ?>>
        <label for="laki">Laki-laki</label><br>
        <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" <?php if ($gender === 'P') echo 'checked'; ?>>
        <label for="perempuan">Perempuan</label><br><br>
        <button type="submit">Submit</button>
    </form>
    <?php
    if (!empty($studentData)) {
        echo $studentData["nama"] . "</p>";
        echo $studentData["nim"] . "</p>";
        echo $studentData["jenis_kelamin"] . "</p>";}}
main();
?>