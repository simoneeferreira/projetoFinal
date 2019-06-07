<?php
    require ("private/conecta.php");
    //Executando consulta no BD para nivel de acesso
    $querySQL = mysqli_query($conectaDB, "SELECT * FROM tb_nivelacesso ORDER BY tipoAcesso") or die(mysqli_error($conectaDB));
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/dashboard.css">
        <title>Dashboard - Master</title>
    </head>
    <body>
        <div id="page">
            <header>
                <nav class="navbar navbar-dark bg-primary">
                    <a class="navbar-brand">Dashboard - Master</a>
                <a href="logout.php"><button type="button" class="btn btn-secondary">Sair</button></a>
                </nav>
            </header>
            <main id="dashboard">
                <nav id="menu-dashboard">
                    <h2>Nível de Acesso</h2>
                    <a href="cadastro-acl-master.php"><button type="button" class="btn btn-secondary">Cadastro</button></a><br>
                    <a href="consulta-acl-master.php"><button type="button" class="btn btn-secondary">Consulta</button></a>
                    <h2>Usuários</h2>
                    <a href="cadastro-usuario.php"><button type="button" class="btn btn-secondary">Cadastro</button></a><br>
                    <a href="consulta-usuario.php"><button type="button" class="btn btn-secondary">Consulta</button></a>
                    <h2>Funcionários</h2>
                    <a href="cadastro-funcionario.php"><button type="button" class="btn btn-secondary">Cadastro</button></a><br>
                    <a href="consulta-funcionario.php"><button type="button" class="btn btn-secondary">Consulta</button></a>
                    <h2>Alunos</h2>
                    <a href="cadastro-aluno.php"><button type="button" class="btn btn-secondary">Cadastro</button></a><br>
                    <a href="consulta-aluno.php"><button type="button" class="btn btn-secondary">Consulta</button></a>
                </nav>
                <div id="content-dashboard">
                    <div>
                        <h2>Cadastro de Nível de Acesso</h2>
                        <form action="grava-acl-master.php" method="post" name="frm-cadastra">
                            <label>Nível de Acesso</label>
                            <input type="text" name="nivel-acesso">
                            <input type="submit" value="Gravar" class="btn-form">
                        </form>
                    </div>
                    <div>
                        <h2>Consultar Nível de Acesso</h2>
                        <table>
                            <tr>
                                <td><b>id</b></td>
                                <td><b>ACL</b></td>
                                <td><b>Alterar</b></td>
                            </tr>
                            <?php
                            while($aux = mysqli_fetch_assoc($querySQL)){
                                $idNivelAcesso = $aux["id_nivelAcesso"];
                                $urlACL = "altera-acl-master.php?idNivelAcesso=".$idNivelAcesso;

                                echo "<tr>
                                <td>".$aux['id_nivelAcesso']."</td>
                                <td>".$aux['tipoAcesso']."</td>
                                <td><a href ='$urlACL'>Alterar</a></td>
                            </tr>"; 
                            }
                            ?>
                        </table>
                    </div>
                    <div>
                        <h2>Cadastro de Usuário</h2>
                        <form action="#" method="post" name="frm-cadastra">
                            <label>Login</label>
                            <input type="email" name="login">
                            <label>Senha</label>
                            <input type="password" name="senha">
                            <label>ACL</label>
                            <select name="idnivelAcesso">
                            <option disabled value="0" selected>selecione</option>
                            <?php
                            $querySQL=mysqli_query($conectaDB, "SELECT * FROM tb_nivelAcesso") or die(mysqli_error($conectaDB));
                            while($aux = mysqli_fetch_assoc($querySQL)){
                                $idACL = $aux["id_nivelAcesso"];
                                $ACL = $aux["tipoAcesso"];
                                echo "<option value= '$idACL'>$ACL</option>";
                            }
                            ?>
                        </select>
                            <input type="submit" value="Gravar" class="btn-form">
                        </form>
                    </div>
                    <div> 
                        <table>
                            <h2>Consulta de Usuários</h2>
                                <tr>
                                    <td><b>id</b></td>
                                    <td><b>Usuário</b></td>
                                    <td><b>ACL</b></td>
                                    <td><b>Alterar</b></td>
                                    <td><b>Excluir</b></td>
                                </tr>
                                <tr>
                                <?php
                                //Consultar o nivel de acesso na tabela de login
                                $querySQL = mysqli_query($conectaDB, "SELECT * FROM tb_login") or die (mysqli_error($conectaDB));
                                
                                while($aux = mysqli_fetch_assoc($querySQL)){

                                    $idACL = $aux["id_nivelAcesso"]; //armazenar o valor na variavel
                                
                                    //Buscar o elemento na tabela nivel de acesso que seja igual ao elemento na tabela login  
                                    $queryACL = mysqli_query($conectaDB, "SELECT * FROM tb_nivelacesso WHERE id_nivelAcesso = $idACL")
                                    or die (mysqli_error($conectaDB));
                                    while($auxACL = mysqli_fetch_assoc($queryACL)){
                                        $tipoACL = $auxACL["tipoAcesso"]; //armazenar o tipo de acesso na variavel
                                    }

                                    $idLogin = $aux["id_login"];
                                    $login = $aux["usuario"];
                                    $urluser = "altera-usuario.php?id_login=".$idLogin;
                                    echo "<tr>
                                        <td>$idLogin</td>
                                        <td>$login</td>
                                        <td>$tipoACL</td>
                                        <td><a href ='$urluser'>Alterar</a></td>
                                        <td><a href=''>Excluir</a></td>
                                    </tr>"; 
                                }
                                ?>
                                </tr>
                        </table>
                </div>
                </div>
            </main>
           
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="public/js/jquery-3.3.1.slim.min.js"></script> 
            <script src="public/js/popper.min.js"></script>
            <script src="public/js/bootstrap.min.js"></script> 
        </div>    
    </body>
</html>