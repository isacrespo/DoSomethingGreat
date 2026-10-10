# Do Something Great · Micro CMS

Blog con su propio gestor de contenidos (un pequeño CMS) que diseñé y programé desde cero en 2020 con **PHP, MySQL, HTML y CSS**, como proyecto de formación en desarrollo web.

> **Nota:** la demo en línea ya no está disponible. Este repositorio se conserva para consultar el código.

## Qué hace

**Parte pública (blog)**
- Listado de entradas con título, extracto y fecha de publicación.
- Página de detalle de cada entrada.
- Filtro de entradas favoritas.

**Panel de administración (con login)**
- Acceso de administración con usuario y contraseña, y control de sesión.
- Crear, editar y borrar entradas.
- Marcar o desmarcar entradas como favoritas (⭐).
- Protección básica de las acciones de borrado y login con un hash de verificación.

## Tecnologías

- **PHP** (sin frameworks): plantillas, sesiones y lógica de la aplicación.
- **MySQL**: almacenamiento de las entradas, con una pequeña clase de acceso a la base de datos (`inc/class-db.php`).
- **HTML y CSS**: diseño y maquetación propios.

## Estructura

```
├── admin/          Panel de administración (listado, nueva entrada, edición)
├── assets/         Estilos, imágenes y favicon
├── inc/            Conexión a la base de datos, funciones de entradas y helpers
├── templates/      Cabecera y pie comunes
├── index.php       Portada del blog
├── view-post.php   Detalle de una entrada
└── login.php       Acceso al panel
```

Para ejecutarlo hace falta un servidor con PHP y una base de datos MySQL con una tabla `posts`.

---

Diseño y desarrollo: **Isabel Crespo Abón** · [isabelcrespoabon.com](https://www.isabelcrespoabon.com) · [LinkedIn](https://www.linkedin.com/in/isa-crespo/)
