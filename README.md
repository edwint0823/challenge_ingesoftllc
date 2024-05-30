<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Challenge INGESOFTLLC

Proyecto sobre prueba de codificación para el cargo Desarrollador Backend Laravel por Edwin Tobias Ariza Tellez

## Prerrequisitos

Para un correcto funcionamiento debe contar con las siguientes tecnologías instaladas en su equipo

| Herramienta   | Versión            | link de descarga o comando                                  |
|:--------------|:-------------------|:------------------------------------------------------------|
| PHP           | **php 8.1^**       | [Via Xammp](https://www.apachefriends.org/es/download.html) |
| Composer      | **Composer 2.7^**  | [Composer](https://getcomposer.org/download/)               |
| Base de datos | **PostgreSQL 15+** | [PostgreSQL](https://www.postgresql.org/download/windows/)  |
| Node.js       | **Node 18+**       | [Node.js](https://nodejs.org/en/download/current)           |
| npm           | **Npm 8.6+**       |                                                             |

**NOTA:**

Además de las anteriores herramientas debe tener habilitadas las extensiones ```pdo_pgsql``` y ```pgsql``` dentro de *
*php.ini**

## Variables de entorno

Para el correcto funcionamiento de la aplicación debe agregar las variables de entorno en el archivo **.env**

| Variable        | Descripción                                      | Valor sugerido        |
|:----------------|:-------------------------------------------------|:----------------------|
| `DB_CONNECTION` | Nombre del driver de conexión a la base de datos | pgsql                 |
| `DB_HOST`       | Host de la base de datos                         | localhost             |
| `DB_PORT`       | Puerto de conexión hacia la base de datos        | 5432                  |
| `DB_DATABASE`   | Nombre de la base de datos                       | challenge_ingesoftllc |
| `DB_USERNAME`   | Nombre de usuario de la base de datos            | postgres              |
| `PG_PASSWORD`   | Contraseña del usuario de la base de datos       |                       |

Además de las anteriores variables de entorno Laravel provee diferentes variables propias del framework se recomienda
usar los valores encontrados en el archivo **.env.example**

**NOTA:**

Estas variables también las puede encontrar en el archivo **.env.example**

## Instalación y puesta en marcha

Para el correcto funcionamiento del proyecto debe seguir lo siguientes pasos

Instalar dependencias de npm

```bash
npm install
```

Instalar dependencias de composer

```bash
composer install
```

Correr las migraciones

```bash
php artisan migrate
```

Correr los seeders

```bash
php artisan db:seed
```

Iniciar servidor

para iniciar la aplicación debe correr en simultaneo los siguientes comandos

```bash
npm run dev
```

```bash
php artisan serve
```

Despues de ello ingresar a la url que provee el comando ```php artisan serve```

## Credenciales de usuarios dummy

Las credenciales de los usuarios son los siguientes

| correo            | contraseña | rol    |
|:------------------|:-----------|:-------|
| admin@admin.com   | Y%F3dTyL   | admin  |
| worker@worker.com | B76q@DPC   | worker |

## Autores

- [@edwint0823](https://github.com/edwint0823)

