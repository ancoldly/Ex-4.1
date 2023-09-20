<?php 
    require('/CNWEB/ex-4.1/connectDB/connect.php');

    if (isset($_POST['submit_addProduct'])) {

        $category = $_POST['category'];
        $codeProduct = $_POST['codeProduct'];
        $nameProduct = $_POST['nameProduct'];
        $priceProduct = $_POST['priceProduct'];

        $insertProduct = "INSERT INTO product (category, code, name, price) VALUES ('$category', '$codeProduct', '$nameProduct', '$priceProduct')";
        $conn->query($insertProduct);
        header("Location: product_add.php");
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

        <h2>Add Product</h2>

        <form action="" method="post" class="form">
            <div>
                <span>Category:</span>
                <select name="category" id="category">
                    <?php 
                        $selectCategory = "SELECT * FROM category ORDER BY `id` DESC";
                        $data = $conn->query($selectCategory);
                        while ($rows = mysqli_fetch_assoc($data)) 
                        {
                            $name_show = $rows["name"];
                            $id_show = $rows["id"];
                            ?>
                                <option value="<?php echo isset($name_show) ? $name_show : ''; ?>"><?php echo isset($name_show) ? $name_show : ''; ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>

            <div>
                <span>Code:</span>
                <input type="text" placeholder="Code..." name="codeProduct">
            </div>

            <div>
                <span>Name:</span>
                <input type="text" placeholder="Name..." name="nameProduct">
            </div>

            <div>
                <span>List Price:</span>
                <input type="text" placeholder="List Price..." name="priceProduct">
            </div>

            <div>
                <button type="submit" name="submit_addProduct">Add Product</button>
            </div>

            <a href="/product_view.php">View Product List</a>
        </form>
    </main>

    <style>
        .form {
            display: grid;
            gap: 20px;
        }

        .form>div {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        main {
            width: max-content;
            border: 2px solid black;
            padding: 20px;
        }

        h2 {
            color: orange;
        }

        select {
            width: 100px;
            font-size: 20px;
        }
    </style>
</body>
</html>