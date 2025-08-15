<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Upload Form</title>
</head>
<body>
    <form action="upload_product.php" method="POST" enctype="multipart/form-data">
        <label for="title">Product Title:</label>
        <input type="text" name="title" id="title" required><br><br>

        <label for="mrp">MRP:</label>
        <input type="number" name="mrp" id="mrp" required><br><br>

        <label for="selling_price">Selling Price:</label>
        <input type="number" name="selling_price" id="selling_price" required><br><br>

        <label for="product_details">Product Details:</label>
        <textarea name="product_details" id="product_details" rows="5" required></textarea><br><br>

        <label for="first_image">First Image:</label>
        <input type="file" name="first_image" id="first_image" accept="image/*" required><br><br>

        <label for="slide1">Slider Image 1:</label>
        <input type="file" name="slide1" id="slide1" accept="image/*"><br><br>

        <label for="slide2">Slider Image 2:</label>
        <input type="file" name="slide2" id="slide2" accept="image/*"><br><br>

        <label for="slide3">Slider Image 3:</label>
        <input type="file" name="slide3" id="slide3" accept="image/*"><br><br>

        <label for="slide4">Slider Image 4:</label>
        <input type="file" name="slide4" id="slide4" accept="image/*"><br><br>

        <label for="slide5">Slider Image 5:</label>
        <input type="file" name="slide5" id="slide5" accept="image/*"><br><br>

        <button type="submit" name="submit">Upload Product</button>
    </form>
</body>
</html>
