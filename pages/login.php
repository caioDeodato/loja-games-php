<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Tela inicial</title>
</head>

<body>
    
    <h2 style="text-align: center; margin-bottom: 35px; margin-top: 10px;">Tela de login</h2>

    <?php 
        session_start();
        if(!empty($_SESSION['msg'])): 
    ?>

        <div class="alert alert-success" role="alert" style="margin-bottom: 35px; text-align: center;">
            <?php echo $_SESSION['msg']; ?>
        </div>

    <?php 
        unset($_SESSION['msg']);
        session_destroy(); 
        endif; 
    ?>

    <?php if(!empty($_SESSION['erro'])): ?>

        <div class="alert alert-danger" role="alert" style="margin-bottom: 35px; text-align: center;">
            <?php echo $_SESSION['erro']; ?>
        </div>
       
    <?php 
        unset($_SESSION['erro']);
        session_destroy(); 
        endif; 
    ?> 
    
    <div class="container" style="display: flex; justify-content: center;">


        <div class="forms" style="max-width: 350px; max-height: 700px;">
            <form action="../controller/controller_pageLogin.php?form=login" method="post" id="form-login">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="admin@admin.com">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" value="admin">
                </div>

                <div class="botoes" style="align-items: overflow-y;">
                    <button type="submit" class="btn btn-primary">Logar</button><br><br>
                    <a href="#" onclick="toCad()">Ainda não possui conta? Crie uma agora</a>
                </div>
            </form>

            <form action="../controller/controller_pageLogin.php?form=cadastrar" method="post" id="form-cad" >

                <div class="form-group">
                    <label for="nome">Nome e sobrenome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="Teste 01">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="teste1@teste.com">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" value="teste">
                </div>

                <div class="botoes" style="align-items: overflow-y;">
                    <button type="submit" class="btn btn-primary">Cadastrar</button><br><br>
                    <a href="#" onclick="toLogin()">Ja possui conta? Faça login agora mesmo</a>
                </div>
            </form>
        </div>

    </div>

</body>

<script>

    window.onload = () => {
        document.getElementById('form-cad').style.display = "none";
    }

    function toCad() {
        document.getElementById('form-cad').style.display = "block";
        document.getElementById('form-login').style.display = "none";
    }

    function toLogin() {
        document.getElementById('form-login').style.display = "block";
        document.getElementById('form-cad').style.display = "none";
    }

</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>