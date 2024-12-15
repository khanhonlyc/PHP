<?php
include 'db.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $file = $_FILES['file'];
    $services = json_encode($_POST['services']);
    $businessTypes = isset($_POST['business_types']) ? json_encode($_POST['business_types']) : json_encode([]);

    $stmt = $pdo->prepare("SELECT file_path FROM files WHERE id = ?");
    $stmt->execute([$id]);
    $oldFile = $stmt->fetchColumn();

    if ($file['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $fileName = uniqid() . '_' . basename($file['name']);
        $filePath = $uploadDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            if ($oldFile && file_exists($oldFile)) unlink($oldFile);
        }
    } else {
        $filePath = $oldFile;
    }

    $stmt = $pdo->prepare("UPDATE files SET name = ?, email = ?, file_path = ?, business_types = ?, SanPhamDichVu = ? WHERE id = ?");
    $stmt->execute([$name, $email, $filePath, $businessTypes, $services, $id]);

    header("Location: index.php");
}
?>
