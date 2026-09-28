# Gestor ADSO — Plan de Mejoramiento Académico

Aplicación web desarrollada en Laravel para la gestión de aprendices y administración de usuarios con control de acceso basado en roles (RBAC).

## Prerrequisitos del Sistema

Antes de clonar e instalar la aplicación, asegúrate de contar con los siguientes elementos instalados en tu entorno local:

* **PHP:** Versión 8.2 o superior (`php -v`)
* **Composer:** Gestor de dependencias de PHP (`composer -v`)
* **Node.js & NPM:** Para compilar los assets de Tailwind CSS y Breeze (`node -v`, `npm -v`)
* **Servidor de Base de Datos:** MariaDB / MySQL (mediante XAMPP, Laragon o servicio local)
* **Git:** Control de versiones (`git --version`)

---

## Guía de Instalación desde Cero

1. **Clonar el repositorio y entrar a la carpeta del proyecto:**
   ```bash
2.   git clone https://github.com/MiguelAngel-RG/gestor-adso
3.   cd gestor-adso

## Ejecución
1. Instalar dependencias de PHP y JavaScript:
composer install
npm install

2. Configurar las variables de entorno:

cp .env.example .env
php artisan key:generate

3. Configurar la base de datos en el archivo .env:
Asegúrate de tener creada la base de datos gestor_adso en MySQL y ajusta las credenciales:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestor_adso
DB_USERNAME=root
DB_PASSWORD=

4. Ejecutar migraciones y Seeders (Poblado de datos de prueba):

php artisan migrate:fresh --seed

5. Compilar assets y levantar el servidor local:


npm run build
php artisan serve
   
6. Ejecutar 
php artisan serve 
y autenticarse con los usuarios de prueba.

   ## Usuarios de prueba (roles)

   Administrador (Acceso total: CRUD de aprendices y panel /users)
   admin@adso.com - Contraseña:	password123

   Instructor (CRUD de aprendices (bloqueado en /users))
   instructor@adso.com - Contraseña:	password123

   Aprendiz (Solo lectura del listado de aprendices)
   aprendiz@adso.com - Contraseña:	password123