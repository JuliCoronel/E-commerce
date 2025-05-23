# 🛒 E-commerce en PHP

Este es un proyecto de aplicación web de tienda online desarrollado con **PHP**, **MySQL**, **CSS** y programación orientada a objetos (**POO**).

**Deploy:** https://e-commercephp.infinityfreeapp.com/

*Rol administrador:*

Email: admin@admin.com

Contraseña: Admin

## ✨ Funcionalidades

Los usuarios pueden:

- Registrarse e iniciar sesión.
- Navegar productos por categoría.
- Ver detalles individuales de cada producto.
- Agregar productos al carrito.
- Aumentar o reducir la cantidad.
- Eliminar productos del carrito.
- Ver el total de la compra y el subtotal por producto.

Los administradores (rol admin) pueden:

- Agregar, editar o eliminar productos.
- Crear y administrar categorías.
- Gestionar el contenido del sitio.

---

## ⚙️ Configuración del entorno

### 🗃️ 1. Base de datos

Para importar la base de datos utilizada vaya a la carpeta `database/`, donde encontrará lo necesario para cada tabla.

Para incluirla en MySQL puede usar **phpMyAdmin** importando el archivo database.sql o puede hacerlo consulta por consulta desde la consola de MySQL.

### 🔐 2. Variables de entorno

El archivo `.htaccess` contiene configuraciones sensibles, por lo que **no está incluido directamente en el repositorio**.

Para ello cree el archivo de ejemplo *.htaccess.example*, al cual deberán cambiarle el nombre por `.htaccess`, para que puedan completar con sus datos de conexión a la base de datos (host, usuario, contraseña, nombre de la base de datos).

**Asegurarse de que el módulo mod_env esté habilitado en Apache.**

## ✅ Requisitos

- PHP 7.x o superior

- MySQL

- Servidor Apache (XAMPP/WAMP recomendado)

## 🗒️ Nota

Para ver el modo administrador de la página web deberá:
- Importar la base de datos
- Configurar variables de entorno
- Entrar a la página por el localhost
- Registrarse
- Dirigirse a la base de datos importada e ir a la tabla usuario
- En el usuario que registró, cambiar el valor del atributo "rol" a "admin"

Al iniciar sesión ya podrá ver las funciones del administrador👐
