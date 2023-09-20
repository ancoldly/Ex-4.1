<?php
require('/CNWEB/ex-4.1/connectDB/connect.php');

if (isset($_POST['deleteProduct'])) {
    $productId = $_POST['idProduct'];
    $deleteProduct = "DELETE FROM product WHERE id = $productId";
    $conn->query($deleteProduct);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>

        <h1>Manager Product</h1>
        <h2>List Product</h2>
        <table>
            <tr>
                <td>Category</td>
                <td>Code</td>
                <td>Name</td>
                <td>Price</td>
                <td>Action</td>
            </tr>

            <?php 
                $selectProduct = "SELECT * FROM product ORDER BY `id` DESC";
                $data = $conn->query($selectProduct);
                while ($rows = mysqli_fetch_assoc($data)) {
                    $name_show = $rows["name"];
                    $id_show = $rows["id"];
                    $code_show = $rows["code"];
                    $price_show = $rows["price"];
                    $category_show = $rows["category"];
                    ?>
                    <tr>
                        <td><?php echo isset($category_show) ? $category_show : ''; ?></td>
                        <td><?php echo isset($code_show) ? $code_show : ''; ?></td>
                        <td><?php echo isset($name_show) ? $name_show : ''; ?></td>
                        <td><?php echo isset($price_show) ? $price_show : ''; ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="idProduct" value="<?php echo isset($id_show) ? $id_show : ''; ?>">
                                <button type="submit" name="deleteProduct">Delete Product</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </table>

        
        <div class="grid">
            <a href="/product_add.php">Add Product</a>
            <a href="/category_list.php">Add Category</a>
        </div>
    </main>

    <style>
        table {
            border-collapse: collapse;
        }
        table, tr, td {
            border: 2px solid black;
        }

        main {
            border: 2px solid black;
            padding: 20px;
            width: max-content;
        }
        h2 {
            color: orange;
        }
        td {
            padding: 10px;
        }
        .grid {
            display: grid;
        }
    </style>
</body>
</html>