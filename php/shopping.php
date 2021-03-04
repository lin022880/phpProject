<?php

require("dbConnect.php");

require("select.php");


$selectType = "";
$s = "";
$s1 = "";
$s2 = "";


if (strpos($_SERVER['QUERY_STRING'], 'search') !== false) {
    $searchInShopping = $_GET["search"];
    $selectType = mysqli_query($link, <<<sqlCommand
    SELECT * FROM 
    (SELECT p.ps4ID, p.switchID, popularity, a.style, t.type, name, price, images FROM `ps4all` AS p 
    LEFT JOIN productall AS a ON p.styleID = a.styleID 
    LEFT JOIN producttype AS t ON p.typeID = t.typeID
    UNION
    SELECT s.ps4ID, s.switchID, popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
    LEFT JOIN productall AS a ON s.styleID = a.styleID 
    LEFT JOIN producttype AS t ON s.typeID = t.typeID) AS z
    WHERE name LIKE '%$searchInShopping%'
    sqlCommand);
}


switch ($_SERVER['QUERY_STRING']) {

    case 'switch=1':
        $selectType = $resultSwitchMain;
        break;

    case 'switch=2':
        $selectType = $resultSwitchGame;
        break;

    case 'switch=3':
        $selectType = $resultSwitchOther;
        break;


    case 'ps4=1':
        $selectType = $resultPs4Main;
        break;

    case 'ps4=2':
        $selectType = $resultPs4Game;
        break;

    case 'ps4=3':
        $selectType = $resultPs4Other;
        break;


    case 'switch=1price=L':
        $selectType = $resultSwitchMainL;
        $s1 = "selected";
        $_SERVER['QUERY_STRING'] = "switch=1";
        break;

    case 'switch=2price=L':
        $selectType = $resultSwitchGameL;
        $s1 = "selected";
        $_SERVER['QUERY_STRING'] = "switch=2";
        break;

    case 'switch=3price=L':
        $selectType = $resultSwitchOtherL;
        $s1 = "selected";
        $_SERVER['QUERY_STRING'] = "switch=3";
        break;

    case 'switch=1price=H':
        $selectType = $resultSwitchMainH;
        $s2 = "selected";
        $_SERVER['QUERY_STRING'] = "switch=1";
        break;

    case 'switch=2price=H':
        $selectType = $resultSwitchGameH;
        $s2 = "selected";
        $_SERVER['QUERY_STRING'] = "switch=2";
        break;

    case 'switch=3price=H':
        $selectType = $resultSwitchOtherH;
        $s2 = "selected";
        $_SERVER['QUERY_STRING'] = "switch=3";
        break;

    case 'switch=1popularity':
        $selectType = $resultSwitchMainP;
        $s = "selected";
        $_SERVER['QUERY_STRING'] = "switch=1";
        break;

    case 'switch=2popularity':
        $selectType = $resultSwitchGameP;
        $s = "selected";
        $_SERVER['QUERY_STRING'] = "switch=2";
        break;

    case 'switch=3popularity':
        $selectType = $resultSwitchOtherP;
        $s = "selected";
        $_SERVER['QUERY_STRING'] = "switch=3";
        break;



    case 'ps4=1price=L':
        $selectType = $resultPs4MainL;
        $s1 = "selected";
        $_SERVER['QUERY_STRING'] = "ps4=1";
        break;

    case 'ps4=2price=L':
        $selectType = $resultPs4GameL;
        $s1 = "selected";
        $_SERVER['QUERY_STRING'] = "ps4=2";
        break;

    case 'ps4=3price=L':
        $selectType = $resultPs4OtherL;
        $s1 = "selected";
        $_SERVER['QUERY_STRING'] = "ps4=3";
        break;

    case 'ps4=1price=H':
        $selectType = $resultPs4MainH;
        $s2 = "selected";
        $_SERVER['QUERY_STRING'] = "ps4=1";
        break;

    case 'ps4=2price=H':
        $selectType = $resultPs4GameH;
        $s2 = "selected";
        $_SERVER['QUERY_STRING'] = "ps4=2";
        break;

    case 'ps4=3price=H':
        $selectType = $resultPs4OtherH;
        $s2 = "selected";
        $_SERVER['QUERY_STRING'] = "ps4=3";
        break;

    case 'ps4=1popularity':
        $selectType = $resultPs4MainP;
        $s = "selected";
        $_SERVER['QUERY_STRING'] = "ps4=1";
        break;

    case 'ps4=2popularity':
        $selectType = $resultPs4GameP;
        $s = "selected";
        $_SERVER['QUERY_STRING'] = "ps4=2";
        break;

    case 'ps4=3popularity':
        $selectType = $resultPs4OtherP;
        $s = "selected";
        $_SERVER['QUERY_STRING'] = "ps4=3";
        break;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <?php require("link.php"); ?>

    <style>
        /* body {
            background-color: #efecea;
        } */
    </style>
</head>

<body>
    <?php include("../include/goToTop.php") ?>
    <?php include("../include/header.php") ?>
    <div id='stars'></div>
    <div id='stars2'></div>
    <div id='stars3'></div>

    <shoppingBody>
        <div class="container">

            <div id="selectBox" class="form-group row">
                <label class="col-md-4 control-label" for="selectbasic"></label>
                <div class="col-md-2">
                    <select id="selectbasic" name="selectbasic" class="form-control" onchange="javascript:location.href=this.value" ;>
                        <option value="?<?= $_SERVER['QUERY_STRING'] ?>popularity" <?= $s ?>>熱賣商品</option>
                        <option value="?<?= $_SERVER['QUERY_STRING'] ?>price=L" <?= $s1 ?>>價格低到高</option>
                        <option value="?<?= $_SERVER['QUERY_STRING'] ?>price=H" <?= $s2 ?>>價格高到低</option>
                    </select>
                </div>
            </div>

            <div class="row">

                <?php while ($row = mysqli_fetch_assoc($selectType)) : ?>
                    <div class="column">
                        <a href="shoppingCar.php?=<?= $row["type"] ?>=<?= $row["{$row["type"]}ID"] ?>">
                            <div class="card">
                                <img src="../img/<?= $row["type"] ?><?= $row["style"] ?>/<?= $row["images"] ?>" class="img-fluid">
                                <div class="cardBody">
                                    <div>$<?= $row["price"] ?></div>
                                    <div class="cardBodySet">
                                        <?= $row["name"] ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>

            </div>
        </div>
    </shoppingBody>
    <?php include("../include/floor.php") ?>
    <script src="../_js/use/goToTop.js"></script>
</body>

</html>