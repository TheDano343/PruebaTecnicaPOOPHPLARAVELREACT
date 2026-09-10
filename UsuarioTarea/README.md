Para Instalar dependencias se debe ejecutar : composer install

Utilizar el comando : php artisan migrate, para realizar las migraciones de laravel

para visualizar los seeders de Usuario, colocar el siguiente comando : php artisan db:seed --class=UsuarioSeeder
para visualizar los seeders de Task, colocar el siguiente comando : php artisan db:seed --class=TaskSeeder

Utilize la arquitectura MVC, adaptado para las api´s para la correcta genenación de endpoints, el cual contara con su propia y exclusive sección de rutas para las api´s, y con los controlladores a los querys desde esa misma sección envia el json tanto para el desarrollo y consumo de api´s y utilizo los middleware para la protección de creación y actualización de registros en el area de api´s. 
