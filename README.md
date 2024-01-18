# APUSPOKE
 - Desenvolvido com Laravel 10.
 - Mysql 5.7
 
Se trata de um projeto de validação, favorite seu Pokemon.

## Pré-Requisitos

Antes de iniciar, certifique-se de ter instalado em sua máquina:

- Docker
- Docker Compose

## Configuração Inicial

1. **Clonar o Repositório**

   ```bash
   git clone https://github.com/LucaswDeveloper/ApusPoke
   cd ApusPoke
   ```
2. **Configurar Variáveis de Ambiente**
    ```bash
    cp .env.example
   ```
3. **Construir e Iniciar os Containers Docker**
    ```bash
    docker-compose up -d
   ```

## Configuração do Laravel no Container

1. **Clonar o Repositório**
   - Instalar Dependências do Composer 
   - Com os containers em execução, instale as dependências do projeto:

```bash
docker exec -it apuspoke-app composer install
```

2. **Gerar Chave do Aplicativo**
- Gere a chave do aplicativo Laravel:

```bash
docker exec -it apuspoke-app php artisan key:generate
```

3. **Executar Migrations**
- Crie as tabelas no banco de dados:

```bash
docker exec -it apuspoke-app php artisan migrate
```

## Configuração do Laravel no Container
O projeto estará acessível via http://localhost
**Links uteis**
- http://localhost/register
- http://localhost/login
- http://localhost/search
- http://localhost/favoritos


## Demonstração
![Logo](https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExeHRpeHo2NzNxa2U0Y2Rxbm9pMTQ4MHN2YjNpdTYxd2E0MDh4aDJmaiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/ac5l3rtuXqtGtOCyBO/giphy.gif)

![Logo](https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExd2lkZXc0dWpoazBmcGNhYnBqZDQ5a3R0Zm1jNWp2amFkZDRkamRpOCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/tm5LRALfIpYs4RhGNW/giphy.gif)

![Logo](https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExeHNxcWhudjY1Y2dka3E4NXRndWtiem5xYm1nNWRlcXJ4ZTA3aG13bCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/YPVHR86t61IPbixgiY/giphy.gif)
