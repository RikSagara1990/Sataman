
<script type="text/javascript">
    var login = '';
    var password = '';
</script>
<?php
// if (!empty($_POST['u_login']) or !empty($_POST['u_password']))
// {
//     if (($_POST['u_login']=="<jujlby") && ($_POST['u_password']=="Hfuyjhjr e;t nen")) {
//     }

//     else {
//         echo "<script>window.location.replace('index.php');</script>";
//         exit();
//     }
// }

// else
// {
//     echo "<script type='text/javascript'>";
//     echo "document.write('<form method=\'post\'>');";
//     echo "document.write('<p>Login:<br />');";
//     echo "document.write('<input type=\'text\' name=\'u_login\' value = \'' + login + '\'</p>');";
//     echo "document.write('<p>Password:<br />');";
//     echo "document.write('<input type=\'text\' name=\'u_password\' value = \'' + password + '\'</p>' + '\'</br></br>');";
//     echo "document.write('<input type=\'submit\' />');";
//     echo "document.write('</form>');";
//     echo "</script>";

//     exit();
// }
?>
<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php
    $language = $_GET['lan'];
    require_once "../functions/getdata.php";
    $valuevariable  = get_value($language);
    ?>
    <meta name="keywords" content="maukas fastfood food grill grilli ruoka cafe еда кафе гриль вкусно nice" />
    <meta name="description" content="Haminan sataman kahvilassa voimme maistua ja edullista välipalaa.Cafe in the port of Hamina, we can tasty and inexpensive snack.Кафе в порту Hamina, у нас можно вкусно и недорого перекусить." />
    <link href="../style.css" rel="stylesheet" type="text/css">
    <link href="../img/icon2.ico" rel="shortcut icon" type="image/x-icon" />
    <title><?php echo $valuevariable["title"] ?></title>
