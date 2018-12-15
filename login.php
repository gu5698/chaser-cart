<?php
session_start();
$memId = $_POST["memId"];
$memPsw = $_POST["memPsw"];
$errMsg = "";
try{
    require_once("connectBooks.php");
    $sql = "select * from member where memId=:memId and memPsw=:memPsw"; 
    $member = $pdo->prepare( $sql);
    $member->bindValue(":memId", $memId);
    $member->bindValue(":memPsw", $memPsw);
    $member->execute();
    if( $member->rowCount() == 0){
        $msg = "帳密錯誤, 請<a href='login.html'>重新輸入</a>";
    }else{
        $memRow = $member->fetchObject();
        $msg = $memRow->memName. ". 您好~~ <br>";
        //寫入session暫存區
        $_SESSION["memNo"] = $memRow->no;
        $_SESSION["memId"] = $memRow->memId;
        $_SESSION["memName"] = $memRow->memName;
        $_SESSION["email"] = $memRow->email;

        //是否從別支程式而來
        if( isset($_SESSION["where"]) == true){
            $where = $_SESSION["where"];
            unset($_SESSION["where"]);
            header("location:$where");
        }
    }
}catch(PDOException $ex){
    $errMsg ="錯誤原因 : " . $e->getMesage(). "<br>".   "錯誤行號 : ". $e->getLine(). "<br>";
}
?>  
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>

</head>
<body>
<?php 
if($errMsg !=""){
    echo $errMsg;
}else{
    echo $msg;
}

?>

<a href="prodList.php">前往商品專區</a>  
</body>
</html>