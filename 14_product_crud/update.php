<?php

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$pdo = new PDO("mysql:host=localhost;port=3306;dbname=products_crud", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



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


function randomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }
    return $str;
}
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

    <a class="btn btn-secondary" href="index.php">Go back to Products</a>
    <h1>Update Product
        <b><?php echo $product['title'] ?></b>
    </h1>
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error) : ?>
                <div><?php echo $error ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="" method="post" enctype="multipart/form-data">
        <?php if ($product['image']) : ?>
            <img src="<?php echo $product['image'] ?>" class="update-image">
        <?php endif; ?>
        <div class="mb-3">
            <label>Product Image</label>
            <br>
            <input name="image" type="file">
        </div>
        <div class="mb-3">
            <label>Product Title</label>
            <input value="<?php echo $title ?>" name="title" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label>Product Description</label>
            <textarea name="description" id="" cols="30" rows="10" type="text" class="form-control"><?php echo $description ?></textarea>
        </div>
        <div class="mb-3">
            <label>Product Price</label>
            <input value="<?php echo $price ?>" name="price" type="number" step="0.01" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>