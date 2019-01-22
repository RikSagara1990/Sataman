<?php
$language = $_GET['lan'];
if (empty($language))
{
    header("Location: SelectLanguage.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="maukas fastfood food grill grilli ruoka cafe еда кафе гриль вкусно nice" />
    <meta name="description" content="Haminan sataman kahvilassa voimme maistua ja edullista välipalaa.Cafe in the port of Hamina, we can tasty and inexpensive snack.Кафе в порту Hamina, у нас можно вкусно и недорого перекусить." />
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="img/icon2.ico" rel="shortcut icon" type="image/x-icon" />
    <title><?php 
    require_once "functions/getdata.php";
    $valuevariable  = get_value($language);
    echo $valuevariable["title"] ?></title>
</head>
<body>

    <header>
            <div id="logo">
                <a href="#aboutUs" title="Перейти на гравную">
                    <span><?php echo $valuevariable["logo"] ?></span>
                    <img src="img/logo.gif" alt="logo">
                </a>
            </div>

            <?php
                switch($language) {
                    case "ru":
                        $titlelan = "Russian";
                        break;
                    case "en":
                        $titlelan = "English";
                        break;
                    case "fi":
                        $titlelan = "Finland";
                        break;                        
                }
                echo '<a class="changelan" id="language" title="'.$titlelan.'" onclick="togglevisibility(\'divchangelan\')"> 
                <img src="img/'.$language.'.png"  alt="'.$titlelan.'" title="'.$titlelan.'"/>
                </a>';
            ?> 

            <div id="navmenu">
                <a href="#address">
                    <div><?php echo $valuevariable["navmenuaddress"] ?></div>
                </a>
                <a href="#foodmenu">
                    <div><?php echo $valuevariable["navmenufoodmenu"] ?></div>
                </a>
                <a href="#aboutUs">
                   <div><?php echo $valuevariable["navmenuaboutUs"] ?></div>
                </a>
            </div>


    </header>
    <div class="changelan" id="divchangelan">     
                <a title="Russian" href="index.php?lan=ru"> 
                    <img src="img/ru.png"  alt="Russian" title="Russian"/>
                </a>
                <a title="English" href="index.php?lan=en">
                    <img src="img/en.png" alt="English" title="English"/>
                </a>
                <a title="Finland" href="index.php?lan=fi">
                    <img src="img/fi.png" alt="Finland" title="Finland"/>
                </a> 
    </div>
    <div id="maincontainer">
        <div id="aboutUs">
            <div id="worktime">
                <strong><?php echo $valuevariable["worktime"] ?></strong>
                <div id="days">
                    <?php echo $valuevariable["worktimedays"] ?>
                </div>
                <div id="times">
                    <?php echo $valuevariable["worktimetimes"] ?>
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
                                <img class="imagefood" src="'.$elementdatamenu["img"].'" alt="'.$elementdatamenu["name$language"].'" title="'.$elementdatamenu["name$language"].'">
                                <div class="blockDescription">
                                    <h2 class="name">'.$elementdatamenu["name$language"].'</h2>
                                    <p class="description">'.$elementdatamenu["description$language"].'</p>
                                </div>
                                <h2 class="cost">'.$elementdatamenu["cost"].' &euro;</h2>
                            </div>';
                    }}
                ?>
            </div>
        </div>
        <div id="address">     
            <div id="divadreess">
                <strong><?php echo $valuevariable["addressname"] ?></strong>
                <p><?php echo $valuevariable["addressP"] ?></p>
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6415.812562088895!2d27.152329482628744!3d60.54680423740961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x27b816721713ff3f!2sSataman+Grilli!5e0!3m2!1sru!2sru!4v1533842508030" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            </br>
            <footer>
                <a href="mailito:www.riksagara@gmail.com?subject=Sataman">
                    <div id="footerdiv"><?php echo $valuevariable["footerdivname"] ?></div>
                </a>
            </footer>
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

        function togglevisibility(id) {
            var div = document.getElementById(id);
            if(div.style.display == 'block')
                div.style.display = 'none';
            else
                div.style.display = 'block';
        }
    </script>
</body>
</html>
