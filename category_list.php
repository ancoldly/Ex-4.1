<?php 
    require('/CNWEB/ex-4.1/connectDB/connect.php');

    if (isset($_POST['submit-addCategory'])) {
        $nameCategory = $_POST['nameCategory'];

        $insertCategory = "INSERT INTO category (name) VALUES ('$nameCategory')";
        $conn->query($insertCategory);
        header("Location: category_list.php");
    }

    if (isset($_POST['deleteCategory'])) {
        $categoryId = $_POST['idCategory'];
        $deleteCategory = "DELETE FROM category WHERE id = $categoryId";
        $conn->query($deleteCategory);
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
        <h1>Product Manager</h1>

        <h2>Category List</h1>

        <table>
            <tr>
                <td>Name</td>
                <td>Action</td>
            </tr>

            <?php 
            $selectCategory = "SELECT * FROM category ORDER BY `id` DESC";
            $data = $conn->query($selectCategory);
            while ($rows = mysqli_fetch_assoc($data)) 
            {
                $name_show = $rows["name"];
                $id_show = $rows["id"];
                ?>
                <tr>
                    <td>
                        <?php echo isset($name_show) ? $name_show : ''; ?>
                    </td>

                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="idCategory" value="<?php echo isset($id_show) ? $id_show : ''; ?>">
                            <button name="deleteCategory" type="submit">Delete Category</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>

        <h2>Add Category</h2>

        <form action="" method="post">
            <div>
                <span>Category Name: </span>
                <input type="text" name="nameCategory" placeholder="Enter Category Name...">
                <button type="submit" name="submit-addCategory">Add Category</button>
            </div>
        </form>

        <a href="/product_view.php">List Products</a>
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
    </style>
</body>
</html>