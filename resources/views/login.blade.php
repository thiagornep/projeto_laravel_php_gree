<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">    
    <title>Sistema Gree</title>
</head>

<style>

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
        background-color: #FFF;
    }

    body {
        height: 100vh;
        width: 100vw;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container-input {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100%;
    }

    .container-input form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 1rem;
        width: 50%;
        height: 40%;
    }

    .input {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        height: 40%;
        width: 100%;
    }

    .input-div {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin-bottom: 1rem;
    }

    .input-div input{
        height: 2.3rem;
        width: 50%;
        border-radius: .6rem;
        border: 1px solid #616161;
        font-size: 1rem;    
        text-align: center;
    }

    .button-div {
        display: flex;
        justify-content: center;
        margin-top: 1rem;
        width: 100%;
    }

    .button-div button {
        height: 2.3rem;
        width: 30%;
        border-radius: .6rem;
        border: none;
        font-weight: bold;
        font-size: 1rem;
        background-color: #00e676;
        color: #FFF;
        margin-bottom: 1rem;
    }

    .button-div button:hover {
        cursor: pointer;
        background-color: #00c853;
    }

    p {
        color: red;
        font-size: 1rem;
        font-weight: bold;
    }

</style>

<body>
    <div class="container">

        <div class="container-input">
            <h1>Login | Gree</h1>

            <form action="" method="POST" class="container-form">
                <div class="input">
                    <div class="input-div">
                        <input type="text" name="email" placeholder="E-mail">
                    </div>

                    <div class="input-div">
                        <input type="password" name="senha" placeholder="Senha">
                    </div>

                    <div class="button-div">
                        <button type="submit" name="enviar">Logar</button>
                    </div>
                    <p></p>
                </div>

            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("form").submit(function(e)
            {
                e.preventDefault();
                let form = $(this).serialize();

                $.ajax({
                    type:'POST',
                    url:"{!! URL::to('/') !!}",
                    dataType: 'JSON',
                    data: form,
                    success:function(data){
                        if(data.status === 'success') {
                            console.log(data.value);
                            $(location).attr("href", data.value);
                        } else {
                            $("p").html(data.value);
                        }
                    },
                    error:function(){
                        alert('Erro');
                    },
                });
            });
        });
    </script>
</body>
</html>