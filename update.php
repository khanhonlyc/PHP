<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM files WHERE id = ?");
    $stmt->execute([$id]);
    $file = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$file) {
        echo "Record not found!";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-4xl mx-auto bg-white shadow rounded p-6">
        <h1 class="text-2xl font-bold mb-4">Update Record</h1>

        <form action="update_process.php" method="POST" enctype="multipart/form-data" class="space-y-4">
            <!-- Hidden ID Field -->
            <input type="hidden" name="id" value="<?= htmlspecialchars($file['id']) ?>">

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" name="name" id="name" value="<?= htmlspecialchars($file['name']) ?>" class="w-full border-gray-300 rounded mt-1" required>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($file['email']) ?>" class="w-full border-gray-300 rounded mt-1" required>
            </div>

            <div>
                <label for="file" class="block text-sm font-medium text-gray-700">File:</label>
                <input type="file" name="file" id="file" class="w-full border-gray-300 rounded mt-1">
                <?php if (!empty($file['file_path'])): ?>
                    <p class="text-sm text-gray-500 mt-1">Current File: <a href="<?= htmlspecialchars($file['file_path']) ?>" target="_blank" class="text-blue-500 hover:underline">View File</a></p>
                <?php endif; ?>
            </div>

            <!-- Checkbox for Business Types -->
            <fieldset>
                <legend class="text-sm font-medium text-gray-700">Ngành nghề kinh doanh</legend>
                <?php
                $selected_types = json_decode($file['business_types'], true) ?? [];
                $business_types = ["Công nghệ thông tin", "Xây dựng", "Giáo dục", "Y tế"];

                foreach ($business_types as $type):
                ?>
                <div class="flex items-center">
                    <input type="checkbox" name="business_types[]" value="<?= htmlspecialchars($type) ?>" id="<?= htmlspecialchars($type) ?>" class="mr-2"
                        <?= in_array($type, $selected_types) ? 'checked' : '' ?>>
                    <label for="<?= htmlspecialchars($type) ?>"><?= htmlspecialchars($type) ?></label>
                </div>
                <?php endforeach; ?>
            </fieldset>

            <h2>Phần 3: SẢN PHẨM DỊCH VỤ</h2>
    <fieldset>
        <?php 
        $services = json_decode($file['SanPhamDichVu'], true);
        for ($i = 0; $i < 5; $i++) {
            $value = isset($services[$i]) ? $services[$i] : '';
            echo "<input type='text' name='services[]' value='$value' class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'><br>";
        }
        ?>
    </fieldset>

            <button type="submit" name="update" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Update</button>
        </form>
    </div>
</body>
</html>
