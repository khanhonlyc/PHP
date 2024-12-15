<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM files ORDER BY created_at DESC");
$files = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Upload</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-4xl mx-auto bg-white shadow rounded p-6">
        <h1 class="text-2xl font-bold mb-4">Đăng ký doanh nghiệp (Miễn phí 100%)</h1>
        <form action="process.php" method="POST" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" name="name" id="name" class="w-full border-gray-300 rounded mt-1" required>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" name="email" id="email" class="w-full border-gray-300 rounded mt-1" required>
            </div>

            <div>
                <label for="file" class="block text-sm font-medium text-gray-700">File:</label>
                <input type="file" name="file" id="file" class="w-full border-gray-300 rounded mt-1">
            </div>

            <fieldset>
                <legend class="text-sm font-medium text-gray-700">Ngành nghề kinh doanh</legend>
                <div class="flex items-center">
                    <input type="checkbox" name="business_types[]" value="Công nghệ thông tin" id="it" class="mr-2">
                    <label for="it">Công nghệ thông tin</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="business_types[]" value="Xây dựng" id="construction" class="mr-2">
                    <label for="construction">Xây dựng</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="business_types[]" value="Giáo dục" id="education" class="mr-2">
                    <label for="education">Giáo dục</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="business_types[]" value="Y tế" id="healthcare" class="mr-2">
                    <label for="healthcare">Y tế</label>
                </div>
            </fieldset>

            <h2>Phần 3: SẢN PHẨM DỊCH VỤ</h2>
            <fieldset>
                <legend>Sản phẩm dịch vụ chính</legend>
                <input type="text" name="services[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><br>
                <input type="text" name="services[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><br>
                <input type="text" name="services[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><br>
                <input type="text" name="services[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><br>
                <input type="text" name="services[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><br>
            </fieldset>

            <div class="mb-4">
                <label for="region" class="block text-sm font-medium text-gray-700">Khu vực</label>
                <select name="region" id="region" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value=""> --- Số lượng nhân viên ---</option>
                    <option value="Ít hơn 5 người">Ít hơn 5 người</option>
                    <option value="Từ 5 đến 10 người">Từ 5 đến 10 người</option>
                    <option value="Từ 11 đến 50 người">Từ 11 đến 50 người</option>
                    <option value="Từ 51 đến 100 người">Từ 51 đến 100 người</option>
                    <option value="Từ 101 đến 200 người">Từ 101 đến 200 người</option>
                    <option value="Từ 201 đến 300 người">Từ 201 đến 300 người</option>
                    <option value="Từ 301 đến 500 người">Từ 301 đến 500 người</option>
                    <option value="Từ 501 đến 1000 người">Từ 501 đến 1000 người</option>
                    <option value="Nhiều hơn 1000">Nhiều hơn 1000</option>
                </select>
            </div>

            <button type="submit" name="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Đăng ký doanh nghiệp</button>
        </form>
    </div>

    <div class="max-w-4xl mx-auto mt-6 bg-white shadow rounded p-6">
        <h2 class="text-xl font-bold mb-4">Danh sách doanh nghiệp đã đăng ký</h2>
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($files as $file): ?>
                <tr>
                    <td class="border border-gray-300 px-4 py-2"><?= $file['id'] ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($file['name']) ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($file['email']) ?></td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="update.php?id=<?= $file['id'] ?>" class="text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
