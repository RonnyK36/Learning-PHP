<?php

/** @var $pdo \PDO */
require_once "database.php";




$search = $_GET['search'] ?? null;
if ($search) {
    $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
    $statement->bindValue(':title', "%$search%");
} else {

    $statement = $pdo->prepare('SELECT * FROM  products ORDER BY create_date DESC');
}


$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($products);
// echo '<pre>';


?>


<?php include_once 'partials/header.php'; ?>

<h1>Product CRUD</h1>
<p>
    <a href="create.php" class="btn btn-success">Add Product</a>
</p>
<form>
    <div class="input-group mb-3">
        <input type="text" value="<?php echo $search ?>" class="form-control" id="text" placeholder="Search Product" name="search">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </div>

</form>
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
                    <a class="btn btn-sm btn-outline-primary" href="update.php?id=<?php echo $product['id'] ?>">Edit</a>
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