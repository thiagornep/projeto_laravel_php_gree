<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name = "csrf-token" content = "{{csrf_token ()}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Lista</title>
</head>

<style>
     .table-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin-top: 1rem;
    }

    .table-container table {
        width: 40%;
    }

    .buttons-table{
        display: flex;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{!! URL::to('/home') !!}">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Lista Usuário<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{!! URL::to('/home/sair') !!}">Sair</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="table-container">
        <h1>Lista de Usuário | Gree</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Opçõe</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user): ?>
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <form method="POST" action="{{url('home/lista', [$user->id])}}">
                        @method('patch')
                        @csrf
                            <td><input type="text" name="name" value="{{ $user->name }}"></td>
                            <td><input type="email" name="email" id="{{$user->id}}" value="{{ $user->email }}"></td>
                            <td><input type="password" name="senha" value="{{ $user->senha }}"></td>
                            <td>
                                <div class="buttons-table">
                                    <button type="submit" class="btn btn-info">Editar</button>
                        </form>
                                <form method="POST" action="{{url('home/lista', [$user->id])}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        {{ $users->links() }}
    </div>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $("form").submit(function(e)
            {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: "{{url('home/lista', [$user->id])}}",
                    dataType: 'JSON',
                    success:function(data){
                        alert("Sucesso");
                    },
                    error:function(){
                        alert('Erro');
                    },
                });
            });
        });
    </script> -->

</body>
</html>