<?php
$nimErr = $namaErr = $alamatErr = $emailErr = $noHpErr = $prodiErr = "";
$nim = $nama = $alamat = $email = $noHp = $prodi = "";

function isNotEmpty($value)
{
    return isset($value) && !empty($value);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isNotEmpty($_POST["nim"])) {
        $nim = $_POST["nim"];
    } else {
        $nimErr = "*NIM wajib diisi";
    }

    if (isNotEmpty($_POST["nama"])) {
        $nama = $_POST["nama"];
    } else {
        $namaErr = "*Nama wajib diisi";
    }

    if (isNotEmpty($_POST["alamat"])) {
        $alamat = $_POST["alamat"];
    } else {
        $alamatErr = "*Alamat wajib diisi";
    }

    if (isNotEmpty($_POST["email"])) {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email = $_POST["email"];
        } else {
            $emailErr = "*Format Email tidak valid";
        }
    } else {
        $emailErr = "*Email wajib diisi";
    }

    if (isNotEmpty($_POST["no_hp"])) {
        $noHp = $_POST["no_hp"];
    } else {
        $noHpErr = "*No HP wajib diisi";
    }

    if (isNotEmpty($_POST["prodi"])) {
        $prodi = $_POST["prodi"];
    } else {
        $prodiErr = "*Prodi wajib diisi";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Handling dan Validation</title>
</head>

<body>
    <h2>Form Mahasiswa</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        NIM: <input type="text" name="nim" value="<?php echo htmlspecialchars($nim); ?>">
        <span style="color: red;"><?php echo $nimErr; ?></span>
        <br><br>

        Nama: <input type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>">
        <span style="color: red;"><?php echo $namaErr; ?></span>
        <br><br>

        Alamat: <input type="text" name="alamat" value="<?php echo htmlspecialchars($alamat); ?>">
        <span style="color: red;"><?php echo $alamatErr; ?></span>
        <br><br>

        Email: <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <span style="color: red;"><?php echo $emailErr; ?></span>
        <br><br>

        No HP: <input type="text" name="no_hp" value="<?php echo htmlspecialchars($noHp); ?>">
        <span style="color: red;"><?php echo $noHpErr; ?></span>
        <br><br>

        Prodi: <input type="text" name="prodi" value="<?php echo htmlspecialchars($prodi); ?>">
        <span style="color: red;"><?php echo $prodiErr; ?></span>
        <br><br>

        <button type="submit">Submit</button>
    </form>

    <?php
    if (isNotEmpty($nim) && isNotEmpty($nama) && isNotEmpty($alamat) && isNotEmpty($email) && isNotEmpty($noHp) && isNotEmpty($prodi)) {
        echo '<h3>Data yang diinput:</h3>';
        echo 'NIM ' . $nim . '<br>';
        echo 'Nama ' . $nama . '<br>';
        echo 'Alamat ' . $alamat . '<br>';
        echo 'Email ' . $email . '<br>';
        echo 'No HP ' . $noHp . '<br>';
        echo 'Prodi ' . $prodi . '<br>';
    }
    ?>
</body>

</html>
