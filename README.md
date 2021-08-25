# 24i.test #

This is the a test exam for Back-end Development Assignment using REST API (Lumen (8.2.4) (Laravel Components ^8.0)) with JWT Authentication

## Installation: ##

### Step 1.

> To run this project, you must have PHP >= 7.3 installed, OpenSSL PHP Extension, PDO PHP Extension, Mbstring PHP Extension as a prerequisite

Cloning this repository and install all Composer dependencies.

```bash
$ cd /var/www/
$ git clone git@github.com:achilezweb/24i.test.git
$ cd 24i.test && composer install
$ cp .env.example .env
$ php artisan key:generate
```

### Step 2.

Next, create a new database and reference its name and username/password within the project's `.env` file. In the example below, we've named the database "24i"

```
APP_URL=https://24i.test

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=24i
DB_USERNAME=root
DB_PASSWORD=root
```

### Step 3.

Lets run/import the database by running

```
$ php artisan migrate
```

### Step 4.

Generate JWT secret key:


```
$ php artisan jwt:secret
```

### Step 5. 

Import the Postman collection JSON file `postman_collection.json`. 
```
BASE_URL: https://24i.test
```

## Assignment: ##

### Created a REST API with endpoints to Create, Read, Update and Delete an asset

### API Endpoint: 

#### VIEW ASSET REQUEST 

##### GET `/api/assets` Param: `Bearer Token`

##### Response
```
{
    "current_page": 1,
    "data": [
        {
            "uuid": "d47f6718-7b2a-417d-a64b-92de306fb73d",
            "asset_name": "Facilis facere blanditiis veritatis et ea dolorum nemo.",
            "created_at": "2021-08-25T09:46:47.000000Z",
            "updated_at": "2021-08-25T09:46:47.000000Z"
        },
        {
            "uuid": "e3f3ffd7-71cf-4c39-b09f-e887307b3515",
            "asset_name": "Corporis voluptas perspiciatis aut qui fugiat voluptas cupiditate.",
            "created_at": "2021-08-25T09:46:47.000000Z",
            "updated_at": "2021-08-25T09:46:47.000000Z"
        },
        {
            "uuid": "58859799-37b6-41a9-8071-4d1f3ed201db",
            "asset_name": "Provident et ab aut deleniti quia.",
            "created_at": "2021-08-25T09:46:47.000000Z",
            "updated_at": "2021-08-25T09:46:47.000000Z"
        },
        {
            "uuid": "277e4738-4624-437f-9b55-644a0b2d1042",
            "asset_name": "Non molestiae possimus commodi.",
            "created_at": "2021-08-25T09:46:47.000000Z",
            "updated_at": "2021-08-25T09:46:47.000000Z"
        },
        {
            "uuid": "ba1bef12-68c8-424b-9e0f-a9f9634531e5",
            "asset_name": "Et ad iusto ducimus dolorem numquam architecto.",
            "created_at": "2021-08-25T09:46:47.000000Z",
            "updated_at": "2021-08-25T09:46:47.000000Z"
        },
        {
            "uuid": "3a12a4db-5a5c-4189-b97c-6221d54e2e6c",
            "asset_name": "Omnis ut tempora earum ut autem ea.",
            "created_at": "2021-08-25T09:46:47.000000Z",
            "updated_at": "2021-08-25T09:46:47.000000Z"
        },
        {
            "uuid": "1cf42d42-0a9b-4d2e-a1c0-201b37495383",
            "asset_name": "Pariatur itaque ut repellat ea autem eveniet.",
            "created_at": "2021-08-25T09:46:48.000000Z",
            "updated_at": "2021-08-25T09:46:48.000000Z"
        },
        {
            "uuid": "4a2f9a16-e163-4fa5-8423-1ce453514399",
            "asset_name": "Deserunt ea dignissimos non voluptatibus qui.",
            "created_at": "2021-08-25T09:46:48.000000Z",
            "updated_at": "2021-08-25T09:46:48.000000Z"
        },
        {
            "uuid": "623d3e8f-3f1c-4e11-a305-21cadfd02d26",
            "asset_name": "Non et natus asperiores similique.",
            "created_at": "2021-08-25T09:46:48.000000Z",
            "updated_at": "2021-08-25T09:46:48.000000Z"
        },
        {
            "uuid": "9fcb3da0-6e60-48b2-ad76-7f4085f201bc",
            "asset_name": "Quia voluptas porro esse voluptatem architecto enim cum.",
            "created_at": "2021-08-25T09:46:48.000000Z",
            "updated_at": "2021-08-25T09:46:48.000000Z"
        }
    ],
    "first_page_url": "https://24i.test//api/assets?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "https://24i.test//api/assets?page=1",
    "links": [
        {
            "url": null,
            "label": "pagination.previous",
            "active": false
        },
        {
            "url": "https://24i.test//api/assets?page=1",
            "label": "1",
            "active": true
        },
        {
            "url": null,
            "label": "pagination.next",
            "active": false
        }
    ],
    "next_page_url": null,
    "path": "https://24i.test//api/assets",
    "per_page": 10,
    "prev_page_url": null,
    "to": 10,
    "total": 10
}
```

#### CREATE ASSET REQUEST 

##### POST `/api/assets` Param: `Bearer Token`, `asset_name`

##### Response
```
{
    "status": "success",
    "message": "Asset created successfully"
}
```

#### UPDATE ASSET REQUEST 

##### PUT `/api/assets/{uuid}` Param: `Bearer Token`, `asset_name`

##### Response
```
{
    "status": "success",
    "message": "Asset Updated successfully"
}
```

#### READ ASSET REQUEST 

##### GET `/api/assets/{uuid}` Param: `Bearer Token`

##### Response
```
{
    "uuid": "c814b7b0-213c-4cd7-a45d-f17cd0fcb81f",
    "asset_name": "updated asset name",
    "created_at": "2021-08-25T09:54:48.000000Z",
    "updated_at": "2021-08-25T09:58:54.000000Z"
}
```

#### DELETE ASSET REQUEST 

##### DELETE `/api/assets/{uuid}` Param: `Bearer Token`

##### Response
```
{
    "status": "success",
    "message": "Asset deleted successfully"
}
```

#### LOGIN REQUEST 

##### POST `/api/login` Param: `email`, `password`

##### Response
```
{
    "access_token": "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
    "token_type": "bearer",
    "expires_in": 3600
}
```

#### REGISTER REQUEST 

##### POST `/api/register` Param: `name`, `email`, `password`

##### Response
```
{
    "access_token": "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
    "token_type": "bearer",
    "expires_in": 3600
}
```

#### LOGOUT REQUEST 

##### POST `/api/logout` Param: `token`

##### Response
```
{
    "message": "Successfully logged out"
}
```

### You can populate dummy collection/table in bulk using factory via `tinker` where xx are the number of collections

##### $ `php artisan tinker`

```
>>> App\Models\Asset::factory()->count(10)->create()
```

### This REST API runs in docker-container, using MySQL as a database. Configure `.env` and `docker-compose.yml` file 

After the configuration, lets build the following with --no-cache:
```
$ docker-compose build --no-cache  mysql php-fpm workspace nginx phpmyadmin redis
```

### Run the containers
```
$ docker-compose up -d nginx mysql phpmyadmin redis workspace
```

### Thanks!
