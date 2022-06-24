<?php

$pdo = new PDO("mysql:host=localhost;port=3306;dbname=products_crud", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM  products ORDER BY create_date DESC');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($products);
// echo '<pre>';


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Product CRUD</title>
</head>

<body>
    <h1>Product CRUD</h1>
    <p>
        <a href="create.php" class="btn btn-success">Add Product</a>
    </p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Create Date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $i => $product) :
            ?>
                <tr>
                    <th scope="row"><?php echo $i + 1 ?></th>
                    <td>
                        <img src="<?php echo $product["image"] ?>" alt="" class="thumb-image">
                    </td>
                    <td><?php echo $product["title"] ?></td>
                    <td><?php echo $product["price"] ?></td>
                    <td><?php echo $product["create_date"] ?></td>
                    <td>
                        <button type="button" , class="btn btn-sm btn-outline-primary">Edit</button>
                        <form action="delete.php" method="post" style="display: inline-block;">
                            <input name="id" type="hidden" value="<?php echo $product['id'] ?>">
                            <button type="submit" class="btn btn-sm  btn-outline-danger">Delete</button>
                        </form>

                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>