<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$pesan = trim($_POST['pesan'] ?? '');

if ($nama === '' || $email === '' || $pesan === '') {
    exit('Semua data wajib diisi.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit('Format email tidak valid.');
}

$stmt = $conn->prepare(
    "INSERT INTO pesan (nama, email, pesan)
     VALUES (?, ?, ?)"
);

$stmt->bind_param('sss', $nama, $email, $pesan);
$stmt->execute();

header('Location: contact.php?success=1');
exit;