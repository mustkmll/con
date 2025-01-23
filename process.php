<?php
// Cek apakah data dikirim menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = htmlspecialchars($_POST['nama']); // Mencegah XSS
    $ucapan = htmlspecialchars($_POST['ucapan']); // Mencegah XSS
    $konfirmasi = htmlspecialchars($_POST['konfirmasi']); // Mencegah XSS

    // Format pesan untuk dikirim
    $pesan = "Halo, saya ingin memberikan ucapan berikut:\n\n" .
             "Nama: $nama\n" .
             "Ucapan: $ucapan\n" .
             "Konfirmasi Kehadiran: $konfirmasi";

    // Kirimkan pesan ke nomor WhatsApp (ganti dengan nomor Anda)
    $nomor_wa = '6285803246962'; // Format internasional tanpa + atau 0
    $url = "https://wa.me/$nomor_wa?text=" . urlencode($pesan);

    // Redirect pengguna ke WhatsApp
    header("Location: $url");
    exit();
} else {
    // Jika file diakses langsung tanpa mengirim form
    echo "Akses tidak diizinkan!";
}
?>