# 🚀 Sistema CRUD en PHP y MySQL

Sistema web desarrollado para la gestión de productos, implementando operaciones completas de creación, lectura, actualización y eliminación (**CRUD**), ideal para demostrar bases sólidas en desarrollo backend y bases de datos relacionales.

## 🛠️ Tecnologías y Herramientas
* **Backend:** PHP (Programación orientada a lógica de servidor, uso de sentencias preparadas con PDO/MySQLi para prevenir inyecciones SQL).
* **Base de Datos:** MySQL.
* **Control de Versiones:** Git & GitHub.
* **Entorno Local:** XAMPP / Laragon.
* **Estilos:** HTML5 y CSS3 (Diseño limpio y adaptable).

## 📋 Funcionalidades Principales
* **Crear:** Registro de nuevos productos con nombre, descripción, precio y stock.
* **Leer:** Listado en tiempo real de todos los productos almacenados en la base de datos.
* **Actualizar:** Modificación de los datos de productos existentes.
* **Eliminar:** Borrado seguro de registros del sistema.

## ⚙️ Cómo ejecutar el proyecto localmente

Sigue estos pasos para probar el proyecto en tu computadora:

1. **Clona el repositorio** o descarga los archivos en tu equipo.
2. Coloca la carpeta del proyecto dentro del directorio raíz de tu servidor local (por ejemplo, `C:\xampp\htdocs\crud-php`).
3. Inicia los servicios de **Apache** y **MySQL** desde tu panel de XAMPP o Laragon.
4. Crea una base de datos en tu gestor de preferencia (phpMyAdmin) e importa la estructura de tablas necesaria.
5. Configura tus credenciales de conexión en el archivo `conexion.php` si es necesario.
6. Abre tu navegador web y entra a:
   ```text
   http://localhost/crud-php/