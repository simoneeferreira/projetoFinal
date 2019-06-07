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
        <title>Cadastro - Funcionário</title>
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
                    <a href="cadastro-funcionario.php"><button type="button" class="btn btn-secondary active">Cadastro</button></a><br>
                    <a href="consulta-funcionario.php"><button type="button" class="btn btn-secondary">Consulta</button></a>
                    <h2>Alunos</h2>
                    <a href="cadastro-aluno.php"><button type="button" class="btn btn-secondary">Cadastro</button></a><br>
                    <a href="consulta-aluno.php"><button type="button" class="btn btn-secondary">Consulta</button></a>
                </nav>
                <div id="content-dashboard">
                    <div id="cadastro-func">
                        <h2>Cadastro de Funcionário</h2>
                        <form action="grava-funcionario.php" method="post" name="frm-cadastra">
                            <table>
                                <tr>
                                        <td>
                                            <h2>Informações Pessoais</h2>
                                            <label>Usuário:</label>
                                                <select name="email">
                                                    <option disabled value="0" selected>selecione</option>
                                                    <?php
                                                    $querySQL=mysqli_query($conectaDB, "SELECT * FROM tb_login") or die(mysqli_error($conectaDB));
                                                    while($aux = mysqli_fetch_assoc($querySQL)){
                                                        $email = $aux["usuario"];
                                                        echo "<option value= '$email'>$email</option>";
                                                    }
                                                    ?>
                                                </select><br>
                                                <label>Nome:</label><input type="text" name="nome" require><br>
                                                <label>Data de Nascimento: </label><input type="date" name="nascimento" require><br>
                                                <label>Sexo:</label><input type="radio" name="genero" value="masculino" require>Masculino 
                                                            <input type="radio" name="genero" value="feminino">Feminino
                                                            <input type="radio" name="genero" value="outro">Outro<br>
                                            </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2>Contatos</h2>
                                        <label>Telefone: </label><input type="tel" name="telefone" pattern="[0-9]{6}-[0-9]{4}">
                                        <label>Celular: </label><input type="tel" name="telefone" pattern="[0-9]{7}-[0-9]{4}"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2>Informações profissionais</h2>
                                        <label>Cargo: </label><input type="text" name="cargo" require><br>
                                        <label>Departamento:</label>
                                        <select name="departamento" require>
                                            <option disabled value="0" selected>selecione</option>
                                            <option value="admin">Administrativo</option>
                                            <option value="doc">Docência</option>
                                            <option value="recH">RH</option>
                                            <option value="servG">Serviços Gerais</option>
                                            <option value="sec">Secretaria</option>
                                        </select><br>
                                        <label>Data de admissão:</label><input type="date" require><br>
                                        <label>Status:</label>
                                        <select name="status" require>
                                            <option disabled value="0" selected>selecione</option>
                                            <option value="ativo">Ativo</option>
                                            <option value="inativo">Inativo</option>
                                        </select><br>
                                        <label>Data de demissão:</label><input type="date"><br>
                                        <label>Carga horária semanal:</label>
                                        <select name="hrtrab" require>
                                            <option disabled value="0" selected>selecione</option>
                                            <option value="primeira">20hs</option>
                                            <option value="segunda">40hs</option>
                                            <option value="segunda">48hs</option>
                                        </select><br>
                                        <label>Salário mensal(R$):</label><input type="text" require><br>
                                    </td>
                                </tr>
                                <tr>  
                                    <td> <input type="submit" value="Gravar" class="btn-form"></td>  
                                </tr>
                            </table>
                        </form>
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