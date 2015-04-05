<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                padding-bottom:60px;
            }
            h2{
                width: 100%;
                padding:0px;
                text-indent: 50px;
                font-weight: 100;
            }
            h2.metodo:before{
                content:"JavaScript String ";
            }
            h2.metodo:after{
                content:" método";
            }
            pre{
                border:0px solid red;
                position: relative;
                margin:0px;
            }
            a{
                display: block;
                text-align: center;
                color:#333959;
                font:1.5em "verdana";
            }
        </style>
    </head>
    <body>
        <?php
        require "autoload.php";
        $Main = new Main();
        $q = $Main->get_categorias();
        ?>
        <a href="page.php" target="_blank">Page</a>
        <form name="form1" method="POST" enctype="multipart/form-data">
            <select name="categoria_id" required="">
                <?php
                while ($rows = $q->fetch()) {
                    echo "<option value=" . (int) $rows[0] . ">" . utf8_encode($rows[1]) . "</option>";
                }
                ?>
            </select><br/><br/>
            <select name="categoria_tipo" required="">
                <option value=""></option>
                <option value="METODO">Método</option>
                <option value="PROPRIEDADE">Propriedade</option>
            </select><br/><br/>
            <input name="nome" autofocus="" size="40" required=""  placeholder="Nome" /><br/><br/>
            <textarea name="descrição" rows="10" cols="100" required="" placeholder="Descrição"></textarea><br/>
            <textarea name="exemplo" rows="10" cols="100" required="" placeholder="Exemplo"></textarea><br/>
            <button>Salvar</button>
        </form>

        <?php
        if ($_POST) {
            $cate_goria_id = (int) filter_input(INPUT_POST, "categoria_id", FILTER_VALIDATE_INT);
            $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
            $cat_type = filter_input(INPUT_POST, "categoria_tipo", FILTER_SANITIZE_STRING);
            $exemplo = addslashes($_POST["exemplo"]);
            $func_descricao = addslashes($_POST["descrição"]);
            if ($Main->insert(trim($cate_goria_id), trim($nome), trim($exemplo), trim($cat_type), trim($func_descricao))) {
                echo "Dados inseridos com sucesso!";
            }
        }
        
       ?>
    </body>
</html>