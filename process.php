<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = htmlspecialchars($_POST['nama']);
    $ucapan = htmlspecialchars($_POST['ucapan']);
    $konfirmasi = htmlspecialchars($_POST['konfirmasi']);

    // Email tujuan
    $to = "kamalfauza@gmail.com"; // Ganti dengan email tujuan
    $subject = "Ucapan dan Konfirmasi Kehadiran";
    
    // Isi email
    $message = "
    <html>
    <head>
        <title>Ucapan dan Konfirmasi Kehadiran</title>
    </head>
    <body>
        <h2>Data dari Formulir</h2>
        <p><strong>Nama:</strong> $nama</p>
        <p><strong>Ucapan:</strong> $ucapan</p>
        <p><strong>Konfirmasi Kehadiran:</strong> $konfirmasi</p>
    </body>
    </html>
    ";

    // Header email (agar bisa mengirim HTML)
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@yourdomain.com" . "\r\n"; // Ganti dengan domain Anda

    // Kirim email
    if (mail($to, $subject, $message, $headers)) {
        echo "Ucapan dan konfirmasi berhasil dikirim. Terima kasih!";
    } else {
        echo "Maaf, terjadi kesalahan. Ucapan tidak terkirim.";
    }
} else {
    echo "Akses tidak diizinkan.";
}
?>