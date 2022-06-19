<p align="center"><a href="http://mi-tiendaa.herokuapp.com/mi-tienda" target="_blank"><img src="https://user-images.githubusercontent.com/25357351/174502049-5bedd8ea-fbfe-41ad-85cc-cf03fb16288d.png" width="400"></a></p>

## Acerca de Mi-Tienda

Mi-Tienda es una aplicación web desarrollada por alumnos de la carrera de Ingeneria en Informatica de la Universidad Catolica de Santiago del Estero para la materia de Auditoria en Informatica utilizando el framework Laravel

### Requerimientos

- **[Laravel](https://laravel.com/)**
- **[NodeJs](https://nodejs.org/es/)**
- **[Composer](https://getcomposer.org/)**
- **[Php](https://www.php.net/)**
- **[Mysql](https://www.mysql.com/)**
>Opcional para Php y Mysql
- **[XAMPP](https://www.apachefriends.org/es/index.html)**

## Instalación

Para poder correr el repositorio localmente:
1. Clonar el repositorio
    ```sh
    git clone https://github.com/El-Posho-Web/Mi-Tienda.git
    ```

1. Ir a la raiz del directorio
    ```sh
    cd Mi-Tienda
    ```

1. Copiar el archivo .env.example a .env
    ```sh
    cp .env.example .env
    ```
1. Crear la base de datos `mi-tienda` (puedes cambiar el nombre de la base de datos)

1. Go to `.env` file 
    - Setear las credenciales de la base de datos (`DB_DATABASE=mi-tienda`, `DB_USERNAME=root`, `DB_PASSWORD=`)

1. Instalar las dependencias de PHP 
    ```sh
    composer install
    ```

1. Generar la key 
    ```sh
    php artisan key:generate
    ```

1. Instalar las dependencias de Front-End
    ```sh
    npm install && npm run dev
    ```

1. Correr las migraciones
    ```
    php artisan migrate
    ```
    
1. Correr el seeder
    ```
    php artisan db:seed
    ```
    Este comando creara un usuario admin y varios usuarios clientes, asi como tambien productos con la herramienta Faker
     > admin: admin@ejemplo.com , password: 1234

1. Iniciar server
   
    ```sh
    php artisan serve
    ```  

1. Ir a `localhost:8000` en el navegador.     
