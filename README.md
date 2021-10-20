# Descrição

API Laravel usando Docker Container para CRUD de usuario.

----------

# Configuração

<ol>
    <li>Instale o Docker pelo site https://www.docker.com/</li>
    <li>Faça o clone do repositório e entre na pasta criada.</li>
    <li>Duplique o arquivo <code>.env.example</code> para o arquivo <code>.env</code> e coloque as configurações do banco de dados.</li>
    <li>Para instalar as dependências necessárias execute, dentro da pasta do projeto, o comando:<br> <code>docker run --rm -v $(pwd):/app composer install</code>      </li>
    <li>Inicie os containers com o seguinte comando: <code>docker-compose up -d --force-recreate --build</code></li>
    <li>Gere uma chave para garantir sessão dos dados e do usuário com o seguinte comando:<br><code>docker-compose exec app php artisan key:generate</code></li>
    <li>Coloque as configurações no arquivo de cache com o seguinte comando:<br><code>docker-compose exec app php artisan config:cache</code></li>
    <li>Para criar a tabela de usuários execute o seguinte comando: <code>docker-compose exec app php artisan migrate</code></li>
    <li>Tudo pronto! Enjoy!!</li>    
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

<b>Obs: todas as rotas possuem o prefixo "/api".</b><br>
<b>Obs: {id} representa o id do usuário.</b><br>
<b>Obs: {numero} representa o ultimo número da placa do usuário.</b>

Envie os seguintes parâmetros no cabeçalho de todas as requisiçes:<br>
    - Content-Type: application/json<br>
    - Accept: application/json

----------

# Corpo da Requisição
Para criar ou editar um usuário você precisará enviar, no corpo da requisição, um JSON como o exemplo a seguir:

{<br>
    &nbsp;&nbsp;&nbsp;&nbsp;"nome": "Lucas Vieira",<br>
    &nbsp;&nbsp;&nbsp;&nbsp;"telefone": 87991741459,<br>
    &nbsp;&nbsp;&nbsp;&nbsp;"cpf": 5441040549,<br>
    &nbsp;&nbsp;&nbsp;&nbsp;"placa_carro": "NYN3B79"<br>
}<br>

Esse JSON deverá conter os seguintes dados:

<table>
    <thead>
        <th>Key</th>
        <th>Descrição</th>
        <th>Formato</th>
        <th>Obrigatório</th>
    </thead>
    <tbody>
        <tr>
            <td>nome</td>
            <td>Nome do usuário</td>
            <td>String</td>
            <td>Sim</td>
        </tr>
        <tr>
            <td>telefone</td>
            <td>Telefone do usuário</td>
            <td>Integer</td>
            <td>Sim</td>
        </tr>
        <tr>
            <td>cpf</td>
            <td>Cpf do usuário</td>
            <td>Integer</td>
            <td>Sim</td>
        </tr>
        <tr>
            <td>placa_carro</td>
            <td>Placa do carro</td>
            <td>String</td>
            <td>Sim</td>
        </tr>
    </tbody>
</table>

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

<b>Token JWT: <code>eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoiTHVjYXMgVmllaXJhIiwiaWQiOjk5OTk5OTk5fQ.7SbefdpndI6DgJz-vun2vw5nSUCYhpdyoTA7xgHdunE</code></b>
