<?php

require("dbConnect.php");

require("select.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAME SG</title>
    <?php require("link.php"); ?>

    <style>
        /* body {
            background-color: #efecea;
        } */
        #stars:after {
            top: 2000px;
        }

        #stars2:after {
            top: 2000px;
        }

        #stars3:after {
            top: 2000px;
        }

        .ml2 {
            font-weight: 900;
            font-size: 2.5em;
        }

        .ml2 .letter {
            display: inline-block;
            line-height: 1em;
        }
    </style>
</head>

<body data-spy="scroll" data-target="#mySpy">
    <?php include("../include/goToTop.php") ?>

    <!-- <?php include("../include/op.php") ?> -->

    <?php include("../include/header.php") ?>

    <?php include("../include/marquee.php") ?>


    <div id='stars'></div>
    <div id='stars2'></div>
    <div id='stars3'></div>
    <hr>

    <myBody>
        <div id="myBody" class="container-fluid pr-0 pl-0">
            <div id="mySpy" class="row m-0">
                <div id="leftBody" class="col-2">
                    <!-- 設定清單 -->
                    <ul class="nav flex-column sticky-top">
                        <p class="display-1 pt-3"><br></p>
                        <li><a class="nav-link" href="#spyAll">人氣商品 TOP10</a></li>
                        <li><a class="nav-link" href="#spySwich">Switch專區 TOP10</a></li>
                        <li><a class="nav-link" href="#spyPS4">PS4專區 TOP10</a></li>
                    </ul>
                </div>

                <div id="rightBody" class="col-9">
                    <p id="spyAll" class="pt-3"><br></p>
                    <div class="align-items-end row">
                        <h1 class="ml2 col-11">人氣商品 TOP10</h1>
                        <a class="col-1" href="http://127.0.0.1:5501/html/shopping.html">
                            <p>更多</p>
                        </a>
                    </div>
                    <div class="row">

                        <?php while ($row = mysqli_fetch_assoc($resultAllStart)) : ?>
                            <div class="column">
                                <a href="shoppingCar.php?=<?= $row["type"] ?>=<?= $row["{$row["type"]}ID"] ?>">
                                    <div class="card">
                                        <img src="../img/<?= $row["type"] ?><?= $row["style"] ?>/<?= $row["images"] ?>" class="img-fluid">
                                        <div class="cardBody">
                                            <div class="cardBodySet">
                                                <?= $row["name"] ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>

                    </div>
                    <p id="spySwich" class="pt-3"><br></p>
                    <div class="align-items-end row">
                        <h1 class="ml2 col-11">Switch專區 TOP10</h1>
                        <a class="col-1" href="http://127.0.0.1:5501/html/shopping.html">
                            <p>更多</p>
                        </a>
                    </div>
                    <div class="row">

                        <?php while ($row2 = mysqli_fetch_assoc($resultSwitchStart)) : ?>
                            <div class="column">
                                <a href="shoppingCar.php?=<?= $row2["type"] ?>=<?= $row2["{$row2["type"]}ID"] ?>">
                                    <div class="card">
                                        <img src="../img/<?= $row2["type"] ?><?= $row2["style"] ?>/<?= $row2["images"] ?>" class="img-fluid">
                                        <div class="cardBody">
                                            <div class="cardBodySet">
                                                <?= $row2["name"] ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>

                    </div>
                    <p id="spyPS4" class="pt-3"><br></p>
                    <div class="align-items-end row">
                        <h1 class="ml2 col-11">PS4專區 TOP10</h1>
                        <a class="col-1" href="http://127.0.0.1:5501/html/shopping.html">
                            <p>更多</p>
                        </a>
                    </div>
                    <div class="row">

                        <?php while ($row3 = mysqli_fetch_assoc($resultPs4Start)) : ?>
                            <div class="column">
                                <a href="shoppingCar.php?=<?= $row3["type"] ?>=<?= $row3["{$row3["type"]}ID"] ?>">
                                    <div class="card">
                                        <img src="../img/<?= $row3["type"] ?><?= $row3["style"] ?>/<?= $row3["images"] ?>" class="img-fluid">
                                        <div class="cardBody">
                                            <div class="cardBodySet">
                                                <?= $row3["name"] ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>

                    </div>
                    <hr>
                    <div id="ad" class="row">
                        <img src="../img/ad.jpg" alt="">
                    </div>
                    </br>
                </div>
            </div>
    </myBody>
    <?php include("../include/floor.php") ?>

    <script src="../_js/use/goToTop.js"></script>
    <script src="../_js/use/m12.js"></script>
</body>

</html>