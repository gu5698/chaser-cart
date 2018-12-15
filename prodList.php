<?php 
$errMsg = "";
try {
	require_once("connectBooks.php");
	$sql = "select * from products";
	$products = $pdo -> query( $sql );
} catch (PDOException $e) {
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>董董購物網</title>
<style type="text/css">
  table td {border-bottom:1px dotted deeppink;padding:2px 4px;}
  .price {
    text-align:right;
    padding-right:6px;}
  a {
  	text-decoration:none;
  }
  a:hover {
  	text-decoration:underline;
  }  
  .productsTable img {
  	width:80px;
  }
</style>

</head>
<body>
	<div style="background-color:#bfbfef;text-align:right"><span><a href='cartShow.php'>檢視購物車</a></span></div>
<br>

<table align='center' cellspacing='0' width='600' class='productsTable'>
	<tr bgcolor='#bfbfef'>
			<th> 書號 </th>
			<th> 書名 </th>
			<th> 價格 </th>
			<th> 作者 </th>
			<th> 圖片 </th>
			<th> 購買 </th>
	</tr>
<?php	
if( $errMsg !=""){
  echo "<tr><td colspan='6' align='center'>$errMsg</td></tr>";
}else{
	while($prodRow = $products->fetchObject()){
?>

	

			<tr>
				<td> <?php echo $prodRow->psn;?> </td>
				<td> <a href="prodQuery.php?psn=<?php echo $prodRow->psn;?>"><?php echo $prodRow->pname;?></a> </td>
				<td class="price"> <?php echo $prodRow->price;?> </td>
				<td> <?php echo $prodRow->author;?> </td>
				<td> <img class="prodImage" src="images/<?php echo $prodRow->image;?>"> </td>
				<td>
				<form action="cartAdd.php">
					<input type="hidden" name="psn" value="<?php echo $prodRow->psn;?>">
					<input type="hidden" name="pname" value="<?php echo $prodRow->pname;?>">
					<input type="hidden" name="price" value="<?php echo $prodRow->price;?>">
					<input type="submit" value="放入購物車">
				</form></td>
			</tr>
<?php
	}//while
}//if...else	
?>    
</table>
</body>
</html>