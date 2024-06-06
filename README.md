## Instalacion
Asegúrese de haber configurado el entorno correctamente. Necesitarás mínimo PHP 8.1, MySQL/MariaDB, y composer.

1. Descargar el proyecto o clonar desde git
2. Modificar el archivo .env para el nombre de la base de datos en caso de no
querer utilizar el nombre por defecto (laravel). Para cambiarlo debe ingresar a
.env y cambiar DB_DATABASE=laravel por el nombre que quiera.
3. Vaya al directorio raíz del proyecto (laravelcrud) usando la ventana de la terminal o símbolo del sistema (cmd)
4. Ejecute `composer install` y `npm install` y `npm run build`
5. Configure la clave de la aplicación ejecutando `php artisan key:generate --ansi`
6. Run migrations `php artisan migrate` y `php artisan db:seed`
7. Inicie el servidor local ejecutando `php artisan serve`
8. Visite aquí [http://127.0.0.1:8000] para probar la aplicación
9. El sistema trae una cuenta admin `email: admin@example.com contraseña: admin` y lo mismo para un usuario `email: user@example.com contraseña: user`
