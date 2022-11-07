<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" 
        crossorigin="anonymous">
    <title>Home</title>
</head>
<style>
    * {
        font-family: 'Roboto', sans-serif;
    }

    .container {
        width: 40%; 
    }

    .buttons {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-top: 1rem;
        font-weight: bold;
    }

    .buttons button {
        width: 40%;
    }

    .buttons a {
        width: 40%;
    }

    p {
        color: red;
        font-size: 1rem;
        font-weight: bold;
    }

</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{!! URL::to('/home/lista') !!}">Lista Usuário<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{!! URL::to('/home/sair') !!}">Sair</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Cadastro - Gree</h1>
        <form id="registerForm" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o seu nome" required>
            </div>

            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
            </div>

            <div class="form-row">
                <div class="col">
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                </div>
                <div class="col">
                    <input type="password" class="form-control" id="confSenha" name="confSenha" placeholder="Confirmar Senha" required>
                </div>
            </div>

            <div class="buttons">
                <button type="submit" class="btn btn-success">Cadastro</button>
                <button type="button" id="clearForm" onclick="document.getElementById('registerForm').reset();" class="btn btn-info">Limpar</button>
            </div>
        </form>
        <div id="message"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("form").submit(function(e){
                e.preventDefault();
                let form = $(this).serializeArray();

                if(form[2].value === form[3].value){
                    $.ajax({
                        type:'POST',
                        url:"{!! URL::to('/home') !!}",
                        dataType: 'JSON',
                        data: form,
                        success:function(data){
                            clearForm();
                            $("p").remove();
                            alert(data);
                        },
                        error:function(error){
                            alert('Erro' + error);
                        },
                    });
                } else {
                    $("#message").append('<p>Senhas Diferentes, por favor informe senhas iguais</p>');
                }

            });
            function clearForm(){
                document.getElementById("registerForm").reset();
            }
        });
    </script>
</body>
</html>