<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MemberEdit</title>
    <?php require("link.php"); ?>

    <style>
        /* body {
            background-color: #efecea;
        } */
    </style>
</head>

<body>
    <?php

    require("dbConnect.php");

    require("select.php");


    if (isset($_COOKIE["userName"])) {
        $sUserName = $_COOKIE["userName"];
        // echo $sUserName;
    } else {
    }

    // 取消修改
    if (isset($_POST["cancel"])) {
        echo "<script>swal('取消修改', 'warning!', 'warning');</script>";
        // header("Location: memberEdit.php");
        // exit();
    }

    // 修改
    if (isset($_POST["edit"])) {
        $sql = <<<sqlCommand
     UPDATE `member` SET `name` = '{$_POST["memberName"]}',
      `phone` = '{$_POST["memberPhone"]}',
      `email` = '{$_POST["memberEmail"]}' 
     WHERE `member`.`userEmail` = '$sUserName'
    sqlCommand;
        // echo $sql;
        mysqli_query($link, $sql);
        echo "<script>swal('修改成功', 'Good job!', 'success');</script>";
        // header("Location: index.php");
        // exit();
    }

    $sql = "select * from `member` where `userEmail` = '$sUserName' ";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);

    ?>
    <?php include("../include/header.php") ?>
    <div id='stars'></div>
    <div id='stars2'></div>
    <div id='stars3'></div>
    <div class="H"></div>
    <memberLogin>
        <div id="memberLogin" class="container jumbotron">
            <form method="post" class="form-horizontal">
                <fieldset>
                    <legend>會員基本資料</legend>
                    <div class="form-group">
                        <label class="control-label" for="memberName">會員姓名 :</label>
                        <div>
                            <input id="memberName" name="memberName" type="text" value="<?= $row["name"] ?>" placeholder="" class="form-control input-md">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="memberPhone">電話 :</label>
                        <div>
                            <input id="memberPhone" name="memberPhone" type="text" value="<?= $row["phone"] ?>" placeholder="" class="form-control input-md">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="memberEmail">Email :</label>
                        <div>
                            <input id="memberEmail" name="memberEmail" type="text" value="<?= $row["email"] ?>" placeholder="" class="form-control input-md">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="edit"></label>
                        <div>
                            <button id="edit" name="edit" class="btn btn-success">送出修改</button>
                            <button id="cancel" name="cancel" class="btn btn-danger">取消</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </memberLogin>
    <div class="H"></div>
    <?php include("../include/floor.php") ?>
</body>

</html>