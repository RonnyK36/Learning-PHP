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
        <textarea name="description" id="" cols="10" rows="5 " type="text" class="form-control"><?php echo $description ?></textarea>
    </div>
    <div class="mb-3">
        <label>Product Price</label>
        <input value="<?php echo $price ?>" name="price" type="number" step="0.01" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>