<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../style.css" rel="stylesheet" type="text/css">
<link href="../img/icon2.ico" rel="shortcut icon" type="image/x-icon" />
<title>Редактирование</title>

<?php
require_once "functions/getdata.php";
$type = $_GET['type'];
$var = $_GET['var'];


// $typevariable = look_variables($var);
// echo "<pre>"; print_r($variables); echo "</pre>";

if ($type == "variable"){
        $valuevariable  = get_value($var);

        echo '<div id="editmainvariable">
                <form enctype="multipart/form-data" name="formeditmainvariable" method="post" action="editwindow.php">
                    </br>
                    <center>
                        <h3>Финский</h3>
                        <textarea name="fivalue">'.$valuevariable["fi"].'</textarea>
                        </br>
                        <h3>Английский</h3>
                        <textarea name="envalue">'.$valuevariable["en"].'</textarea>
                        </br>
                        <h3>Русский</h3>
                        <textarea name="ruvalue">'.$valuevariable["ru"].'</textarea>
                        <input type="hidden" name="variable" value="'.$var.'">
                        </br>
                        <input class="inputchange" type="submit" name="inputchangevar" value="Изменить">
                    </centre>
                </form>
            </div>';
    };

if ($type == "food"){
    if ($var != "addfood"){
        $datamenu = get_datafood($var);};
    if ($var == "addfood"){
        $datamenu["img"] = "../img/food/none.jpg";};
    echo '<div id="editfoodmenu">
        <form enctype="multipart/form-data" name="formeditfoodmenu" method="post" action="editwindow.php">
        <center>
        <input type="hidden" name="foodid" value="'.$datamenu["Id"].'">
        <input type="hidden" name="img" value="'.$datamenu["img"].'">
        <h3>Изображение</h3>
        <input type="file" accept="image/*" name="loadlogo" id="loadlogo">
        </br>
        <img class="imagefood" id="imagefood" src="'.$datamenu["img"].'">
        </br>
        <h3>Финское название</h3><input class="name" type="text" name="FiName" value="'.$datamenu["nameFI"].'">
        </br>
        <h3>Английское название</h3><input class="name" type="text" name="EnName" value="'.$datamenu["nameEN"].'">
        </br>
        <h3>Русское название</h3><input class="name" type="text" name="RuName" value="'.$datamenu["nameRU"].'">
        </br>
        <h3>Финское описание</h3>
        <textarea name="FiDescription">'.$datamenu["descriptionFI"].'</textarea>
        </br>
        <h3>Английское описание</h3>
        <textarea name="EnDescription">'.$datamenu["descriptionEN"].'</textarea>
        </br>
        <h3>Русское описание</h3>
        <textarea name="RuDescription">'.$datamenu["descriptionRU"].'</textarea>
        </br>
        <h3>Цена в евро</h3><input class="cost" type="number" step="0.1" name="cost" value="'.$datamenu["cost"].'">
        </br>';
    if (!empty($datamenu["Id"])){
        echo '<input style="background: #a12607;" class="inputchange" type="submit" name="inputdelete" value="Удалить">
        <input class="inputchange" type="submit" name="inputaddfood" value="Изменить">';}
    else {
        echo '<input style="background: #36ad26;" class="inputchange" type="submit" name="inputaddfood" value="Добавить">';
        };
    echo '  </centre>
        </form>
        </div>';
    };

// Действия для кнопок

if(isset($_POST['inputchangevar'])){
    $fivalue = $_POST['fivalue'];
    $envalue = $_POST['envalue'];
    $ruvalue = $_POST['ruvalue'];
    $variable = $_POST['variable'];
    connectDB();
    $mysqli->query("UPDATE `languages` SET `fi` = '$fivalue', `en` = '$envalue', `ru` = '$ruvalue' WHERE `variable` = '$variable'");
    closeDB();
    echo "<script>alert(\"Изменения внесенны!\");
    window.opener.location.reload();
    window.close();
    </script>";}

if(isset($_POST['inputaddfood'])){
    $foodid = $_POST['foodid'];
    $finame = $_POST['FiName'];
    $enname = $_POST['EnName'];
    $runame = $_POST['RuName']; 
    $fidescription = $_POST['FiDescription'];
    $endescription = $_POST['EnDescription'];
    $rudescription = $_POST['RuDescription'];
    $cost = $_POST['cost'];
    $img = $_POST['img'];

    include("functions\getimage.php");
    if (!empty($foodid)) {
        if (!empty($_FILES['loadlogo']['name'])) {
            unlink($img);
            $img = loadimage($enname);
            $changeimage = "`img`='$img',";
        }
        else {
            $changeimage = "";
            echo "<script>alert(\"переменная удалена\");</script>";
        }
        connectDB(); 
        $mysqli->query("UPDATE `foods` SET $changeimage `nameFI`='$finame', `nameEN`='$enname', `nameRU`='$runame', `descriptionFI`='$fidescription', `descriptionEN`='$endescription', `descriptionRU`='$rudescription', `cost`='$cost' WHERE `Id` = '$foodid';");
        closeDB();
         echo "<script>alert(\"Форма НЕ работает\");</script>";
        echo "<script>alert(\"Меню изменено!\");
        window.opener.location.reload();
        window.close();
        </script>";}
    else {
        $img = loadimage($enname);
        connectDB();
        $mysqli->query("INSERT INTO `foods` (`img`, `nameFI`, `nameEN`, `nameRU`, `descriptionFI`, `descriptionEN`, `descriptionRU`, `cost`) VALUE ('$img', '$finame', '$enname', '$runame', '$fidescription', '$endescription', '$rudescription', '$cost');");
        closeDB();
        echo "<script>alert(\"Меню добавленно!\");
        window.opener.location.reload();
        window.close();
        </script>";}
        };

if(isset($_POST['inputdelete'])){
    $foodid = $_POST['foodid'];
    connectDB(); 
    $mysqli->query("DELETE FROM `foods` WHERE `Id` = '$foodid';");
    closeDB();
    echo "<script>alert(\"Меню удалено!\");
        window.opener.location.reload();
        window.close();
        </script>";
};
?>

<script src="js/function.js"></script>
<script> 
document.getElementById('loadlogo').addEventListener('change', handleFileSelect, false);
</script>
