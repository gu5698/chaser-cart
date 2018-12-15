<?php
session_start();
$msg = $errMsg = "";
// $orderMemNo = 1;
// $email = "Sara168@gmail.com";  //如果有$_SESSION["pname"]
if( isset($_SESSION["memName"]) === false){  //尚未登入
	$_SESSION["where"] = $_SERVER["PHP_SELF"];
	//$msg = "尚未登入, 請<a href='login.html'>登入</a>";
	$msg = "<script>window.alert('尚未登入,請登入');location.href='login.html';</script>";
}else{ //己登入
	if( isset($_SESSION["pname"]) === false || count($_SESSION["pname"]) === 0){ //無購物資料
		$msg = "無購物資料";
	}else{ //寫入購物資料
		try {
			require_once("connectBooks.php");
			//啟動交易管理
			$pdo->beginTransaction();
			//寫入訂單主檔
			$sql = "insert into bookorder values( null, :orderMemNo, now(), :email, '0')";
			$bookorder = $pdo->prepare($sql);
		    $bookorder->bindValue(":orderMemNo", $_SESSION["memNo"]);
		    $bookorder->bindValue(":email", $_SESSION["email"]);
		    $bookorder->execute();
		    //取得訂單編號
			$orderNo = $pdo->lastInsertId();

			//寫入訂單明細
			//INSERT INTO `orderitems` (`orderNo`, `productNo`, `quantity`) 
			$sql = "insert into orderitems values( $orderNo, :productNo, :quantity)";
			$orderitems = $pdo->prepare( $sql );
			foreach( $_SESSION["qty"] as $psn => $qty){
				$orderitems->bindValue(":productNo", $psn);
				$orderitems->bindValue(":quantity", $qty);
				$orderitems->execute();
			}
			$pdo->commit();
			unset($_SESSION["pname"]);
			unset($_SESSION["price"]);
			unset($_SESSION["qty"]);;
			$msg = "下訂成功, 您的訂單編號為 {$orderNo} ";	
		} catch (PDOException $e) {
			$pdo->rollBack();
			$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
			$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
		} //try...catch
	  }//有購物資料嗎
}//有登入
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Examples</title>
<style type="text/css">

</style>
</head>
<body>
<center><?php echo $msg; ?></center>
<center><?php echo $errMsg; ?></center> 


<br><br>
<a href="prodList.php">前往商品專區</a>   
</body>
</html>