# rh-admin
## Administrador de Personal de Recursos Humanos

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Instalación

Una vez clonado el respositorio, debes acceder desde la terminal de git o cmd a la carpeta que se descargó y realizar los siguientes pasos:

- Instalar [composer](https://getcomposer.org/).
- Crear la base de datos en MySQL _(el nombre que se le colocará aquí, debe colocarse en el .env)_.
- Copiar el archivo **.env.example** y nombrarlo **.env**.
    - Agregar los datos de la base de datos. Si es MySQL:
        - Indicar el host de la base de datos _(local o web)_.
        - Indicar el puerto de la base de datos _(normalmente es 3306 para MySQL)_.
        - Indicar el nombre de la base de datos.
        - Indicar el nombre de usuario de la base de datos.
        - Indicar la contraseña de la base de datos.
        - Cerrar el archivo **.env**.
- Generar una nueva llave de seguridad con el comando **php artisan key:generate**.
- Correr las migraciones _(php artisan migrate)_. Si tenemos datos con seeder, correr el comando _(php artisan migrate --seed)_.

Si hicimos los pasos anteriores, nuestro proyecto debería funcionar correctamente. Podemos probarlo con el servidor virtual de laravel con el comando **_php artisan serve_**.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
