<?php
include 'config.php';

// Fetch data from database with random order
$sql = "SELECT product_id, title, mrp, selling_price, first_image FROM product order by rand()";
$result = $conn->query($sql);
?>

<table class="-LqSIK _3xlpeR">
    <tbody id="home_page_product">
        <?php
        if ($result->num_rows > 0) {
            $count = 0; // Counter to keep track of columns
            while ($row = $result->fetch_assoc()) {
                // Randomize rating between 4.5 to 4.9
                $rating = number_format(rand(45, 49) / 10, 1);

                // Calculate discount percentage
                $discount = round((($row['mrp'] - $row['selling_price']) / $row['mrp']) * 100);

                // Randomize rating count between 5907 to 9999
                $ratingCount = rand(5907, 9999);

                // Start a new row for every 2 products
                if ($count % 2 == 0) {
                    echo "<tr>";
                }
                ?>
                <td class="Cs7ycL TcKeCe">
                    <a href="product-view.php?product_id=<?= $row['product_id']; ?>">
                        <div class="_2enssu">
                            <div style="position:relative;min-height:170px;min-width:150px">
                                <div class="_3LXIRu">
                                    <div class="_2GaeWJ" style="width:170px;height:170px">
                                        <img class="_2puWtW _3a3qyb" src="product-details/img/product/<?= $row['first_image']; ?>" alt="Product Image">
                                    </div>
                                </div>
                            </div>
                            <div class="_24B_AU _3SexMn"><?= $row['title']; ?></div>
                            <div class="_24B_AU _1AQnZC">
                                <?= $discount; ?>% Off
                                <span class="mrp">₹<?= $row['mrp']; ?></span>
                            </div>
                            <div class="_24B_AU _1AQnZC as_gdf">
                                <b class="selling-price">₹<?= $row['selling_price']; ?></b>
                                <img src="img/SwOvZ3r.png" width="77px" alt="Icon">
                            </div>
                            <div class="_24B_AU _1AQnZC">
                                <b class="_3LWZlK"><?= $rating; ?> 
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMiI+PHBhdGggZmlsbD0iI0ZGRiIgZD0iTTYuNSA5LjQzOWwtMy42NzQgMi4yMy45NC00LjI2LTMuMjEtMi44ODMgNC4yNTQtLjQwNEw2LjUuMTEybDEuNjkgNC4wMSA0LjI1NC40MDQtMy4yMSAyLjg4Mi45NCA0LjI2eiIvPjwvc3ZnPg==" alt="Star"></b>
                                <b class="_2_R_DZ"><?= $ratingCount; ?> Ratings</b>
                            </div>
                            <div class="_3Nxu4r delivery-txt">Free Delivery in Two Days</div>
                        </div>
                    </a>
                </td>
                <?php
                $count++;
                // Close the row after 2 products
                if ($count % 2 == 0) {
                    echo "</tr>";
                }
            }
            // If the last row has only 1 product, close the row
            if ($count % 2 != 0) {
                echo "</tr>";
            }
        } else {
            echo "<tr><td>No products found</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
$conn->close();
?>
