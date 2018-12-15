<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chaser</title>
    <!-- reset -->
    <link rel="stylesheet" href="css/css-reset.min.css">
    <!-- fonts -->
    <!-- font-family: 'Playfair Display', serif; -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700">
    <link rel="stylesheet" href="css/fonts.css">
    <!-- grid -->
    <link rel="stylesheet" href="css/grid.min.css">
    <link rel="stylesheet" href="css/chatbot.css">
    <link rel="stylesheet" href="css/navbar.css">
    <!-- custom -->
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
    <div id="header"></div>

    <div class="background">
        <img src="images/cart/background.png" alt="">
    </div>

    <div class="whitebg"></div>

    <div class="container">
        <div class="row">
            <div class="col-2 offset-1 col-md-1 offset-md-4">
                <div class="step stepon">
                    <img src="images/cart/000.png" alt="">
                    <p>1</p>
                </div>
                <p>購物明細</p>
            </div>
            <div class="col-2 offset-1 col-md-1 offset-md-1">
                <div class="step">
                    <p>2</p>
                    <span class="stepend"></span>
                </div>
                <p>填寫資料</p>
            </div>
            <div class="col-2 offset-1 col-md-1 offset-md-1">
                <div class="step">
                    <p>3</p>
                    <span class="stepend"></span>
                </div>
                <p>確認訂單</p>
            </div>
        </div>
    </div>

    <div class="container title dn">
        <div class="row">
            <div class="col-md-2 offset-md-3">
                <p>商品資料</p>
            </div>
            <div class="col-md-2 offset-md-o125">
                <p>單件價格</p>
            </div>
            <div class="col-md-2 offset-md-o25">
                <p>數量</p>
            </div>
            <div class="col-md-2 offset-md-o375">
                <p>小計</p>
            </div>
        </div>
    </div>

    <?php
        $total = 0;
        if(isset($_SESSION["pname"]) === false){
            $msg = "<center>尚無購物資料</center>";
        }else{
            foreach($_SESSION["pname"] as $psn => $pname) {
                    $subTotal = $_SESSION["price"][$psn] * $_SESSION["qty"][$psn];
                    $total += $subTotal;

	?>
    <form action="cartUpdate.php">
        <input type="hidden" name="psn" value="<?php echo $psn;?>">

    <div class="container products">
        <div class="row">
            <div class="col-5 col-md-3">
                <img class="img" src="images/mall/item4.png" alt="">
            </div>
            <div class="col-6 detail col-md-9">
                <div class="row">
                    <div class="col-md-3">
                        <h3>特製鋼筆</h3>
                        <p>毒針</p>
                        <p>錄音</p>
                    </div>
                    <div class="col-md-2">
                        <p>2000</p>
                    </div>
                    <div class="col-10 col-md-4 quantity">
                        <span class="g-c">
                            <i class="fas fa-minus"></i>
                        </span>
                        <input type="number" value="1">
                        <span class="g-c">
                            <i class="fas fa-plus"></i>
                        </span>
                    </div>
                    <div class="col-md-2 dn">
                        <p>2000</p>
                    </div>
                    <div class="col-1 col-md-1 drop">
                        <span class="g-c">
                            <i class="fas fa-times"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container total">
        <div class="row">
            <div class="col-5 offset-1 col-md-2 offset-md-8">
                <p>總計</p>
            </div>
            <div class="col-6 col-md-2">
                <p>2000元</p>
            </div>
        </div>
    </div>

    <div class="container finbtn">
        <div class="row">
            <div class="col-5 offset-1 col-md-5">
                <a href="cart2.html" class="btn">
                    <i class="fas fa-shopping-basket"></i>繼續購物
                </a>
            </div>
            <div class="col-5 col-md-5 t-r">
                <a href="cart2.html" class="btn">下一步
                    <i class="fas fa-caret-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- start footer -->
    <footer class="footer">
        <div class="fz-small">© 2018 Chaser. All Rights Reserved.</div>
    </footer>
    <!-- end footer -->

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
    <!-- jquery -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="js/common.js"></script>
    <!-- custom -->
    <script src="js/cart.js"></script>
</body>
</html>