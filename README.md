Passo a Passo para o deploy da aplicação, o projeto conta com um login, sistema de cadastro de nome, email e senha, podendo editar os mesmo em uma tabela e podendo excluir qualquer um dos registros nessa tabela.

Seu computador precisará ter o PHP e essas extensões (a depender da versão do Laravel da sua aplicação, veja a documentação):

Relacionar o item
PHP >= 7.0.0
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension
XML PHP Extension
Você também vai precisar rodar o comando 'composer update' ou 'composer instal'  na pasta raiz do projeto. Para isso terá que instalar o Composer caso ainda não tenha instalado (veja o tutorial do site oficial).

Editar o arquivo .env.example e retirar o .example, e configura com as informações respectivas do seu ambiente de banco de dados.
campos a editar:
DB_DATABASE=teste
DB_USERNAME=root
DB_PASSWORD=

após isso edite o arquivo database.php que esta na pasta config tambem com as informações do seu ambiente de banco de dados.

após isso 

execute o comando no cmd, dentro da pasta raiz do projeto 'php artisan migrate' para migrar as tabelas do bd.
ao terminar subir o servidor, com o comando 'php artisan serve.

o terminal irá gerar um endereço pra acessar o servidor.
Depois disso, basta rodar php artisan serve na raiz do projeto. Abra o site http://localhost:8080, e você verá o projeto.


para cadastrar voce vai precisar de um login administrador:

email: thiagornep@hotmail.com
senha: admin 

e
pronto.


Resumindo:

Instalar o PHP e extensões do Laravel
Instalar o Composer
Baixar as dependências do projeto usando composer update
Rodar php artisan serve
* Se seu projeto utilizar banco de dados, você precisará instalar o banco de dados e rodar php artisan migrate