# API Documentation

Esta documentação descreve os endpoints disponíveis para o recurso **REPORTE**.

## Endpoints

### 1. Listar todos os relatórios
- **Rota**: `/REPORTE`
- **Método HTTP**: `GET`
- **Descrição**: Retorna uma lista de todos os relatórios disponíveis.
- **Resposta Exemplo**:
    ```json
    [
        {
            "id": 1,
            "nome": "Relatório 1",
            "descricao": "Descrição do Relatório 1"
        },
        {
            "id": 2,
            "nome": "Relatório 2",
            "descricao": "Descrição do Relatório 2"
        }
    ]
    ```

### 2. Obter um relatório por ID
- **Rota**: `/REPORTE/{id}`
- **Método HTTP**: `GET`
- **Descrição**: Retorna os detalhes de um relatório específico com base no ID.
- **Parâmetros**:
    - `id` (int, obrigatório): ID do relatório que se deseja buscar.
- **Resposta Exemplo**:
    ```json
    {
        "id": 1,
        "nome": "Relatório 1",
        "descricao": "Descrição do Relatório 1"
    }
    ```

### 3. Deletar um relatório
- **Rota**: `/REPORTE/{id}`
- **Método HTTP**: `REMOVE`
- **Descrição**: Remove um relatório específico com base no ID.
- **Parâmetros**:
    - `id` (int, obrigatório): ID do relatório que se deseja deletar.
- **Resposta Exemplo**:
    ```json
    {
        "message": "Relatório deletado com sucesso."
    }
    ```

### 4. Criar um novo relatório
- **Rota**: `/REPORTE`
- **Método HTTP**: `POST`
- **Descrição**: Cria um novo relatório.
- **Corpo da Requisição** (JSON):
    ```json
    {
        "nome": "Novo Relatório",
        "descricao": "Descrição do novo relatório"
    }
    ```
- **Resposta Exemplo**:
    ```json
    {
        "id": 3,
        "nome": "Novo Relatório",
        "descricao": "Descrição do novo relatório"
    }
    ```

### 5. Atualizar um relatório
- **Rota**: `/REPORTE`
- **Método HTTP**: `PUT`
- **Descrição**: Atualiza um relatório existente.
- **Corpo da Requisição** (JSON):
    ```json
    {
        "id": 1,
        "nome": "Relatório Atualizado",
        "descricao": "Descrição atualizada do relatório"
    }
    ```

- **Resposta Exemplo**:
    ```json
    {
        "id": 1,
        "nome": "Relatório Atualizado",
        "descricao": "Descrição atualizada do relatório"
    }
    ```

---

- **Códigos de Status HTTP**:
    - `200 OK`: Requisição bem-sucedida.
    - `201 Created`: Usuário criado com sucesso.
    - `400 Bad Request`: Requisição malformada ou dados inválidos.
    - `404 Not Found`: Usuário não encontrado para o ID fornecido.
    - `500 Internal Server Error`: Erro no servidor ao processar a requisição.