<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pemerintahan Kota Palangkaraya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            background-color: #0f3057;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }

        main {
            padding: 20px;
            text-align: center; 
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            display: inline-block;
        }

        h1, h2 {
            color: #0f3057;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #0f3057;
            color: #fff;
        }

        button {
            background-color: #0f3057;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0c2346;
        }

        .data-count {
            margin-top: 10px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Dashboard - Pemerintahan Kota Palangkaraya</h1>
    </header>
    <main>
        <div class="container">
            <h2>Data Kategori</h2>
            <form id="categoryForm" action="process_category.php" method="post">
                <input type="hidden" id="categoryId" name="id" value="">
                <input type="text" id="categoryName" name="name" placeholder="Nama Kategori" required>
                <button type="submit" name="action" value="create">Tambah Kategori</button>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="categoryList">
                    <?php
                    include 'db_connect.php';
                    $result = $conn->query("SELECT * FROM categories");
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>";
                        echo "<button onclick=\"editCategory({$row['id']}, '{$row['name']}')\">Edit</button>";
                        echo "<form style='display:inline;' action='process_category.php' method='post'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <button type='submit' name='action' value='delete'>Delete</button>
                              </form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <?php
            // Hitung jumlah data dari tabel categories
            $count_result = $conn->query("SELECT COUNT(*) AS count FROM categories");
            $count_row = $count_result->fetch_assoc();
            $count = $count_row['count'];
            ?>
            <div class="data-count">Jumlah Data: <?php echo $count; ?></div>
            <button onclick="printData()">Cetak</button>
        </div>
    </main>
    <script>
        function editCategory(id, name) {
            document.getElementById('categoryId').value = id;
            document.getElementById('categoryName').value = name;
            document.querySelector("button[type='submit']").innerText = 'Update Kategori';
        }

        function printData() {
            window.print();
        }
    </script>
</body>
</html>
