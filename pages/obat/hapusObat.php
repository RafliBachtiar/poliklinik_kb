<?php
include("../../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id = $_POST["id"];

    // Hapus data terkait di detail_periksa
    $delete_related_query = "DELETE FROM detail_periksa WHERE id_obat = $id";
    mysqli_query($mysqli, $delete_related_query);

    // Hapus data di tabel obat
    $query = "DELETE FROM obat WHERE id = $id";

    if (mysqli_query($mysqli, $query)) {
        echo '<script>';
        echo 'alert("Data obat berhasil dihapus!");';
        echo 'window.location.href = "../../obat.php";';
        echo '</script>';
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}

mysqli_close($mysqli);
?>
