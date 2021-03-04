<?php

// ps4熱門
// ps4Other
$resultPs4OtherP = mysqli_query($link, <<<sqlCommand
SELECT ps4ID, popularity, a.style, t.type, name, price, images FROM `ps4all` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Other'
ORDER BY `popularity` DESC
sqlCommand);

// ps4Game
$resultPs4GameP = mysqli_query($link, <<<sqlCommand
SELECT ps4ID, popularity, a.style, t.type, name, price, images FROM `ps4all` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Game'
ORDER BY `popularity` DESC
sqlCommand);

// ps4Main
$resultPs4MainP = mysqli_query($link, <<<sqlCommand
SELECT ps4ID, popularity, a.style, t.type, name, price, images FROM `ps4all` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Main'
ORDER BY `popularity` DESC
sqlCommand);
// ---------------------------------------------



// ps4低至高
// ps4Other
$resultPs4OtherL = mysqli_query($link, <<<sqlCommand
SELECT ps4ID, popularity, a.style, t.type, name, price, images FROM `ps4all` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Other'
ORDER BY `price` ASC
sqlCommand);

// ps4Game
$resultPs4GameL = mysqli_query($link, <<<sqlCommand
SELECT ps4ID, popularity, a.style, t.type, name, price, images FROM `ps4all` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Game'
ORDER BY `price` ASC
sqlCommand);

// ps4Main
$resultPs4MainL = mysqli_query($link, <<<sqlCommand
SELECT ps4ID, popularity, a.style, t.type, name, price, images FROM `ps4all` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Main'
ORDER BY `price` ASC
sqlCommand);
// ---------------------------------------------


// ps4高至低
// ps4Other
$resultPs4OtherH = mysqli_query($link, <<<sqlCommand
SELECT ps4ID, popularity, a.style, t.type, name, price, images FROM `ps4all` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Other'
ORDER BY `price` DESC
sqlCommand);

// ps4Game
$resultPs4GameH = mysqli_query($link, <<<sqlCommand
SELECT ps4ID, popularity, a.style, t.type, name, price, images FROM `ps4all` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Game'
ORDER BY `price` DESC
sqlCommand);

// ps4Main
$resultPs4MainH = mysqli_query($link, <<<sqlCommand
SELECT ps4ID, popularity, a.style, t.type, name, price, images FROM `ps4all` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Main'
ORDER BY `price` DESC
sqlCommand);
// ---------------------------------------------



// switch熱門
// switchOther
$resultSwitchOtherP = mysqli_query($link, <<<sqlCommand
SELECT switchID, popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Other'
ORDER BY `popularity` DESC
sqlCommand);

// switchGame
$resultSwitchGameP = mysqli_query($link, <<<sqlCommand
SELECT switchID, popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Game'
ORDER BY `popularity` DESC
sqlCommand);

// switchMain
$resultSwitchMainP = mysqli_query($link, <<<sqlCommand
SELECT switchID, popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Main'
ORDER BY `popularity` DESC
sqlCommand);
// ---------------------------------------------



// switch低至高
// switchOther
$resultSwitchOtherL = mysqli_query($link, <<<sqlCommand
SELECT switchID, popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Other'
ORDER BY `price` ASC
sqlCommand);

// switchGame
$resultSwitchGameL = mysqli_query($link, <<<sqlCommand
SELECT switchID, popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Game'
ORDER BY `price` ASC
sqlCommand);

// switchMain
$resultSwitchMainL = mysqli_query($link, <<<sqlCommand
SELECT switchID, popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Main'
ORDER BY `price` ASC
sqlCommand);
// ---------------------------------------------


// switch高至低
// switchOther
$resultSwitchOtherH = mysqli_query($link, <<<sqlCommand
SELECT switchID, popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Other'
ORDER BY `price` DESC
sqlCommand);

// switchGame
$resultSwitchGameH = mysqli_query($link, <<<sqlCommand
SELECT switchID, popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Game'
ORDER BY `price` DESC
sqlCommand);