</head>
<body>

    <header>
            <div id="logo">
                <a href="#aboutUs">
                    <span><?php echo $valuevariable["logo"] ?></span>
                   <script type="text/javascript">
                   </script>
                    <a class="button" id="editworktime" onclick="editwindow('variable','logo')">
                        <div>Изменить</div>
                    </a>
                    <img src="../img/logo.png" alt="logo">
                </a>
            </div>
            <div id="navmenu">
                <a href="#aboutUs">
                   <div><?php echo $valuevariable["navmenuaboutUs"] ?></div>
                </a>
                <a href="#foodmenu">
                    <div><?php echo $valuevariable["navmenufoodmenu"] ?></div>
                </a>
                <a href="#address">
                    <div><?php echo $valuevariable["navmenuaddress"] ?></div>
                </a>
            </div>
            <div id="language">
                <a title="Russian" href="admin.php?lan=ru">
                    <img src="../img/ru.png"  alt="Russian" title="Russian"/>
                </a>
                <a title="English" href="admin.php?lan=en">
                    <img src="../img/en.png" alt="English" title="English"/>
                </a>
                <a title="Finland" href="admin.php?lan=fi">
                    <img src="../img/fi.png" alt="Finland" title="Finland"/>
                </a>
            </div>
    </header>
    <div id="maincontainer">
        <div id="aboutUs">
            <div id="worktime">
                <strong><?php echo $valuevariable["worktime"] ?></strong>
                <div id="days">
                    <?php echo $valuevariable["worktimedays"] ?>
                    <a class="button" id="editworktime" onclick="editwindow('variable','worktimedays')">
                        <div>Изменить</div>
                    </a>
                </div>
                <div id="times">
                    <?php echo $valuevariable["worktimetimes"] ?>
                    <a class="button" id="editworktime" onclick="editwindow('variable','worktimetimes')">
                        <div>Изменить</div>
                    </a>
                </div>
            </div>
        </div>
        <div id="foodmenu">
            <div id="menu">
                <strong><?php echo $valuevariable["foodmenuname"] ?></strong>
                <?php
                $datamenu = get_datamenu($language);
                if (empty($datamenu)) {
                    switch ($language)
                    {
                        case "ru":
                            echo "<p style=\"font-weight:bold;\">Страница меню в разработке!</p>";
                            break;
                        case "en":
                            echo "<p style=\"font-weight:bold;\">The menu page in the development!</p>";
                            break;
                        case "fi":
                            echo "<p style=\"font-weight:bold;\">Menu-sivun kehittämistä!</p>";
                            break;
                    }}
                else {

                    foreach ($datamenu as $elementdatamenu){
                    if(!empty($elementdatamenu))
                    echo '<div class="food" id="'.$elementdatamenu["id"].'">
                            <img class="imagefood" src="../'.$elementdatamenu["img"].'" alt="'.$elementdatamenu["name$language"].'" title="'.$elementdatamenu["name$language"].'">
                            <h2 class="name">'.$elementdatamenu["name$language"].'</h2>
                            <div class="blockDescription">
                                <p class="description">'.$elementdatamenu["description$language"].'<p>
                            </div>
                            <h2 class="cost">'.$elementdatamenu["cost"].' &euro;</h2>
                            <a class="button" id="editfood" onclick="editwindow(\'food\',\''.$elementdatamenu["id"].'\');  return false;">
                                <div>Изменить</div>
                            </a>
                        </div>';


                    // for ($i = 0; $i <= count($datamenu); $i++){
                    // if(!empty($datamenu[$i]))
                    // echo '<div class="food" id="'.$datamenu[$i]["id"].'">
                    //         <img class="imagefood" src="../'.$datamenu[$i]["img"].'" alt="'.$datamenu[$i]["name$language"].'" title="'.$datamenu[$i]["name$language"].'">
                    //         <h2 class="name">'.$datamenu[$i]["name$language"].'</h2>
                    //         <div class="blockDescription">
                    //             <p class="description">'.$datamenu[$i]["description$language"].'<p>
                    //         </div>
                    //         <h2 class="cost">'.$datamenu[$i]["cost"].' &euro;</h2>
                    //         <a class="button" id="editfood" onclick="editwindow(\'food\',\''.$datamenu[$i]["id"].'\');  return false;">
                    //             <div>Изменить</div>
                    //         </a>
                    //     </div>';
                    }}
                ?>
                </br>
                <a class="button" id="buttonadd" style="float:right;" onclick="editwindow('food','addfood');  return false;">
                    <div>Добавить</div>
                </a>
            </div>
        </div>
        <div id="address">
            <div id="divadreess">
                <strong><?php echo $valuevariable["addressname"] ?></strong>
                <p><?php echo $valuevariable["addressP"] ?></p>
                <a class="button" id="editadreess" onclick="editwindow('variable','addressP')">
                        <div>Изменить</div>
                </a>
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6415.812562088895!2d27.152329482628744!3d60.54680423740961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x27b816721713ff3f!2sSataman+Grilli!5e0!3m2!1sru!2sru!4v1533842508030" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            </br>
            <footer>
                <a href="mailito:www.riksagara@gmail.com?subject=Sataman">
                    <div id="footerdiv"><?php echo $valuevariable["footerdivname"] ?></div>
                </a>
            </foter>
        </div>
    </div>
    <script type="text/javascript">
            var linkNav = document.querySelectorAll('[href^="#"]'), //выбираем все ссылки к якорю на странице
    V = 1;  // скорость, может иметь дробное значение через точку (чем меньше значение - тем больше скорость)
for (var i = 0; i < linkNav.length; i++) {
    linkNav[i].addEventListener('click', function(e) { //по клику на ссылку
        e.preventDefault(); //отменяем стандартное поведение
        var w = window.pageYOffset,  // производим прокрутка прокрутка
            hash = this.href.replace(/[^#]*(.*)/, '$1');  // к id элемента, к которому нужно перейти
        t = document.querySelector(hash).getBoundingClientRect().top,  // отступ от окна браузера до id
            start = null;
        requestAnimationFrame(step);  // подробнее про функцию анимации [developer.mozilla.org]
        function step(time) {
            if (start === null) start = time;
            var progress = time - start,
                r = (t < 0 ? Math.max(w - progress/V, w + t) : Math.min(w + progress/V, w + t));
            window.scrollTo(0,r);
            if (r != w + t) {
                requestAnimationFrame(step)
            } else {
                location.hash = hash  // URL с хэшем
            }
        }
    }, false);
}
    function editwindow(type,variable) {
        var openeditwindow = window.open("editwindow.php?type="+type+"&var="+variable,"", 'width=500, height=500, scrollbars=0, top=150, left='+(window.screen. width/2-250));
    };
    </script>
</body>
</html>
