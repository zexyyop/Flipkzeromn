<?php
// Include the database connection
include 'config.php';

// Fetch the banner records from the database
$sql = "SELECT `banner_img` FROM `banner`";
$result = $conn->query($sql);

// Prepare the carousel items dynamically
$carousel_items = '';
$active_class = 'active'; // First item should be active

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $carousel_items .= '<div class="carousel-item ' . $active_class . '">';
        $carousel_items .= '<img class="d-block w-100" src="bannerimg/' . $row['banner_img'] . '" alt="Banner image">';
        $carousel_items .= '</div>';

        // For subsequent items, remove the "active" class
        $active_class = '';
    }
} else {
    $carousel_items = '<div class="carousel-item active"><img class="d-block w-100" src="default-image.jpg" alt="No banners available"></div>';
}
?>
<!DOCTYPE html>
<html lang="en-IN">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
   <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1DPD5E3XHE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1DPD5E3XHE');
</script>
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
<style>
    div {
        font-size: 20px;
        text-align: center;
    }
        a.Z4_K_h > h2 {
    font-size: 22px;
    font-weight: 600;
    color: #fff;
    margin: 0px 0px 4px -8px;
    font-family: cursive;
}

.ofr_text.code {
    ont-size: 14px;
    color: #0F1111;
    font-size: 14px!important;
    line-height: 16px!important;
    text-align: center;
    font-weight: 600;
    /* text-overflow: ellipsis; */
    /* white-space: nowrap; */
    padding-top: 5px;
}
</style>
<div>
    <div class="_2dxSCm">
        <div class="_3CzzrP" style="background:#2874f0">
            <div class="_38U37R">
                <div>
                    <div class="_1FWdmb" style="background-color:#2874f0">
                        <a class="_3NH1qf"><img alt="menu" src="assets/images/theme/bars.svg" height="20px" width="20px"></a>
                        <a class="Z4_K_h" href="index.php" style="width:85px"><img width="85px" src="assets/images/logo.png"></a>


                        <div class="_2WBW6z"></div>
                        <a class="_3NH1qf"><img alt="menu" src="assets/images/theme/cart.svg" height="20px" width="20px">
                        <span class="_2tVMo0">1</span>
                        </a>
                        

                        
                    </div>
                    <div>
                        <div class="_3QNhdh" id="guidSearch">
                            <div class="ORogdv">
                                <div class="_1k9EoO">
                                    <div class="_2d36Hu">
                                        <a href="#/mobile.html#search" class="search-div">
                                            <input type="" class="_1eMB9R" placeholder="Search for Products, Brands and More" value="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="_3sdu8W emupdz"><a href="index.php" class="_1ch8e_" aria-label="Top Offers">
            <img src="img/menubar.jpg" height="auto" width="100%">
            
            </div>


            <div class="_3lqN6b">
                <div class="WhKF32">
                    <div class="IF3BzC">
                        <div class="_1fhgRH">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-12 p-0">
                                <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php
                                        // Create indicators dynamically
                                        $result = $conn->query($sql); // Re-run query to get the number of banners
                                        $indicator_index = 0;
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $indicator_index . '" class="' . ($indicator_index == 0 ? 'active' : '') . '"></li>';
                                            $indicator_index++;
                                        }
                                        ?>
                                    </ol>
                                    <div class="carousel-inner">
                                        <?php echo $carousel_items; ?>
                                    </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="_1QM2o6 _1isCBQ" style="margin:0 0 16px">
                                <div class="_2rW-uM _3sgvr0 _1cVt6K _1CXxjX">
                                    <div class="_3LrtWH">
                                        <div class="_3QuZpZ dod-div">
                                            <div class="dod-label"> Deals of the Day </div>
                                            <div class="_1oETR8">
                                                <div class="_1dZamR _2mmD4F">
                                                    <img class="_29lYyb" src="assets/images/theme/clock.svg">
                                                    <div id="test"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="_3Nxu4r">
                                            <button class="_1s54Jm btn-sale-is-live">SALE IS LIVE</button>
                                        </div>
                                    </div>
                                </div>
                               <?php include"product2.php" ?> 
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    setInterval(function() {
        var d = new Date();
        var seconds = d.getMinutes() * 60 + d.getSeconds(); //convet 00:00 to seconds for easier caculation
        var fiveMin = 60 * 20; //five minutes is 300 seconds!
        var timeleft = fiveMin - seconds % fiveMin; // let's say 01:30, then current seconds is 90, 90%300 = 90, then 300-90 = 210. That's the time left!
        var result = parseInt(timeleft / 60) + ':' + timeleft % 60; //formart seconds into 00:00 
        document.getElementById('test').innerHTML = result;

    }, 500) //calling it every 0.5 second to do a count down
</script>

<footer class="seofooter" id="seofooter">
</footer>
<script defer src="assets/js/jquery.min.js"></script>
<script defer src="assets/js/bootstrap.min.js"></script>
<script defer src="assets/js/relativeTime.js"></script>
<script defer src="assets/js/days.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>