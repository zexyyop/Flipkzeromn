<?php
include 'config.php';

// Securely fetch the product_id from the GET request
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';

// Prepare and bind parameters to prevent SQL injection
$stmt = $conn->prepare("SELECT product_id, title, mrp, selling_price, product_details, first_image, slide1, slide2, slide3, slide4, slide5 FROM product WHERE product_id = ?");
$stmt->bind_param("s", $product_id);

// Execute the query
$stmt->execute();

// Fetch the result
$result = $stmt->get_result();

// Check if product exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // You can now use $row['column_name'] for further processing
} else {
    echo "No product found.";
}

$discount = round((($row['mrp'] - $row['selling_price']) / $row['mrp']) * 100);

$randomNumber = rand(3, 10);
$randomsale = rand(4563, 9567);

// Close the statement
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en-IN">

<head>
        <title>Online Shopping!</title>
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Description" content="Online Shopping For All!">
    <meta name="theme-color" content="#2874f0" id="themeColor">
    <meta http-equiv="Pragma" content="no-cache">
    <meta name="Keywords" content="Online Shopping in India,online Shopping store,Online Shopping Site,Buy Online,Shop Online">
    <meta property="og:title" content="Online Shopping!">
    <meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=no">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    

    
</head>

<body class="expansion-alids-init" cz-shortcut-listen="true">
    <div id="container" style="overflow:hidden">
        <div style="height:100%" data-reactroot="">
<div class="container-fluid py-2 header-container" style="background-color:#2874f0">
    <div class="row header">
        <div class="col-1">
            <div class="menu-icon" id="back_btn">
                <svg width="19" height="16" viewBox="0 0 19 16" xmlns="http://www.w3.org/2000/svg">
    <path d="M17.556 7.847H1M7.45 1L1 7.877l6.45 6.817" stroke="#FFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
</svg>            </div>
        </div>
        <div class="col-2">
            <div class="menu-logo">
                <a class="Z4_K_h" href="" style="width:85px"><img width="85px" src="assets/images/logo.png"></a>
            </div>
        </div>
        <div class="col-6">
        </div>
        <div class="col-1">
            <div class="menu-icon">
                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><g fill="#FFF" fill-rule="evenodd"><path d="m11.618 9.897l4.225 4.212c.092.092.101.232.02.313l-1.465 1.46c-.081.081-.221.072-.314-.02l-4.216-4.203"/><path d="m6.486 10.901c-2.42 0-4.381-1.956-4.381-4.368 0-2.413 1.961-4.369 4.381-4.369 2.42 0 4.381 1.956 4.381 4.369 0 2.413-1.961 4.368-4.381 4.368m0-10.835c-3.582 0-6.486 2.895-6.486 6.467 0 3.572 2.904 6.467 6.486 6.467 3.582 0 6.486-2.895 6.486-6.467 0-3.572-2.904-6.467-6.486-6.467"/></g></svg>            </div>
        </div>
        <div class="col-1">
            <div class="menu-icon">
                <img alt="menu" src="assets/images/theme/cart.svg" height="20px" width="20px">
            </div>
        </div>
    </div>
</div>

<div class="_1fhgRH">
    <div class="container p-1 card">
        <div class="container-fluid px-0 product-slider">
            <div class="love-icon"></div>
            <div class="share-icon"></div>
            <div id="sliderX" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php
        // Initialize a counter for the slide number
        $slideCounter = 0;

        // Check and generate indicators only for available slides
        if (!empty($row['first_image'])) {
            echo '<li data-target="#sliderX" data-slide-to="' . $slideCounter . '" class="active"></li>';
            $slideCounter++;
        }
        if (!empty($row['slide1'])) {
            echo '<li data-target="#sliderX" data-slide-to="' . $slideCounter . '"></li>';
            $slideCounter++;
        }
        if (!empty($row['slide2'])) {
            echo '<li data-target="#sliderX" data-slide-to="' . $slideCounter . '"></li>';
            $slideCounter++;
        }
        if (!empty($row['slide3'])) {
            echo '<li data-target="#sliderX" data-slide-to="' . $slideCounter . '"></li>';
            $slideCounter++;
        }
        if (!empty($row['slide4'])) {
            echo '<li data-target="#sliderX" data-slide-to="' . $slideCounter . '"></li>';
            $slideCounter++;
        }
        if (!empty($row['slide5'])) {
            echo '<li data-target="#sliderX" data-slide-to="' . $slideCounter . '"></li>';
            $slideCounter++;
        }
        ?>
    </ol>
    <div class="carousel-inner">
        <?php
        // Reset the counter for slides
        $slideCounter = 0;

        // Check and generate carousel items only for available slides
        if (!empty($row['first_image'])) {
            echo '<div class="carousel-item active">
                    <img class="d-block w-100" src="product-details/img/product/' . $row['first_image'] . '" alt="Slide 1">
                  </div>';
            $slideCounter++;
        }
        if (!empty($row['slide1'])) {
            echo '<div class="carousel-item">
                    <img class="d-block w-100" src="product-details/img/product/' . $row['slide1'] . '" alt="Slide 2">
                  </div>';
            $slideCounter++;
        }
        if (!empty($row['slide2'])) {
            echo '<div class="carousel-item">
                    <img class="d-block w-100" src="product-details/img/product/' . $row['slide2'] . '" alt="Slide 3">
                  </div>';
            $slideCounter++;
        }
        if (!empty($row['slide3'])) {
            echo '<div class="carousel-item">
                    <img class="d-block w-100" src="product-details/img/product/' . $row['slide3'] . '" alt="Slide 4">
                  </div>';
            $slideCounter++;
        }
        if (!empty($row['slide4'])) {
            echo '<div class="carousel-item">
                    <img class="d-block w-100" src="product-details/img/product/' . $row['slide4'] . '" alt="Slide 5">
                  </div>';
            $slideCounter++;
        }
        if (!empty($row['slide5'])) {
            echo '<div class="carousel-item">
                    <img class="d-block w-100" src="product-details/img/product/' . $row['slide5'] . '" alt="Slide 6">
                  </div>';
            $slideCounter++;
        }
        ?>
    </div>


