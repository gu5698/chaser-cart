<?php
$errMsg = "";
try {
	require_once("connectBooks1.php");
	$sql = "SELECT * FROM cu_order NATURAL JOIN cu_order_item NATURAL JOIN cu_order_item_attr";
	$orders = $pdo -> query( $sql );
} catch (PDOException $e) {
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Chaser</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="navbar-brand" href="#" style="border-radius: 50%;overflow: hidden;">
                        <img src="images/head.jpg" alt="">
                    </a>
                    <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">會員資料管理</a>
                    <a class="nav-link" id="v-pills-order-tab" data-toggle="pill" href="#v-pills-order" role="tab" aria-controls="v-pills-order" aria-selected="false">訂單管理</a>
                    <a class="nav-link active" id="v-pills-cu_order-tab" data-toggle="pill" href="#v-pills-cu_order" role="tab" aria-controls="v-pills-cu_order" aria-selected="true">客製化訂單管理</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">購票查詢</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"></div>
                    <div class="tab-pane fade" id="v-pills-order" role="tabpanel" aria-labelledby="v-pills-order-tab"></div>
                    <div class="tab-pane fade show active" id="v-pills-cu_order" role="tabpanel" aria-labelledby="v-pills-cu_order-tab">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">訂單</li>
                            </ol>
                        </nav>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">客製訂單編號</th>
                                <th scope="col">客製商品編號</th>
                                <th scope="col">會員編號</th>
                                <th scope="col">總計</th>
                                <th scope="col">訂單狀態</th>
                                <th scope="col">訂單時間</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    if( $errMsg !=""){
                                    echo "<td colspan='6' align='center'>$errMsg</td>";
                                    }else{
                                        while($prodRow = $orders->fetchObject()){
                                    ?>
                                    <td> <a href="cart_order_item.php?cu_order_id=<?php echo $prodRow->cu_order_id;?>"> <?php echo $prodRow->cu_order_id;?> </a> </td>
                                    <td> <?php echo $prodRow->cu_product_id;?> </td>
                                    <td> <?php echo $prodRow->mem_id;?> </td>
                                    <td> <?php echo $prodRow->total;?> </td>
                                    <td>
                                        <select class="custom-select" id="inputGroupSelect02">
                                            <?php
                                                if( $prodRow->cu_order_stat == 0){
                                                    echo '<option selected value="1">未出貨</option>';
                                                }else echo '<option value="1">未出貨</option>';
                                                if ($prodRow->cu_order_stat == 1) {
                                                    echo '<option selected value="2">已出貨</option>';
                                                }else echo '<option value="2">已出貨</option>';
                                                if ($prodRow->cu_order_stat == 2) {
                                                    echo '<option selected value="3">已結案</option>';
                                                }else echo '<option value="3">已結案</option>';
                                            ?>
                                        </select>
                                    </td>
                                    <td> <?php echo $prodRow->cu_order_time;?> </td>
                                </tr>
                            </tbody>
                                    <?php
                                        }//while
                                    }//if...else
                                    ?>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>