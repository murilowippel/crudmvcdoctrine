# PHP + MySQL + Doctrine

CRUD para teste utilizando PHP + MySQL + Doctrine.

Testado com:
  - PHP: 8.2.0
  - Composer: 2.3.5
  - MySQL


## Deploy

Para rodar o projeto, criar banco de dados com o nome:

```bash
  contactsys
```

Em seguida, executar o comando na raiz do projeto:

```bash
  composer install
```

Após instalar as dependências, executar o comando:

```bash
  php vendor/bin/doctrine orm:schema-tool:create
```
