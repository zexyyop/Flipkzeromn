<?php
if (isset($_POST['submit'])) {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'fk');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $title = $conn->real_escape_string($_POST['title']);
    $mrp = $conn->real_escape_string($_POST['mrp']);
    $selling_price = $conn->real_escape_string($_POST['selling_price']);
    $product_details = $conn->real_escape_string($_POST['product_details']);

    // Folder to store uploaded files
    $uploadDir = 'product-details/img/product/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Function to handle file upload
    function uploadFile($fileInput, $uploadDir) {
        if (!empty($_FILES[$fileInput]['name'])) {
            $fileName = basename($_FILES[$fileInput]['name']);
            $targetFile = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES[$fileInput]['tmp_name'], $targetFile)) {
                return $fileName;
            } else {
                return null;
            }
        }
        return null;
    }

    // Uploading files
    $first_image = uploadFile('first_image', $uploadDir);
    $slide1 = uploadFile('slide1', $uploadDir);
    $slide2 = uploadFile('slide2', $uploadDir);
    $slide3 = uploadFile('slide3', $uploadDir);
    $slide4 = uploadFile('slide4', $uploadDir);
    $slide5 = uploadFile('slide5', $uploadDir);

    // Insert into database
    $sql = "INSERT INTO product (title, mrp, selling_price, product_details, first_image, slide1, slide2, slide3, slide4, slide5)
            VALUES ('$title', '$mrp', '$selling_price', '$product_details', '$first_image', '$slide1', '$slide2', '$slide3', '$slide4', '$slide5')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Product uploaded successfully!');
                window.location.href = 'form.php';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $conn->error . "');
                window.location.href = 'form.php';
              </script>";
    }

    $conn->close();
}
?>
