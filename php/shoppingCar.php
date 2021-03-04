<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Car</title>
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
        $sUserName = "Guest";
    }

    $selectID = substr(strrchr($_SERVER['QUERY_STRING'], '='), 1, 10);
    $selectID2 = strrchr($_SERVER['QUERY_STRING'], "=");
    $selectType = "";
    $selectType2 = "";


    // 判斷PS4 SWITCH
    if (strpos($_SERVER['QUERY_STRING'], 'ps4') !== false) {
        $selectType = "ps4ID";
        $selectType2 = "ps4all";
    } else {
        $selectType = "switchID";
        $selectType2 = "switchall";
    }

    // 加入購物車
    if (isset($_POST["joinCar"])) {

        if ($sUserName == "Guest") {
            header("Location: member.php");
            exit();
        } else {

            $resultRe = mysqli_query($link, <<<sqlCommand
        SELECT * FROM `membershoppingcar` WHERE `userEmail` = '$sUserName'
        sqlCommand);



            $x = 0;
            while ($row2 = mysqli_fetch_assoc($resultRe)) {


                if ($selectID == $row2["$selectType"]) {
                    echo "<script>swal('重複加入');</script>";
                    $x = 1;
                }
            }

            if ($x == 0) {
                echo "<script>swal('加入成功');</script>";
                $sql = <<<sqlCommand
                INSERT INTO `membershoppingcar` (`userEmail`, `$selectType`) VALUES
                ('$sUserName', '$selectID')
                sqlCommand;
                mysqli_query($link, $sql);
            }
        }
    }



    // 結帳
    if (isset($_POST["buy"])) {

        if ($sUserName == "Guest") {
            header("Location: member.php");
            exit();
        } else {


            $resultShoppingCar = mysqli_query($link, <<<sqlCommand
        SELECT $selectType, popularity, a.style, t.type, name, price, images FROM `$selectType2` AS s 
        LEFT JOIN productall AS a ON s.styleID = a.styleID 
        LEFT JOIN producttype AS t ON s.typeID = t.typeID
        WHERE $selectType $selectID2
        sqlCommand);

            $row2 = mysqli_fetch_assoc($resultShoppingCar);

            $x = $row2["popularity"] + 123;

            mysqli_query($link, <<<sqlCommand
        UPDATE `$selectType2` SET `popularity` = '$x'
        WHERE `$selectType2`.`$selectType` $selectID2
        sqlCommand);
        }
    }


    // 起始網頁找到的資料
    $resultShoppingCar = mysqli_query($link, <<<sqlCommand
    SELECT $selectType, popularity, a.style, t.type, name, price, images FROM `$selectType2` AS s 
    LEFT JOIN productall AS a ON s.styleID = a.styleID 
    LEFT JOIN producttype AS t ON s.typeID = t.typeID
    WHERE $selectType $selectID2
    sqlCommand);

    $row = mysqli_fetch_assoc($resultShoppingCar);





    ?>
    <?php include("../include/goToTop.php") ?>
    <?php include("../include/header.php") ?>
    <div id='stars'></div>
    <div id='stars2'></div>
    <div id='stars3'></div>

    <div class="H"></div>
    <shoppingCarBody>
        <div class="container py-md-5">
            <div class="row align-items-end">
                <div class="col-md-6">
                    <div class="carImg">
                        <img src="../img/<?= $row["type"] ?><?= $row["style"] ?>/<?= $row["images"] ?>" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="carBody">
                        <div class="carName">
                            <h2><?= $row["name"] ?></h2>
                        </div>
                        <div class="carPrice">
                            <h2>商品價格:<?= $row["price"] ?></h2>
                        </div>
                        <div class="carPopularity">
                            <h4>銷售總量:<?= $row["popularity"] ?></h4>
                        </div>
                        <form class="form-horizontal" method="POST">
                            <div class="row form-group">
                                <div class="col-xl-4">
                                    <input id="joinCar" type="submit" name="joinCar" value="加入購物車" class="btn btn-warning"></input>

                                </div>
                                <div class="col-xl-5">
                                    <input id="buy" type="submit" name="buy" value="立即結帳" class="btn btn-info"></input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </shoppingCarBody>
    <div class="H"></div>
    <?php include("../include/floor.php") ?>
    <script src="../_js/use/goToTop.js"></script>
</body>

</html>