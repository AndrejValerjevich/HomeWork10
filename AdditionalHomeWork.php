<?php

if (!empty($_GET["pageType"])) {
    $typeOfPage = $_GET["pageType"];

    if ($typeOfPage == "1") {
        $head = "Главная";
        $fieldsetClass = "main-container-fieldset__start";
    } else
        if ($typeOfPage == "2") {
            $head = "Товары";
            $fieldsetClass = "main-container-fieldset-info";
        }
}
else
{
    $head = "Главная";
    $fieldsetClass = "main-container-fieldset__start";
}

require_once '/class/Product.php';
require_once '/class/Phone.php';
require_once '/class/Laptop.php';
require_once '/class/Freezer.php';

$product_array = [];

$phone = new Phone('Phones','Apple Iphone 7',0.5,15000,'5"','21Mpx');
$product_array[] = $phone;

$laptop = new Laptop('Laptops','ASUS N1K256', 3.5, 75000, '16Gb', 'Intel Core i7');
$product_array[] = $laptop;

$big_freezer = new Freezer('Freezers', 'Samsung S456HG', 15, 30000, 'Белый', '19%');
$product_array[] = $big_freezer;

$small_freezer = new Freezer('Freezers', 'Samsung S456HG', 8, 30000, 'Белый', '19%');
$product_array[] = $small_freezer;


?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Электроника</title>
</head>
<body>
<header class="header-container">
    <div class="header-container__h1">
        <h1 class="header-container__h1__text"><?php echo $head; ?></h1>
        <a class="header-container-link" href="AdditionalHomeWork.php?pageType=1">Главная</a>
        <a class="header-container-link" href="AdditionalHomeWork.php?pageType=2">Товары</a>
    </div>
</header>
<div class="main-container">
    <fieldset class="<?php echo $fieldsetClass?>">
        <?php if ($head === "Товары") { ?>
            <table class="main-container-table">
                <tr class="table-row">
                    <td class="table-cell table-header">Товары</td>
                </tr>
                <?php foreach ($product_array as $item) { ?>
                    <tr class="table-row">
                        <td class="table-cell"><?= $item->showInformation(); ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <h1 class="main-container-fieldset__start__text-high">К товарам!</h1>
            <p class="main-container-fieldset__start__pic-low"><a href="AdditionalHomeWork.php?pageType=2"><img  class="main-container-fieldset__start__pic-arrow" src="image/arrow.png"></a></p>
        <?php } ?>
    </fieldset>
</div>
</body>
</html>
