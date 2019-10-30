<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$xgid=$_GET['id'];

$sqlb="select name,author,publish,ISBN,introduction,language,price,pubdate,class_id,pressmark,
state from book_info where book_id={$xgid}";
$resb=mysqli_query($dbc,$sqlb);
$resultb=mysqli_fetch_array($resb);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>도서관 | | 서적정보 수정</title>
</head>
<body>
<h1 style="text-align: center"><strong>서적정보 수정</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_book_edit.php?id=<?php echo $xgid; ?>"" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
    <div id="login">
        <div class="input-group"><span  class="input-group-addon">제목</span><input value="<?php echo $resultb['name']; ?>" name="nname" type="text" placeholder="수정한 제목 입력하시오" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">저자</span><input value="<?php echo $resultb['author']; ?>" name="nauthor" type="text" placeholder="수정한 저자 입력하시오" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">출판사</span><input value="<?php echo $resultb['publish']; ?>"  name="npublish" type="text" placeholder="수정한 출판사 입력하시오" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">ISBN</span><input value="<?php echo $resultb['ISBN']; ?>" name="nISBN" type="text" placeholder="새러운 ISBN 입력하시오" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">소개</span><input  value="<?php echo $resultb['introduction']; ?>" name="nintroduction" type="text" placeholder="새러운 소개 입력하시오" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">언어</span><input value="<?php echo $resultb['language']; ?>" name="nlanguage" type="text" placeholder="수정한 언어 입력하시오" class="form-control"></div><br/>
        <div class="input-group"><span class="input-group-addon">가격</span><input value="<?php echo $resultb['price']; ?>" name="nprice" type="text" placeholder="수정한 가격 입력하시오" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">출반 일기</span><input value="<?php echo $resultb['pubdate']; ?>" name="npubdate" type="text" placeholder="수정한 출반 일기 입력하시오" class="form-control"></div><br/>
        <div class="input-group"><span class="input-group-addon">구분호</span><input  value="<?php echo $resultb['class_id']; ?>" name="nclass_id" type="text" placeholder="수정한 구분호 입력하시오" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">책장호</span><input value="<?php echo $resultb['pressmark']; ?>" name="npressmark" type="text" placeholder="수정한 책장호 입력하시오" class="form-control"></div><br/>
        <div class="input-group"><span class="input-group-addon">상태</span><input value="<?php echo $resultb['state']; ?>" name="nstate" type="text" placeholder="수정한 상태 입력하시오" class="form-control"></div><br/>
        <label><input type="submit" value="확인" class="btn btn-default"></label>
        <label><input type="reset" value="리셋" class="btn btn-default"></label>
    </div>
    </form>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $boid=$_GET['id'];
    $nnam = $_POST["nname"];
    $naut = $_POST["nauthor"];
    $npubl = $_POST["npublish"];
    $nisb = $_POST["nISBN"];
    $nint = $_POST["nintroduction"];
    $nlan = $_POST["nlanguage"];
    $npri = $_POST["nprice"];
    $npubd = $_POST["npubdate"];
    $ncla = $_POST["nclass_id"];
    $npre = $_POST["npressmark"];
    $nsta= $_POST["nstate"];



    $sqla="update book_info set name='{$nnam}',author='{$naut}',publish='{$npubl}',
ISBN='{$nisb}',introduction='{$nint}',language='{$nlan}',price='{$npri}',pubdate='{$npubd}',
class_id={$ncla},pressmark={$npre},state={$nsta} where book_id=$boid;";
    $resa=mysqli_query($dbc,$sqla);


    if($resa==1)
    {

        echo "<script>alert('수정 성공！')</script>";
        echo "<script>window.location.href='admin_book.php'</script>";

    }
    else
    {
        echo "<script>alert('수정 실패! 다시 입력해주세요!');</script>";

    }

}


?>
</body>
</html>