</div>

                
                
                
                
                
            </div>
        
         <div style="text-align: center; font-weight: bold;">
            <b>Only <span class="text-danger"><span class="solds" style="font-weight: bold;"><?= $randomNumber; ?></span></span> Left in Stock</b>
         </div>
        </div>
    </div>
    
    
    
    <div class="container-fluid p-3 mt-1 card">
                <style>
                    .sizebox {
                        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
                        margin: 5px;
                        padding: 5px 12px;
                        border-radius: 5px;
                        cursor: pointer;
                        float: left;
                        background-color: white;
                        /* Optional: Add pointer cursor to indicate interactivity */
                    }
                    
                .off {
                    animation: blinker 100.5s linear infinite;
                    color: red;
                    font-family: sans-serif;
                }
                @keyframes blinker {
                    50% {
                        opacity: 0;
                    }
                }
                    .sizebox.selected {
                        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
                        background-color: orange;
                        /* Optional: Change text color for better visibility */
                    }
                </style>
        
        <div class="product-title" style="font-size: 14px; color: #007185; font-weight: 600;">
            <?= $row['title']; ?>
        </div>
        <img style="width: 100px" class="my-2" src="assets/images/plue-fassured.png" alt="plue-fassured">
        <div class="product-price d-flex my-2">
            <span class="discount"><?= $discount; ?>% off</span>
            <span class="mrp">&#8377;<?= $row['mrp']; ?></span>
            <span class="price">&#8377;<?= $row['selling_price']; ?></span>
        </div>
        <!--<button class="button1 button2">Kitchen Appliance Sale</button>-->
    </div>
    <div class="container-fluid p-3 offerend-container card">
        
        <h4 class="m-0"> Offer ends in <span class="offer-timer" id="offerend-time"></span><span class="offer-timer" id="offerend-time"></span>

<script>
  // Set the timer duration (16 minutes and 31 seconds in milliseconds)
  const countdownDuration = 16 * 60 * 1000 + 31 * 1000;

  // Reference the timer element
  const timerElement = document.getElementById("offerend-time");

  // Calculate the end time
  const endTime = Date.now() + countdownDuration;

  // Update the timer every second
  const interval = setInterval(() => {
    const remainingTime = endTime - Date.now();

    if (remainingTime <= 0) {
      clearInterval(interval); // Stop the timer when it reaches 0
      timerElement.textContent = "Offer ended!";
      return;
    }

    // Convert remaining time to minutes and seconds
    const minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

    // Display the timer
    timerElement.textContent = `${minutes}min ${seconds}sec`;
  }, 1000);
