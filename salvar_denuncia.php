<?php
include './funcoes_banco.php';

//pega os dados do formulário
$nome = isset($_POST["nome"]) ? $_POST["nome"] : '';
$email = isset($_POST["email"]) ? $_POST['email'] : '';
$tipo = isset($_POST['tipoRoubo']) ? $_POST['tipoRoubo'] : '';
$generos = isset($_POST['genero']) ? $_POST['genero'] : '';
$locais = isset($_POST['local']) ? $_POST['local'] : '';

//executa as funções do banco: conecta se exirtir, cria o banco se não existir, cria tabela se não existir,insere os dados

$pdo = conectar_banco();
criar_banco($pdo);
criar_tabela($pdo);
$inserir_denuncia = inserir_denuncia($pdo, $nome, $email, $generos, $tipo, $locais);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Não entre para a estatística!</title>


        <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="boostrap/css/estilo.css">
        <link rel="stylesheet" href="boostrap/css/bootstrap.css">
        <script src="jquery/jquery-3.3.1.js"></script>
        <script type="text/javascript"> //script para trocar o estilo do menu ao rolar a pagina
            jQuery(function () {
                jQuery(window).scroll(function () {
                    if (jQuery(this).scrollTop() > 20) {
                        $("#menu1").addClass("menu-diferente");
                    } else {
                        $("#menu1").removeClass("menu-diferente");
                    }
                });
            });
        </script>

    </head>
    <body>

        <nav class="navbar fixed-top navbar-expand-lg navbar-dark"id="menu1">
            <a class="navbar-brand" href="index.html">Rua Segura</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav r">
                    <li class="nav-item">
                        <a class="nav-link" href="denunciar.html">Denunciar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mostrar_ranking.php">Estatísticas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="sobre.html">Sobre</a>
                    </li>
                </ul>
            </div>
        </nav>

        <br><br><br><br>
        
        <div id="informacoes-usuario" class="shadow-lg bg-white col-md-6 offset-md-3" style="margin-top: 100px;">
<?php


echo "<h1>Muito Obrigado pelo seu Relato!</h1><br>";
echo "NOME: $nome <br>EMAIL: $email <br> TIPO DE ROUBO: $tipo <br>";
echo "GENERO: $generos <br> LOCAL: $locais";
echo "<br>Veja nosso Ranking e evite ruas perigosas!!!";


?>
        <div class="icones">
            <a class="btn btn-outline-primary" id="btn1" href="denunciar.html">
                <img src="imagens/resume%20(1).png"><br>
                <p>Abrir Denuncia</p>
            </a>
            <a class="btn btn-outline-primary" id="btn2" href="mostrar_ranking.php">
                <img src="imagens/graph.png"><br>
                <p>Estatísticas</p>
            </a>
            <a class="btn btn-outline-primary"id="btn3" target="_blank" href="http://www.facebook.com/sharer.php?u=https://alemaowill.github.io/ruasegura">
                <img src="imagens/facebook.png"><br>
                <p>Compartilhe!</p>
            </a>
            <br><br><br><br><br><br><br><br><br> <!-- gambiarra -->

        </div>
       <!-- Footer -->
        <footer class="footer">
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
            <div class="container">
                <ul class="list-unstyled list-inline text-center">
                    <li class="list-inline-item">
                        <a  href="http://www.facebook.com" target="_blank" class="btn-floating btn-fb mx-1">
                            <i class="fa fa-facebook"> </i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://twitter.com/" target="_blank" class="btn-floating btn-tw mx-1">
                            <i class="fa fa-twitter"> </i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://plus.google.com" target="_blank" class="btn-floating btn-gplus mx-1">
                            <i class="fa fa-google-plus"> </i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.linkedin.com/" target="_blank" class="btn-floating btn-li mx-1">
                            <i class="fa fa-linkedin"> </i>
                        </a>
                    </li>
                </ul>
                <!-- Social buttons -->
            </div>
            <div class="p-footer"> Desenvolvido por William, Vitor e Gabriel</div>
            <!-- Footer Elements -->
            <!-- Copyright -->
            <div class="copyright">© 2018 Copyright:
                <a href="https://www.fadergs.edu.br/"> Fadergs.edu.br </a>
            </div>
            <!-- Copyright -->
        </footer>
        
        <!--importação de frameworks  -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </body>
</html>


