## API Users & Movies

Pasos para iniciar el proyecto.-

- Clonar el proyecto.

- Copiar el archivo .env.example y renombrarlo a .env.

- Crear la database y actualizar la conexión en el archivo creado en el paso anterior (.env).

- Instalar las dependencias definidas en el composer.json, en la raíz del proyecto ejecutar el siguiente comando:

    composer install

- Para la creación de tablas y registro de data de prueba, ejecutar el siguiente comando:

    php artisan migrate:fresh --seed

- Iniciar el proyecto:

    php artisan serve


## Endpoints

Documentación:  [DSB Mobile](https://documenter.getpostman.com/view/8708202/TVRd9BZF#e26840f2-e8f0-4ba8-8a40-71b103bba856).

 - api/user/login           
 - api/user/register        
 - api/movie/list           
 - api/movie/register       
 - api/movie/update/{movie} 
 - api/movie/delete/{movie} 