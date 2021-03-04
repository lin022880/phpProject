<?php

require("dbConnect.php");

require("select.php");


if (isset($_COOKIE["userName"])) {
    $sUserName = $_COOKIE["userName"];
    // echo $sUserName;
} else {
}

if (isset($_POST["cancelFavorite"])) {
    if (isset($_POST['cancelCheck'])) {

        $check = $_POST['cancelCheck'];
        foreach ($check as $value) {
            mysqli_query($link, <<<sqlCommand
            DELETE FROM `membershoppingcar`  
            WHERE $value
            sqlCommand);
        }
    }
}

$resultmemberShoppingCar = mysqli_query($link, <<<sqlCommand
SELECT `Number`, `userEmail`, z.ps4ID, z.switchID, popularity, z.style, z.type, name, price, images FROM `membershoppingcar` m JOIN 
(SELECT p.ps4ID, p.switchID, popularity, a.style, t.type, name, price, images FROM `ps4all` AS p 
LEFT JOIN productall AS a ON p.styleID = a.styleID 
LEFT JOIN producttype AS t ON p.typeID = t.typeID
UNION
SELECT s.ps4ID, s.switchID, popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID) AS Z
ON m.switchID = z.switchID OR m.ps4ID = z.ps4ID
WHERE m.userEmail = '$sUserName'
ORDER BY `Number` ASC
sqlCommand);





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MemberCar</title>
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

    <membershoppingCar>

        <div class="container">
            <form action="" method="POST">
                <div class="row">
                    <?php while ($row = mysqli_fetch_assoc($resultmemberShoppingCar)) : ?>
                        <div class="column">
                            <a href="shoppingCar.php?=<?= $row["type"] ?>=<?= $row["{$row["type"]}ID"] ?>">
                                <div class="memberShoppingCard">
                                    <img src="../img/<?= $row["type"] ?><?= $row["style"] ?>/<?= $row["images"] ?>" class="img-fluid">
                                    <div class="cardBody">

                                        <div>$<?= $row["price"] ?><input type="checkbox" name="cancelCheck[]" value="<?= $row["type"] . 'ID' . '=' . $row["{$row["type"]}ID"] ?>" id="cancelCheck"></div>
                                        <div class="cardBodySet">
                                            <?= $row["name"] ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
                <input type="submit" name="cancelFavorite" id="cancelFavorite" class="btn btn-danger" value="刪除選項">
            </form>
        </div>
    </membershoppingCar>
    <div class="H2"></div>
    <?php include("../include/floor.php") ?>
    <script src="../_js/use/goToTop.js"></script>
</body>

</html>