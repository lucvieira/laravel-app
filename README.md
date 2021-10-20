# Descrição

API Laravel usando Docker Container para CRUD de usuario.

----------

# Configuração

<ol>
    <li>Instale o Docker pelo site https://www.docker.com/</li>
    <li>Duplique o arquivo <code>.env.example</code> para o arquivo <code>.env</code> e coloque as configurações do banco de dados.</li>
    <li>Para instalar as dependências necessárias execute, dentro da pasta do projeto, o comando:<br> <code>docker run --rm -v $(pwd):/app composer install</code>      </li>
    <li>Inicie os containers com o seguinte comando: <code>docker-compose up -d
    </code></li>
    <li>Para criar a tabela de usuários execute o seguinte comando: <code>docker-compose exec app php artisan migrate</code></li>
    
</ol>

----------

## Rotas

<table>
    <thead>
        <th>Verbo HTTP</th>
        <th>Rota</th>
        <th>Descrição</th>
    </thead>
    <tbody>
        <tr>
            <td>POST</td>
            <td>/cliente</td>
            <td>Cadastro de novo cliente.</td>
        </tr>
        <tr>
            <td>PUT</td>
            <td>/cliente/{id}</td>
            <td>Edição de um cliente já existente.</td>
        </tr>
        <tr>
            <td>DELETE</td>
            <td>/cliente/{id}</td>
            <td>Remoção de um cliente existente.</td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/cliente/{id}</td>
            <td>Consulta de dados de um cliente.</td>
        </tr>
        <tr>
            <td>GET</td>
            <td>/consulta/final-placa/{numero}</td>
            <td>Consulta de todos os clientes cadastrados na base, onde o último número da placa do carro é igual ao informado.</td>
        </tr>
    </tbody>
</table>

<b>Obs: todas as rotas possuem o prefixo "/api".</b>

Envie os seguintes parâmetros no cabeçalho de todas as requisiçes:<br>
    - Content-Type: application/json<br>
    - Accept: application/json

----------
 
# Autenticação
 
Use o token JWT para consumir as seguintes rotas privadas:
    <table>
    <thead>
        <th>Verbo HTTP</th>
        <th>Rota</th>
    </thead>
    <tbody>
        <tr>
            <td>POST</td>
            <td>/cliente</td>
        </tr>
        <tr>
            <td>PUT</td>
            <td>/cliente/{id}</td>
        </tr>
        <tr>
            <td>DELETE</td>
            <td>/cliente/{id}</td>
        </tr>
    </tbody>
</table>

<b>Token JWT: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoiTHVjYXMgVmllaXJhIiwiaWQiOjk5OTk5OTk5fQ.7SbefdpndI6DgJz-vun2vw5nSUCYhpdyoTA7xgHdunE</b>
