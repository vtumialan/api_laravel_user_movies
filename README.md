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

----------+--------------------------
 Method   | URI                      
----------+--------------------------
 POST     | api/user/login           
 POST     | api/user/register        
 GET      | api/movie/list           
 POST     | api/movie/register       
 PUT      | api/movie/update/{movie} 
 DELETE   | api/movie/delete/{movie} 