// switchMain
$resultSwitchMainH = mysqli_query($link, <<<sqlCommand
SELECT switchID, popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Main'
ORDER BY `price` DESC
sqlCommand);
// ---------------------------------------------


// ps4
// ps4Other
$resultPs4Other = mysqli_query($link, <<<sqlCommand
SELECT ps4ID, popularity, a.style, t.type, name, price, images FROM `ps4all` AS p 
LEFT JOIN productall AS a ON p.styleID = a.styleID 
LEFT JOIN producttype AS t ON p.typeID = t.typeID
WHERE a.style = 'Other'
sqlCommand);

// ps4Game
$resultPs4Game = mysqli_query($link, <<<sqlCommand
SELECT ps4ID, popularity, a.style, t.type, name, price, images FROM `ps4all` AS p 
LEFT JOIN productall AS a ON p.styleID = a.styleID 
LEFT JOIN producttype AS t ON p.typeID = t.typeID
WHERE a.style = 'Game'
sqlCommand);

// ps4Main
$resultPs4Main = mysqli_query($link, <<<sqlCommand
SELECT ps4ID, popularity, a.style, t.type, name, price, images FROM `ps4all` AS p 
LEFT JOIN productall AS a ON p.styleID = a.styleID 
LEFT JOIN producttype AS t ON p.typeID = t.typeID
WHERE a.style = 'Main'
sqlCommand);
// ---------------------------------------------

// switch
// switchOther
$resultSwitchOther = mysqli_query($link, <<<sqlCommand
SELECT switchID, popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Other'
sqlCommand);

// switchGame
$resultSwitchGame = mysqli_query($link, <<<sqlCommand
SELECT switchID, popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Game'
sqlCommand);

// switchMain
$resultSwitchMain = mysqli_query($link, <<<sqlCommand
SELECT switchID, popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
WHERE a.style = 'Main'
sqlCommand);
// ---------------------------------------------



// 全部
$resultAll = mysqli_query($link, <<<sqlCommand
SELECT popularity, a.style, t.type, name, price, images FROM `ps4all` AS p 
LEFT JOIN productall AS a ON p.styleID = a.styleID 
LEFT JOIN producttype AS t ON p.typeID = t.typeID
UNION
SELECT popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
sqlCommand);

// switch
$resultSwitchAll = mysqli_query($link, <<<sqlCommand
SELECT popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
sqlCommand);

// ps4
$resultPs4All = mysqli_query($link, <<<sqlCommand
SELECT popularity, a.style, t.type, name, price, images FROM `ps4all` AS p 
LEFT JOIN productall AS a ON p.styleID = a.styleID 
LEFT JOIN producttype AS t ON p.typeID = t.typeID
sqlCommand);
// ---------------------------------------------


// 人氣排行
$resultAllStart = mysqli_query($link, <<<sqlCommand
SELECT p.ps4ID, p.switchID, popularity, a.style, t.type, name, price, images FROM `ps4all` AS p 
LEFT JOIN productall AS a ON p.styleID = a.styleID 
LEFT JOIN producttype AS t ON p.typeID = t.typeID
UNION
SELECT s.ps4ID, s.switchID, popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID
ORDER BY `popularity` DESC LIMIT 10
sqlCommand);

// switch排行
$resultSwitchStart = mysqli_query($link, <<<sqlCommand
SELECT s.switchID, popularity, a.style, t.type, name, price, images FROM `switchall` AS s 
LEFT JOIN productall AS a ON s.styleID = a.styleID 
LEFT JOIN producttype AS t ON s.typeID = t.typeID 
ORDER BY `popularity` DESC LIMIT 10
sqlCommand);

// ps4排行
$resultPs4Start = mysqli_query($link, <<<sqlCommand
SELECT p.ps4ID, popularity, a.style, t.type, name, price, images FROM `ps4all` AS p 
LEFT JOIN productall AS a ON p.styleID = a.styleID 
LEFT JOIN producttype AS t ON p.typeID = t.typeID
ORDER BY `popularity` DESC LIMIT 10
sqlCommand);

?>