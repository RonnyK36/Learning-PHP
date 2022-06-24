<?php

/** @var $pdo \PDO */
require_once "database.php";
require_once 'functions.php';


$errors = [];
$title = "";
$description = "";
$price = '';
$product = [
    'image' => ''
];
// echo "<pre>";
// var_dump($_FILES);
// echo "<pre>";
// exit();

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
        $imagePath = '';
        if ($image && $image["tmp_name"]) {

            $imagePath = "images/" . randomString(8) . "/" . $image['name'];

            mkdir(dirname($imagePath));
            move_uploaded_file($image['tmp_name'], $imagePath);
        }



        $statement = $pdo->prepare(
            "INSERT INTO products (title, image, description, price, create_date)
        VALUES (:title,:image,:description,:price,:date)"
        );

        $statement->bindValue(":title", $title);
        $statement->bindValue(":image", $imagePath);
        $statement->bindValue(":description", $description);
        $statement->bindValue(":price", $price);
        $statement->bindValue(":date", $date);

        $statement->execute();

        header("Location: index.php");
    }
}



?>

<?php include_once "partials/header.php"; ?>

<p><a class="btn btn-secondary" href="index.php">Go back to Products</a></p>

<h1>Create New Product</h1>
<?php include_once 'products/form.php' ?>

</body>

</html>