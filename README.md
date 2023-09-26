# Módulo 7

## Exercício de fixação:
Dado o exemplo do vídeo (clone o repositório), crie uma página que contenha um formulário para criação de usuários;

Crie uma rota GET para desenhar esse formulário;

Crie uma rota POST para receber os dados e criar um novo User no banco de dados. Use uma Action para criar o usuário;

Após a criação, faça um redirect para a rota find/{id} do usuário recém criado.

### Repositório com o código do vídeo:
https://github.com/university-lessons/dabaf-07-request-flow

### Dificuldades encontradas para adequação do projeto

Instalação do container

    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php82-composer:latest \
        composer install --ignore-platform-reqs

Copia do arquivo .env.example > .env

Ajuste da sql:

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=example_app
    DB_USERNAME=root
    DB_PASSWORD=

Comando:

    sail up

Rodei o comando para recriar a base local em um terminal

    sail artisan migrate:fresh


### Arquivos Alterados

##### routes>web.php   (acrescentado)

    Route::get('/cadastrar', [UserController::class, 'create']);
    Route::post('/cadastrar', [UserController::class, 'store']);

##### app>Http>Controllers>UserControler.php (acrescentado)

    public function create()
    {
        return view('createUser');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->senha;
        $user->save();

        //ou refatorado
        


        return view('profile', [ 'user' => $user] );
    }

##### resources>views>createuser.blade.php   (novo)

    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Criar novo usuario</title>
        </head>
        <body class="antialiased">
            <h1>Criar novo Usuario</h1>
            <form action="/cadastrar" method="post">
                <label> Nome: </label>
                <input type="text" name="name" id="name" placeholder="Nome Usuario">
                <label> E-mail: </label>
                <input type="text" name="email" id="email" placeholder="E-mail">
                <label> Senha: </label>
                <input type="password" name="senha" id="senha" placeholder="Senha">
                <br><br>
                <button type="submit">Cadastrar</button>
            </form>
        </body>
    </html>


### Comando utens durante o processo:

sail artisan tinker
> User::all()
> User::create(['name' => 'Givanildo Teixeira', 'email' => 'giva@teste.com','password' => '123']);

