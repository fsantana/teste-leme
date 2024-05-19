## Para iniciar o projeto

Subir ambiente através do Docker
```
# Subir container
docker-compose up -d
# Instalar Dependências
docker-compose exec -u 1000 app composer install
# Executar Migration
docker-compose exec -u 1000 app ./yii migrate  

```

Acessar projeto usando:
http://localhost


Parar o container, remover containner e volumes
```
# Parar containner
docker-compose stop
# Remover todos os recursos referente ao projeto (inclusive banco de dados)
docer-compose down -v
```

## Pontos de Melhoria

* No enunciado da a enteder que a imagem deve ser enviado para o banco, o que não é uma boa prática , mas o DER mostra um campo de varchar para armazernar a informação, então fiz o upload local

* O upload de imagem eu trabalharia com um serviço utilizando um bucket em cloud, para não ter arquivos persistidos junto com arquivos do projeto.

Itens que não implementei mas que precisaria implementar:

* Melhorar a apresentação de todos os itens
* Formatação de campo de data e valor para pt-br
* Não permitir excluir Cliente se ele tem pedido
* Ao excluir pedido, excluir as suas imagens
* Cadastro de usuário para controle de acesso
* Implementação de testes

