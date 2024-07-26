# Promozioni
## Tabla de Contenidos

*   1. [Introducción](#1-introducción)
    - 1.1 [Definiciones, Acrónimos y Abreviaturas](#11-definiciones-acrónimos-y-abreviaturas)  
    - 1.2 [Referencias](#12-referencias)  
*   2. [Descripción General](#2-descripción-general)
    - 2.1 [Funcionalidades del Producto](#21-funcionalidades-del-producto)  
    - 2.2 [Características del Usuario](#22-características-del-usuario)  
    - 2.3 [Restricciones](#23-restricciones)  
*   3. [Requisitos del Sistema](#3-requisitos-del-sistema)
    - 3.1 [Requisitos Funcionales](#31-requisitos-funcionales)  
    - 3.1.1 [Registro y Autenticación](#311-registro-y-autenticación)  
    - 3.1.2 [Gestión de Negocios](#312-gestión-de-negocios)  
    - 3.1.3 [Gestión de Promociones](#313-gestión-de-promociones)  
    - 3.1.4 [Visualización de Negocios y Promociones](#314-visualización-de-negocios-y-promociones)  
    - 3.1.5 [Valoración de Sucursales](#315-valoración-de-sucursales)  
    - 3.1.6 [Gestión del Sistema](#316-gestión-del-sistema)  
    - 3.2 [Requisitos No Funcionales](#32-requisitos-no-funcionales)  
    - 3.2.1 [Rendimiento](#321-rendimiento)  
    - 3.2.2 [Seguridad](#322-seguridad)  
    - 3.2.3 [Usabilidad](#323-usabilidad)  
    - 3.2.4 [Mantenimiento](#324-mantenimiento)  
*   4. [Diseño del Sistema](#4-diseño-del-sistema)
    - 4.1 [Arquitectura del Sistema](#41-arquitectura-del-sistema)  
    - 4.2 [Descripción de Componentes](#42-descripción-de-componentes)  
*   5. [Diseño de la Base de Datos](#5-diseño-de-la-base-de-datos)
    - 5.1 [Modelo Entidad-Relación](#51-modelo-entidad-relación)  
    - 5.2 [Descripción de Tablas](#52-descripción-de-tablas)  
*   6. [Diseño de la Interfaz de Usuario](#6-diseño-de-la-interfaz-de-usuario)
    - 6.1 [Descripción de Pantallas](#61-descripción-de-pantallas)  
    - 6.2 [Prototipos de Interfaz](#62-prototipos-de-interfaz)  
*   7. [Gestión de la Configuración](#7-gestión-de-la-configuración)
    - 7.1 [Control de Versiones](#71-control-de-versiones)  


## 1. Introducción
Este documento tiene como objetivo detallar los requisitos, la arquitectura y el diseño de la aplicación web "Promozioni". Incluye los requisitos funcionales y no funcionales, el diseño del sistema, la arquitectura general y los detalles de la base de datos.

### 1.1 Definiciones, Acrónimos y Abreviaturas
- **Promozioni**: Nombre de la aplicación web.
- **Negocio**: Entidad comercial que publica su ubicación y promociones en la plataforma.
- **Usuario**: Persona que utiliza la aplicación para buscar negocios y promociones cercanas.
- **Promoción**: Oferta o descuento especial publicado por un negocio.
- **Mapa Interactivo**: Herramienta visual que muestra la ubicación de los negocios en un mapa geográfico.
- **Administrador**: Administrador del sistema con permisos elevados para gestionar la aplicación.

### 1.2 Referencias
- Documentación de Laravel [Laravel Docs](https://laravel.com/docs).

## 2. Descripción General
"Promozioni" es una aplicación web diseñada para ayudar a una variedad de negocios, incluyendo tiendas minoristas, restaurantes, agricultores y otros comerciantes locales, a publicar sus ubicaciones y promociones de productos. Los usuarios pueden acceder a la plataforma para buscar negocios cercanos que ofrezcan ofertas especiales, ya sean descuentos en productos agrícolas, promociones en menús de restaurantes, o rebajas en tiendas minoristas. Esto no solo aumenta la visibilidad de los comerciantes, sino que también brinda a los usuarios la oportunidad de aprovechar promociones atractivas y locales. Además, la aplicación permite a los negocios actualizar fácilmente sus promociones y ubicaciones, manteniendo a los usuarios informados sobre las mejores ofertas disponibles en su área.


### 2.1 Funcionalidades del Producto
**Usuarios**:
- Registro y autenticación.
- Búsqueda, visualización y valoración de promociones.
- Registro y gestión de negocios y sus sucursales.
- Publicación y gestión de promociones.
- Valoración de sucursales.
- Visualización de ubicaciones en un mapa.
**Administradores**:
  - Gestión de usuarios.
  - Gestión de negocios.
  - Moderación de contenidos.
  - Gestión de promociones.
  - Gestión de categorías.
  - Gestión de informes.

### 2.2 Características del Usuario
"Promozioni" está diseñada para tres tipos de usuarios: el usuario cliente, el usuario negocio y el administrador. el usuario cliente y negocio son el mismo en este caso se diferencia en el uso que le dan a la app ya sea de meramente consumo o promocionar negocio aunque puede hacer ambas:

**Usuarios Clientes**:
  - Personas que buscan promociones y ofertas en negocios cercanos.
  - Características: Búsqueda de promociones, acceso a mapa interactivo, comentarios y valoraciones.

**Usuarios Negocios**:
  - Dueños de negocios que desean promocionar sus productos y servicios.
  - Características: Gestión de negocios, sucursales, publicación y gestión de promociones, visualización de comentarios y valoraciones.

**Administradores**:
  - Personal encargado de la gestión y mantenimiento de la plataforma.
  - Características: Gestión de usuarios y negocios, moderación de contenidos, acceso a informes y análisis detallados.

  
### 2.3 Restricciones
- La aplicación estará inicialmente disponible solo en web.
- Los negocios deben estar localizados dentro de un área geográfica específica (Colombia).
- Se requiere una conexión a Internet para utilizar todas las funcionalidades de la aplicación.



## 3. Requisitos del Sistema

### 3.1 Requisitos Funcionales

#### 3.1.1 Registro y Autenticación
**Descripción**: Los usuarios deben poder registrarse y autenticarse en la plataforma.

**Requisitos**:
- Los usuarios deben poder registrarse con el nombre, una dirección de correo electrónico y una contraseña.
- Los usuarios deben poder iniciar sesión con su dirección de correo electrónico y contraseña.

#### 3.1.2 Gestión de Negocios
**Descripción**: Los usuarios deben poder gestionar sus negocios, poder crearlos, asociar sucursales, editarlos y eliminarlos.

**Requisitos**:
- Los usuarios deben poder crear un negocio con el nombre, el tipo de negocio y la descripción.
- Los usuarios deben poder actualizar la información de su negocio como su nombre, tipo y descripción, además de agregar una imagen, correo y teléfono.
- Los usuarios deben poder agregar, editar o quitar sucursales a un negocio ingresando el nombre, dirección y la ubicación.


#### 3.1.3 Gestión de Promociones
**Descripción**: Los usuarios deben poder publicar y gestionar promociones asociadas a una sucursal.

**Requisitos**:
- Los usuarios deben poder crear nuevas promociones proporcionando título, descripción, categoría, imagen, ubicación, fecha de inicio y fin de la promoción.
- Los usuarios deben poder editar promociones existentes o eliminarlas.

#### 3.1.4 Visualización de Negocios y Promociones
**Descripción**: Los usuarios deben poder ver las sucursales y sus promociones en un mapa interactivo sin necesidad de autenticarse.

**Requisitos**:
- Los usuarios deben poder ver las promociones cercanas en un mapa.
- Los usuarios deben poder buscar promociones por nombre, categoría o ubicación.


#### 3.1.5 Valoración de Sucursales
**Descripción**: Los usuarios deben poder ver las valoraciones de una sucursal y agregar una valoración.

**Requisitos**:
- Los usuarios deben poder ver las valoraciones de una sucursal sin estar autenticado.
- Los usuarios autenticados deben poder agregar una valoración ingresando la calificación y un comentario opcional. Un usuario solo puede hacer una valoración por sucursal.
- los usuarios deben poder eliminar valoraciones suyas.

#### 3.1.6 Gestión del Sistema
**Descripción**: El sistema debe contar con un panel administrativo para gestionar los usuarios, negocios, sucursales, valoraciones, usuarios administrativos y sus roles.

**Requisitos**:
- El sistema debe contar con un apartado sistema que debe contar con los administradores del sistema y los roles, así mismo deberá permitir agregar, editar o eliminar a los administradores otros usuarios administrativos y roles.
- El sistema debe permitir a los administradores eliminar usuarios.
- El sistema debe permitir a los administradores y moderadores eliminar negocios, sucursales, promociones y validar sucursales cambiando su estado.


### 3.2 Requisitos No Funcionales

#### 3.2.1 Rendimiento
- La aplicación debe responder a las acciones de los usuarios en menos de 2 segundos en el 95% de los casos.
- El sistema debe poder manejar hasta 1000 usuarios concurrentes sin degradación significativa del rendimiento.

#### 3.2.2 Seguridad
- Los datos de los usuarios deben ser almacenados de manera segura, siguiendo las mejores prácticas de la industria.
- La aplicación debe utilizar HTTPS para todas las comunicaciones.
- La autenticación debe ser manejada con tokens JWT.

#### 3.2.3 Usabilidad
- La interfaz de usuario debe ser intuitiva y fácil de usar.
- La aplicación debe ser accesible desde dispositivos móviles y de escritorio.

#### 3.2.4 Mantenimiento
- El código debe seguir las mejores prácticas de desarrollo y estar bien documentado.
- El sistema debe contar con pruebas automatizadas para garantizar la calidad del código.


## 4. Diseño del Sistema

### 4.1 Arquitectura del Sistema
La arquitectura del sistema está basada en un enfoque de aplicación web monolítica utilizando Laravel Blade e Inertia Vue, con MySQL como sistema de gestión de bases de datos y Leaflet para la visualización de mapas.

### 4.2 Descripción de Componentes
- **Frontend**: la parte usuario cliente desarrollado con Blade y alpinejs y de usuario negocio con inertia vue ambos usando flowbite para la interfaz.
- **Backend**: Desarrollado con Laravel.
- **Base de Datos**: MySQL para almacenamiento persistente de datos.
- **Mapas**: Leaflet para la visualización y gestión de mapas interactivos.
- **Control de Versiones**: Git para el control de versiones y GitHub como repositorio remoto.

## 5. Diseño de la Base de Datos

### 5.1 Modelo Entidad-Relación
![DB](https://github.com/stivenm0/promozioni/blob/main/public/docs/DB.jpg?raw=true)

### 5.2 Descripción de Tablas
-   **timestamps**: Fecha de registro en la aplicación todas las tablas tendrán estos campos excepto categorías, tipo de negocios y la tabla pivot. (TIMESTAMP, Default CURRENT_TIMESTAMP) 

#### Usuarios
- **id (PK)**: Identificador único del usuario. (INT)
- **name**: Nombre del usuario. (VARCHAR(100))
- **email**: Dirección de correo electrónico. (VARCHAR(100), Unique)
- **password**: Contraseña cifrada. (VARCHAR(255))

#### Negocios
- **id (PK)**: Identificador único del negocio. (INT)
- **user_id (FK)**: Identificador del propietario del negocio. (INT)
- **name**: Nombre del negocio. (VARCHAR(100), Unique)
- **description**: Descripción del negocio. (TEXT)
- **image**:  Imagen del negocio. (VARCHAR(255), Nullable)
- **email**: Correo del negocio (VARCHAR(255), Nullable)
- **phone**: Teléfono del negocio (VARCHAR(255), Nullable)

#### Sucursales
- **id (PK)**: Identificador único del negocio. (INT)
- **business_id (FK)**: Identificador del negocio al que pertenece la sucursal. (INT)
- **name**: Nombre de la sucursal para diferenciarse de las demás. (VARCHAR(100), Unique)
- **status**: Estado de la sucursal (VARCHAR(50), ENUM(Pendiente, Aprobado, Rechazado), Default(Pendiente))
- **status_description**: Descripción del estado de la sucursal. (VARCHAR(255), Nullable)
- **address**: Dirección física de la sucursal. (VARCHAR(255))
- **latitude**: Latitud de la ubicación de la sucursal. (DOUBLE)
- **longitude**: Longitud de la ubicación de la sucursal. (DOUBLE)


#### Promociones
- **id (PK)**: Identificador único de la promoción. (INT)
- **branch_id (FK)**: Identificador de la sucursal a la que pertenece la promoción. (INT)
- **cateogy_id (FK)**: Identificador de la categoría a la que pertenece la promoción. (INT)
- **title**: Título de la promoción. (VARCHAR(50))
- **slug**: Identificador de la promoción. (VARCHAR(255), Unique)
- **image**: Imagen de la promoción. (VARCHAR(255))
- **latitude**: Latitud de la ubicación de la sucursal. (DOUBLE)
- **longitude**: Longitud de la ubicación de la sucursal. (DOUBLE)
- **description**: Descripción de la promoción. (TEXT)
- **start_date**: Fecha de inicio de la promoción. (DATE)
- **end_date**: Fecha de fin de la promoción. (DATE)


#### Valoraciones
- **id (PK)**: Identificador único de la valoración. (INT)
- **usuario_id (FK)**: Identificador del usuario que hizo la valoración. (INT)
- **branch_id (FK)**: Identificador de la sucursal a la que se refiere la valoración. (INT)
- **content**: Texto del comentario. (VARCHAR(255), Nullable)
- **value**: Puntuación dada al negocio. (TINYINT, Range 1-5)

#### Categorías
- **id (PK)**: Identificador único de la categoría. (TINYINT)
- **name**: Nombre de la categoría. (VARCHAR(50), Unique)

#### Tipos
- **id (PK)**: Identificador único del tipo. (TINYINT)
- **name**: Nombre del tipo de negocio. (VARCHAR(50), Unique)

#### Negocio_Tipo
- **business_id (FK)**: Identificador del negocio. (INT, Foreign Key)
- **type_id (FK)**: Identificador del Tipo. (INT, Foreign Key)


## 6. Diseño de la Interfaz de Usuario

### 6.1 Descripción de Pantallas
Descripción detallada de cada pantalla en la aplicación.

### 6.2 Prototipos de Interfaz
![interfaz](https://github.com/stivenm0/promozioni/raw/main/public/docs/Wiframe.webp)
