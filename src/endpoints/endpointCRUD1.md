# Documentação da API de Usuários

Esta documentação descreve os endpoints da API para gerenciamento de **Usuários**, permitindo realizar operações de **listar**, **consultar por ID**, **deletar**, **criar** e **atualizar** usuários.

---

## Endpoints

### 1. Listar todos os usuários
- **Rota**: `/USUARIO`
- **Método HTTP**: `GET`
- **Descrição**: Retorna uma lista com todos os usuários cadastrados no sistema.
- **Resposta Exemplo**:

    ```json
    [
        {
            "id": 1,
            "usuario": "joaoPedroUsuario",
            "senha": "3214124AS"
        },
        {
            "id": 2,
            "usuario": "LucasLima332",
            "senha": "LL3231ss"
        }
    ]
    ```

### 2. Obter um usuário por ID
- **Rota**: `/USUARIO/{id}`
- **Método HTTP**: `GET`
- **Descrição**: Retorna os detalhes de um usuário específico com base no ID informado.
- **Parâmetros**:
    - `id` (int, obrigatório): ID do usuário que se deseja buscar.
- **Resposta Exemplo**:

    ```json
    {
        "id": 1,
        "usuario": "usuarioPontoMD",
        "senha": "senhateste231"
    }
    ```

### 3. Deletar um usuário
- **Rota**: `/USUARIO/{id}`
- **Método HTTP**: `REMOVE`
- **Descrição**: Deleta um usuário específico com base no ID informado.
- **Parâmetros**:
    - `id` (int, obrigatório): ID do usuário que se deseja deletar.
- **Resposta Exemplo**:

    ```json
    {
        "message": "Usuário deletado com sucesso."
    }
    ```

### 4. Criar um novo usuário
- **Rota**: `/USUARIO`
- **Método HTTP**: `POST`
- **Descrição**: Cria um novo usuário no sistema.
- **Corpo da Requisição** (JSON):

    ```json
    {
        "usuario": "User23123",
        "senha": "5523AASenha"
    }
    ```

- **Resposta Exemplo**:

    ```json
    {
        "id": 3,
        "usuario": "novoUsuario",
        "senha": "senha123"
    }
    ```

### 5. Atualizar um usuário existente
- **Rota**: `/USUARIO`
- **Método HTTP**: `PUT`
- **Descrição**: Atualiza as informações de um usuário existente no sistema.
- **Corpo da Requisição** (JSON):

    ```json
    {
        "id": 1,
        "usuario": "usuarioTeste",
        "senha": "joao3123"
    }
    ```

- **Resposta Exemplo**:

    ```json
    {
        "id": 1,
        "usuario": "userExemplo",
        "senha": "341233"
    }
    ```

---

## Observações

- **Validação**: Ao criar ou atualizar um usuário, é necessário validar os campos obrigatórios, como `usuario` e `senha`.
- **Resposta de Erro**: Em caso de erro, a API irá retornar uma mensagem de erro no formato JSON, com o código de status HTTP adequado. Exemplo de resposta de erro:

    ```json
    {
        "error": "Usuário não encontrado."
    }
    ```

- **Formato de Dados**: Todos os dados devem ser enviados e recebidos no formato JSON, conforme exemplificado.

- **Autenticação**: A API pode requerer autenticação para acessar os endpoints, dependendo da implementação de segurança no backend (por exemplo, tokens JWT ou sessões).

- **Códigos de Status HTTP**:
    - `200 OK`: Requisição bem-sucedida.
    - `201 Created`: Usuário criado com sucesso.
    - `400 Bad Request`: Requisição malformada ou dados inválidos.
    - `404 Not Found`: Usuário não encontrado para o ID fornecido.
    - `500 Internal Server Error`: Erro no servidor ao processar a requisição.

---
