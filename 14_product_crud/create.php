<?php

$pdo = new PDO("mysql:host=localhost;port=3306;dbname=products_crud", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



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
    <h1>Create New Product</h1>
    <form action="create.php" method="get">

        <div class="mb-3">
            <label>Product Image</label>
            <br>
            <input name="image" type="file">
        </div>
        <div class="mb-3">
            <label>Product Title</label>
            <input name="title" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label>Product Description</label>
            <textarea name="description" id="" cols="30" rows="10" type="text" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Product Price</label>
            <input name="price" type="number" step="0.01" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>