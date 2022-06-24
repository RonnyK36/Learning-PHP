<?php

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

/** @var $pdo \PDO */
require_once "database.php";
require_once 'functions.php';



$statement = $pdo->prepare('SELECT * FROM products WHERE id= :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);


$errors = [];
$title = $product['title'];
$description = $product['description'];
$price = $product['price'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title  = $_POST["title"];
    $description  = $_POST["description"];
    $price  = $_POST["price"];
    $date = date("Y-m-d H:i:s");


    if (!$title) {
        $errors[] = 'Please provide a title';
    }

    if (!$price) {
        $errors[] =
            'Please provide a price';
    }

    // Create image folder
    if (!is_dir('images')) {
        mkdir('images');
    }


    if (empty($errors)) {

        $image = $_FILES['image'] ?? null;
        $imagePath = $product['image'];



        if ($image && $image["tmp_name"]) {
            if ($product['image']) {
                unlink($product['image']);
            }
            $imagePath = "images/" . randomString(8) . "/" . $image['name'];

            mkdir(dirname($imagePath));
            move_uploaded_file($image['tmp_name'], $imagePath);
        }



        $statement = $pdo->prepare(
            "UPDATE  products  SET title=:title, image=:image, description=:description, price=:price    WHERE id =:id"
        );

        $statement->bindValue(":title", $title);
        $statement->bindValue(":image", $imagePath);
        $statement->bindValue(":description", $description);
        $statement->bindValue(":price", $price);
        $statement->bindValue(":id", $id);

        $statement->execute();

        header("Location: index.php");
    }
}


?>



<?php include_once "partials/header.php"; ?>

<p><a class="btn btn-secondary" href="index.php">Go back to Products</a></p>
<h1>Update Product
    <b><?php echo $product['title'] ?></b>
</h1>
<?php include_once 'products/form.php' ?>
</body>

</html>