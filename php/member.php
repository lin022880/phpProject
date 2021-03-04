<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>
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


    // 登入
    if (isset($_POST["loginIn"])) {

        $resultLoginIn = mysqli_query($link, <<<sqlCommand
    SELECT * FROM `member`WHERE userEmail = '{$_POST['usernameMember']}'
    sqlCommand);

        $userLogin = $_POST['usernameMember'];
        $passLogin = $_POST['passwordMember'];

        while ($row = mysqli_fetch_assoc($resultLoginIn)) {

            if ($userLogin == $row["userEmail"] && $passLogin == $row["password"]) {
                setcookie("userName", $userLogin);
                echo "<script>swal('登入成功', 'Good job!', 'success');</script>";
                header("Refresh:0.8;url=index.php");
                exit();
            }
            if ($userLogin == $row["userEmail"] && $passLogin != $row["password"]) {
                echo "<script>swal('密碼錯誤', 'error!', 'error');</script>";
            }
        }
    }

    // 註冊
    if (isset($_POST["createID"])) {

        $result = mysqli_query($link, <<<sqlCommand
    SELECT * FROM `member`
    sqlCommand);

        $repeat = 0;
        $user = $_POST['username'];
        $pass = $_POST['password'];

        while ($row2 = mysqli_fetch_assoc($result)) {

            if ($user == $row2["userEmail"]) {
                echo "<script>swal('帳號已註冊', 'error!', 'error');</script>";
                $repeat = 1;
            }
        }

        if ($repeat != 1) {
            if ($_POST['password2'] != $_POST['password']) {
                echo "<script>swal('密碼不相同', 'warning!', 'warning');</script>";
            } else {
                $sql = <<<sqlCommand
            INSERT INTO `member` (`userEmail`, `password`) VALUES
            ('$user', '$pass')
            sqlCommand;

                mysqli_query($link, $sql);
                echo "<script>swal('註冊成功', 'Good job!', 'success');</script>";
            }
        }
    }

    ?>
    <?php include("../include/header.php") ?>
    <div id='stars'></div>
    <div id='stars2'></div>
    <div id='stars3'></div>

    <memberBody>
        <div id="memberBody">
            <input type="radio" name="Control" id="Control1">
            <input type="radio" name="Control" id="Control2">
            <div class="row m-0">
                <label id="menuControl1" class="col-6 col-lg-3 text-center" for="Control1">登入</label>
                <label id="menuControl2" class="col-6 col-lg-3 text-center" for="Control2">註冊</label>
            </div>
            <div class="page">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <div class="form-group">
                        <label for="usrMember">會員帳號 :</label>
                        <input type="email" class="form-control" id="usrMember" name="usernameMember" maxlength="30" required placeholder="gmail的信箱地址*" pattern="[a-z0-9._%+-]+@gmail.com" title="gmail的信箱地址">
                    </div>
                    <div class="form-group">
                        <label for="pwdMember">會員密碼 :</label>
                        <input type="password" class="form-control" id="pwdMember" name="passwordMember" maxlength="10" minlength="8" required placeholder="8-10字符*" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}" title="為至少一個數字，一個大寫和小寫字母，以及至少8個至多10個字符">
                    </div>
                    <input id="loginIn" name="loginIn" type="submit" class="btn btn-primary" value="送出"></input>
                    <input type="submit" class="alert-light btn btn-primary" value="忘記密碼"></input>
                </form>
            </div>

            <div class="page2">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <div class="form-group">
                        <label for="usr">註冊帳號 :</label>
                        <input type="email" class="form-control" id="usr" name="username" maxlength="30" required placeholder="請輸入您的會員信箱" pattern="[a-z0-9._%+-]+@gmail.com" title="必須為gmail的信箱地址">

                    </div>
                    <div class="form-group">
                        <label for="pwd">密碼 :</label>
                        <input type="password" class="form-control" id="pwd" name="password" maxlength="10" minlength="8" required placeholder="請輸入您的會員密碼" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}" title="必須包含至少一個數字，一個大寫和小寫字母，以及至少8個至多10個字符">
                    </div>
                    <div class="form-group">
                        <label for="pwd2">確認密碼 :</label>
                        <input type="password" class="form-control" id="pwd2" name="password2" maxlength="10" minlength="3" required placeholder="請再次輸入密碼" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}">
                    </div>
                    <input id="createID" name="createID" type="submit" class="btn btn-primary" value="送出"></input>
                </form>
            </div>

        </div>
    </memberBody>
    <div class="H"></div>
    <?php include("../include/floor.php") ?>
</body>

</html>