</script>

    </div>

    <div class="_24B_AU _1AQnZC">
                                
                                </div>
    
    <div class="container-fluid p-3 mt-1 card">
                    <div class="aMaAEs">
                        <div class="_3Zuayz">
                            <div class="_3_L3jD">
                                
                                
                                
                                <div class="gUuXy- _16VRIQ _1eJXd3">
                                    <span id="productRating_LSTETHFZZUWAC8X2PGQZ7T8VQ_ETHFZZUWAC8X2PGQ_" class="_1lRcqv">
                                    <img src="assets/images/sold-trend.webp" height="35">
                                    </span>
                                    <span style="color:black" class="_2_R_DZ">
                                    <span class="offers" style="font-weight: ;"><b><?= $randomsale; ?>+ Sold In Last 7 Days</b></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
    <div class="container-fluid px-2 py-3 d-flex feature-container product-extra card">
        <div class="col-4 featured-item d-flex align-items-center flex-column bd-highlight px-1">
            <img class="featured-img mb-3" src="assets/images/replacement.png" />
            <span class="feature-title"> 7 days Replacement </span>
        </div>
        <div class="col-4 featured-item d-flex align-items-center flex-column bd-highlight px-1">
            <img class="featured-img mb-3" src="assets/images/non-cod.png" />
            <span class="feature-title"> No Cash On Delivery </span>
        </div>
        <div class="col-4 featured-item d-flex align-items-center flex-column bd-highlight px-1">
            <img class="featured-img mb-3 mt-1" src="assets/images/plue-fassured.png" />
            <span class="feature-title"> Plus (F-Assured) </span>
        </div>
    </div>
    <div class="container-fluid p-3 offerend-container card">
        <div class="aMaAEs">
                        <div class="_3Zuayz">
                            <div class="_3_L3jD">
                                <div class="gUuXy- _16VRIQ _1eJXd3">
                                    <span id="productRating_LSTETHFZZUWAC8X2PGQZ7T8VQ_ETHFZZUWAC8X2PGQ_" class="_1lRcqv">
                                    <img src="assets/images/98798.webp" height="35">
                                    </span>&nbsp;&nbsp;
                                    <span style="color:black" class="_2_R_DZ"><span>1 Year Manufacturer Warranty</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
    <!--<div class="container-fluid product-detail px-0 py-3 mb-4 card">
        <img src="assets/images/Image1.webp" height="auto" width="100%">
        <img src="assets/images/Image6.png" height="auto" width="100%">
    </div>-->
    
    <div class="container-fluid product-detail px-0 py-3 mb-4 card">
        <h3 class="txt-product-detail">Product Detail</h3>
        <div class="product-details"> <?= $row['product_details']; ?>
            
        </div>
        <!-- <img src="assets/images/Image1.webp" height="auto" width="100%">
        <img src="assets/images/Image6.png" height="auto" width="100%">
        <img class="my-2" src="assets/images/review.jpg" height="auto" width="100%">
        <img class="my-2" src="assets/images/11.png" height="auto" width="100%">
        <img class="my-2" src="assets/images/12.png" height="auto" width="100%">
        <img class="my-2" src="assets/images/13.png" height="auto" width="100%">
        <img class="my-2" src="assets/images/14.png" height="auto" width="100%">
        <img class="my-2" src="assets/images/15.png" height="auto" width="100%">
        <img class="my-2" src="assets/images/16.png" height="auto" width="100%">
        <img class="my-2" src="assets/images/17.png" height="auto" width="100%"> -->
    </div>
    
</div>
<div class="button-container flex">
    <button class="buynow-button buynow-button-white product-page-buy" onclick="handleAction('add-to-cart');">
        Add to Cart
    </button>
    <button class="buynow-button product-page-buy" onclick="handleAction('buy-now');">
        Buy Now
    </button>
</div>

<script>
  // JavaScript function to handle button clicks
  function handleAction(action) {
    // Get the product ID dynamically
    const productId = "<?= $product_id; ?>"; // Ensure this variable is correctly populated from PHP

    // Create a form element dynamically
    const form = document.createElement("form");
    form.method = "POST";
    form.action = "address.php"; // Target page

    // Create a hidden input field for product_id
    const productIdInput = document.createElement("input");
    productIdInput.type = "hidden";
    productIdInput.name = "product_id";
    productIdInput.value = productId;

    // Create a hidden input field for the action (optional, in case you want to differentiate between "Add to Cart" and "Buy Now")
    const actionInput = document.createElement("input");
    actionInput.type = "hidden";
    actionInput.name = "action";
    actionInput.value = action;

    // Append inputs to the form
    form.appendChild(productIdInput);
    form.appendChild(actionInput);

    // Append the form to the body (required for submission)
    document.body.appendChild(form);

    // Submit the form
    form.submit();
  }
</script>


</div>
<footer class="seofooter" id="seofooter">
</footer>
<script defer src="assets/js/jquery.min.js"></script>
<script defer src="assets/js/bootstrap.min.js"></script>
<script defer src="assets/js/relativeTime.js"></script>
<script defer src="assets/js/days.min.js"></script>
<script defer src="assets/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script defer src="assets/js/manage_product.js"></script></body>

</html>