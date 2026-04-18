# CRUD de Estudiantes y Carreras - Laravel 12

## Datos del alumno
- **Nombre:** Kelly Judith Salmeron Villalba
- **Carrera:** Ingenieria en tecnologías de la información y comunicaciones
- **Número de control:** 23151196
- **Correo institucional:** 23151196@aguascalientes.tecnm.mx
- **Fecha:** 18/04/2026

## Descripción del proyecto
Este proyecto es un sistema CRUD (Crear, Leer, Actualizar, Eliminar) completo para gestionar **Estudiantes** y **Carreras**, desarrollado con **Laravel 12** y **Tailwind CSS**. Cumple con los siguientes requerimientos:

- Registro de estudiantes con campos: nombre, correo, carrera (relacionada) y semestre.
- CRUD independiente para carreras (nombre y código).
- Listado de estudiantes en tabla con opciones de editar y eliminar.
- Mensajes de éxito y error al realizar operaciones.
- Validaciones en servidor con reglas personalizadas.
- Estructura MVC clara y código comentado.

## Tecnologías utilizadas
- Laravel 12
- PHP 8.2+
- Tailwind CSS (via Vite)
- MySQL 
- Git & GitHub

## Instalación

1. Clonar el repositorio
2. Ejecutar `composer install`
3. Copiar `.env.example` a `.env` y configurar la base de datos
4. Ejecutar `php artisan key:generate`
5. Ejecutar `php artisan migrate`
6. Ejecutar `npm install && npm run dev`
7. Ejecutar `php artisan serve`
