<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 - Asis Consultores</h1>
    <br>
</p>


DOCKER INSTALL INSTRUCTIONS
-------------------
```

docker-compose up -d

```


### Frontend:   [Frontend] (http://localhost:8090/)\

### Backend:    [Backend] (http://localhost:8091/)\

### PHPMyAdmin: [PHPMyAdmin] (http://localhost:8092/)\

### MySQL:          admin/secret\

### Admin User:     admin/admin\


INSTALL INSTRUCTIONS
-------------------
```

composer install

php init

Open the `common\config\main-local.php` file and configure you database connection access.


Run migration:

php yii migrate

php yii rbac/init


```
