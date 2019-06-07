<?php
//Importando banco de dados
    require("private/conecta.php"); 
    $login = $_POST["login"];
    $pass = $_POST["senha"];
    
    if(($pass=="")OR($login=="")){
        $resp = "!!!Login ou senha errada!!!";
        $bdLogin = "";
        $bdPass = "";
        $bdACL = "";
    }else{
        //Verifica se houve Pos e se o usuário ou a senha estão vazios
        if(!empty($_POST) AND (empty($_POST['login'])OR empty($_POST['senha']))){
            $resp = "Digite usuário e senha";
        }else{
            $login = mysqli_real_escape_string($conectaDB, $_POST['login']);
            $pass = mysqli_real_escape_string($conectaDB, $_POST['senha']);

            $result = mysqli_query($conectaDB, "SELECT * FROM tb_login WHERE usuario = '$login'");
            $linhas = mysqli_num_rows($result);
            while($aux = mysqli_fetch_assoc($result)){
                $bdLogin = $aux["usuario"];
                $bdPass = $aux["senha"];
                $bdACL = $aux["id_nivelAcesso"];
            }
            //teste para sabe se linha <> 0
            if ($linhas==0) {
                $resp = "!!!Usuário não cadastrado";
                $bdLogin = "";
                $bdPass = "";
                $bdACL = "";
            }
        }

        //já esta pronto
        if ($login == $bdLogin){
            $resp = "usuário OK";
            if($pass == $bdPass){
                $resp = "Acesso Liberado!";
                //Criando cookie de seção
                switch($bdACL){
                    case 1:
                        setcookie("userLogin", $login); //Cookie de usuário
                        setcookie("userPass", $pass); //Cookie de senha
                        //Direcionar para a pagina
                        header("Location: dashboard-master.php"); 
                        break;
                    case 2:
                        setcookie("userLogin", $login); //Cookie de usuário
                        setcookie("userPass", $pass); //Cookie de senha
                        //Direcionar para a pagina
                        header("Location: dashboard-admin.php"); 
                        break;
                    default:
                        $resp = "Usuário sem nível de acesso";
                }
            }else{
                $resp = "Login ou senha inválida!";
            }
        }else{
            $bdLogin = "";
            $bdPass = "";
            $bdACL = "";
            $resp = "Login ou senha inválida!";
        }
    }
    mysqli_close($conectaDB);
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Projeto Senac - Integrador</title>
        <meta name="viewport" content="width-device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Inserindo os CSS -->
        <link href="public/css/style-login.css" rel="stylesheet" type="text/css" media="screen">
    </head>
    <body>
        <div id="page">
            <!-- Inicio do Cabeçalho-->
            <header>
                <div class="contain">
                    <div class="logo">
                        <a href="index.html"><img src="public/img/logo.jpg"></a>
                    </div>
                    <div class="menu">
                        <!--Controle do menu responsivo-->
                        <input type="checkbox" id="controle-nav">
                        <label for="controle-nav" class="controle-nav"></label>
                        <label for="controle-nav" class="controle-nav-fecha"></label>
                        <nav>
                            <ul class="menu list-auto"><!--Inserir o class LIST-AUTO-->
                                <li><a href="#" alt="" title="">a itsp</a></li>
                                <li><a href="Cursos.html" alt="" title="">cursos</a>
                                    <ul class="dropdown1">
                                        <li><a href="curso-01.html" alt="" title="">Análise e Desenvolvimento de Sistemas </a></li>
                                        <li><a href="curso-02.html" alt="" title="">Ciências da Computação</a></li>
                                        <li><a href="curso-03.html" alt="" title="">Engenharia de Computação</a></li>
                                    </ul>
                                </li>
                                <li><a href="unidades.html" alt="" title="">unidades</a>
                                    <ul class="dropdown">
                                        <li><a href="unidade-01.html" alt="" title="">Unidade 1</a></li>
                                        <li><a href="unidade-02.html" alt="" title="">Unidade 2</a></li>
                                        <li><a href="unidade-03.html" alt="" title="">Unidade 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="login.html" alt="" title="">login</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>    
            </header>
            <!-- Fim do Cabeçalho-->
            <!-- Inicio do Corpo-->
            <main>
                <!--linha 01-->
                <div class="row">
                    <h1>login</h1>
                </div>
                <div class="row2">
                    <form action="autentica.php" method="post" class="frm">
                        <label for="email">E-mail</label>
                        <input type="text" id="login" class="txt" name="login" placeholder="E-mail..." required><br>
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" class="txt" name="senha" placeholder="Senha..." required><br>
                        <button type="submit" class="btn sucesso">Entrar</button>
                    </form>
                    <p><?=$resp?></p>
                </div>
            </main>
            <!-- Fim do Corpo-->
            <!-- Inicio do Rodapé-->
            <footer>
                    <div class="row">
                        <div class="col-4">
                            <a href="index.html"><img src="public/img/logo.jpg" alt=""></a>
                        </div>
                        <div class="col-4">
                            <nav></nav>
                        </div>
                        <div class="col-4">
                            <h3>endereço</h3><br>
                                <p>lorem ipsum in sed donec euismod.</p><br>
                                <h3>telefone</h3><br>
                                <ul>
                                    <li><b> telefone: </b><a rel="nofollow" alt="Clique e ligue" title="Clique e ligue" href="11 9999-0000">11 9999-0000</a></li><br>
                                    <li><strong>whatsapp: </strong><a rel="nofollow" alt="Clique e ligue" title="Clique e ligue" href="https://api.whatsapp.com/send?1=pt_BR&amp;phone=5511999990000 "target="_blank">11 99999-0000</a></li><br>
                                </ul>
                            <h3>email</h3><br>
                            <p><a href="mailto:contato@teste.com.br">contato@teste.com.br</a></p>
                        </div>
                        <div class="col-4">
                            <br><h3>NewsLetter:</h3>
                            <form action="assina-news.php" method="post" class="frm">
                                <label for="name">Nome</label>
                                <input type="text" id="name" class="txt" name="name" placeholder="Nome..." required><br>
                                <label for="email">E-mail</label>
                                <input type="text" id="email" class="txt" name="email" placeholder="E-mail..." required><br>
                                <button type="submit" class="btn sucesso">Assinar</button>
                            </form>
                        </div>
                    </div>    
        
                    <div class="copyright">
                        <p>Copyright @ all rights reserved</p>
                    </div> 
            </footer>
            <!-- Fim do rodapé-->
        </div>
    </body>
</html>