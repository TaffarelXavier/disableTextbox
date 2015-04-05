<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Javascript</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                padding-top:140px;
                padding-bottom:60px;
            }
            h2{
                width: 100%;
                padding:0px;
                text-indent: 50px;
                font-weight: 100;
            }
            h2.metodo:before,
            h2.evento:before,
            h2.propriedade:before{
                content:"JavaScript ";
            }
            h2.metodo:after{
                content:" método";
            }
            h2.evento:after{
                content:" evento";
            }
            h2.propriedade:after{
                content:" propriedade";
            }

            pre{
                border:0px solid red;
                position: relative;
                margin:0px;
            }
            .newspaper {
                -webkit-columns: 200px 5; /* Chrome, Safari, Opera */
                -moz-columns: 200px 5; /* Firefox */
                columns: 200px 5;
                border:1px solid #E1E2E3;
                padding:15px;
                position: fixed;
                width: auto;
                top:0px;
                left:0%;
                right: 0%;
                background: #626262;
                z-index:999;
                box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.3);
            }
            .newspaper a{
                text-decoration: none;
                color:white;
                font:1em "verdana";
            }
            .newspaper a:hover{
                text-decoration: underline;
            }
            .saida{
                width: 100%;
            }
        </style>
    </head>
    <body>
        <?php
        require "autoload.php";
        $Main = new Main();
        $q = $Main->get_categorias();

        $qq = $Main->get_funcoes();
        ?>
        <div class='newspaper'>
            <?php
            while ($rows = $qq->fetch()) {
                echo "<a href='?id=" . $rows[0] . "' >" . $rows[2] . "</a><br/>";
            }
            ?>
        </div>
        <?php
        echo "<div class='saida'>";
        if ($_GET) {
            $id = (int) filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
            $qq = $Main->get_dados_por_id($id);
            echo "<br/><hr />";
            while ($rows = $qq->fetch()) {
                $class = "";
                switch ($rows['cat_type']) {
                    case "METODO":
                        $class = "metodo";
                        break;
                    case "EVENTO":
                        $class = "evento";
                        break;
                    case "PROPRIEDADE":
                        $class = "propriedade";
                        break;
                }
                echo "<h2 class='$class'><b>" . $rows[2] . "</b></h2>";
                ?>
                <pre>
                          <!--<span>&lt;script&gt;</span>-->
                    <?php echo htmlspecialchars($rows[3]); ?><br/>
                         <!--<span>&lt;/script&gt;</span>-->
                </pre>
                <?php
                echo "<pre>";
                echo $rows[5];
                echo "</pre>";
            }
            echo "<hr />";
        }
        echo "</div>";

        $Clean = array();

        $email_pattern = '/^[^@\s<&>]+@([-a-z0-9]+\.)+[az]{2,}$/i';

        $email = "Taffarel#deus@hotmail.com";

        if (preg_match($email_pattern, $email)) {
            var_dump("OK");
        }
        ?>
    </body>

</html>
