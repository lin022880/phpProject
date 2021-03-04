<?php

if (isset($_GET["logout"])) {
    setcookie("userName", "Guest", time() - 3600);
    header("Location: index.php");
    exit();
}

if (isset($_COOKIE["userName"])) {
    $sUserName = $_COOKIE["userName"];
    // echo $sUserName;
    $memberIcon = "VIP.svg";
} else {
    $sUserName = "Guest";
    $memberIcon = "notVIP.svg";
}

if (isset($_POST["searchGo"])) {
    $searchIn = $_POST["searchIn"];
    if ($_POST["searchIn"] == "") {
        // echo "不能空白";
    } else {
        header("Location: shopping.php?search=$searchIn");
    }
}



$resultmemberShoppingCarI = mysqli_query($link, <<<sqlCommand
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

$i = 0;
while (mysqli_fetch_assoc($resultmemberShoppingCarI)) {
    $i = $i + 1;
}

?>

<myHeader>
    <div id="myHeader_1" class="align-items-center justify-content-center m-0 row">
        <div class="col-5 col-md-4 col-lg-2">
            <img id="LOGO" class="" src="../img/LOGO_48b8e7.svg" alt="">
        </div>
        <div class="col-auto col-md-auto col-lg-4">
            <?php if ($sUserName == "Guest") : ?>
            <?php else : ?>
                歡迎: <?= $sUserName; ?>
            <?php endif; ?>
        </div>
        <div class="input-group col-md-4 col-lg-3">
            <form class="input-group-append" method="POST">
                <input name="searchIn" type="text" class="form-control" placeholder="Search">
                <input name="searchGo" value="Go" class="btn btn-success" type="submit"></input>
            </form>

        </div>
        <?php if ($sUserName == "Guest") : ?>

        <?php else : ?>
            <a id="loginOut" style="float: left; font-size: 20px;" href="index.php?logout=1">登出</a>
        <?php endif; ?>
        <div id="myHeaderImgId" class="text-right col-5 col-md-3 col-lg-2">

            <?php if ($sUserName == "Guest") : ?>
                <a style="text-decoration: none;" href="member.php">
                    <img class="myHeaderImg" src="../img/<?= $memberIcon ?>" alt="">
                </a>
            <?php else : ?>
                <a style="text-decoration: none;" href="memberEdit.php">
                    <img class="myHeaderImg" src="../img/<?= $memberIcon ?>" alt="">
                </a>
            <?php endif; ?>

            <?php if ($sUserName == "Guest") : ?>
                <img class="myHeaderImg" src="../img/cart.svg" alt="">
            <?php else : ?>
                <a id="countIFather" style="text-decoration: none;" href="memberShoppingCar.php">
                    <div id="countI"><?= $i; ?></div>
                    <img class="myHeaderImg" src="../img/VIPcart.svg" alt="">
                </a>
            <?php endif; ?>
            <img id="mySearch" class="myHeaderImg" src="../img/magnifierIcon.svg" alt="">
        </div>
    </div>
    <div id="myHeader_2" class="sticky-top">
        <div id="mobileMenu">
            <input id="menuControl" type="checkbox" name="">
            <div class="mobileMenu">
                <label for="menuControl"></label>
                <nav>
                    <ul class="navbar-nav">
                        <li class="mb-2 nav-item text-right">
                            <label for="menuControl"><img src="../img/XIcon.svg" alt=""></label>
                        </li>
                        <li class="mr-5 nav-item active">
                            <a class="nav-link" href="index.php">首頁<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="mr-5 nav-item">
                            <a class="nav-link" href="#">活動專區</a>
                        </li>
                        <li class="mr-5 nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Switch專區
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="shopping.php?switch=1">Switch主機</a>
                                <a class="dropdown-item" href="shopping.php?switch=2">Switch遊戲</a>
                                <a class="dropdown-item" href="shopping.php?switch=3">Switch周邊</a>
                            </div>
                        </li>
                        <li class="mr-5 nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                PS4專區
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="shopping.php?ps4=1">PS4主機</a>
                                <a class="dropdown-item" href="shopping.php?ps4=2">PS4遊戲</a>
                                <a class="dropdown-item" href="shopping.php?ps4=3">PS4周邊</a>
                            </div>
                        </li>
                        <li class="mr-5 nav-item">
                            <a class="nav-link" href="#">客服Q&A</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>


        <nav id="webMenu" class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="mr-5 nav-item active">
                        <a class="nav-link" href="index.php">首頁<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="mr-5 nav-item">
                        <a class="nav-link" href="#">活動專區</a>
                    </li>
                    <li class="mr-5 nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Switch專區
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="shopping.php?switch=1">Switch主機</a>
                            <a class="dropdown-item" href="shopping.php?switch=2">Switch遊戲</a>
                            <a class="dropdown-item" href="shopping.php?switch=3">Switch周邊</a>
                        </div>
                    </li>
                    <li class="mr-5 nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            PS4專區
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="shopping.php?ps4=1">PS4主機</a>
                            <a class="dropdown-item" href="shopping.php?ps4=2">PS4遊戲</a>
                            <a class="dropdown-item" href="shopping.php?ps4=3">PS4周邊</a>
                        </div>
                    </li>
                    <li class="mr-5 nav-item">
                        <a class="nav-link" href="#">客服Q&A</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</myHeader>