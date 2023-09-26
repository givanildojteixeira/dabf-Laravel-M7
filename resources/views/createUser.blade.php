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
            @csrf
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
