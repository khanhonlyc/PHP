<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $file = $_FILES['file'];

    $business_types = $_POST['business_types'] ?? []; 
    $services = json_encode($_POST['services']);

    $business_types_json = json_encode($business_types);
    $region = $_POST['region'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $fileName = uniqid() . '_' . basename($file['name']);
        $filePath = $uploadDir . $fileName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            $stmt = $pdo->prepare("INSERT INTO files (name, email, file_path, business_types, KhuVuc, SanPhamDichVu) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$name, $email, $filePath, $business_types_json, $region, $services]);
            header("Location: index.php");
        } else {
            echo "Lỗi khi upload file.";
        }
    } else {
        echo "Lỗi khi upload file.";
    }
}
?>
