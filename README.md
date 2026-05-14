# 🏥 Hospital DB

Sistema de gestión hospitalaria desarrollado como proyecto final del módulo de Gestión de Bases de Datos (1º ASIR · CPIFP Los Enlaces · Curso 2025-26).

## 📋 Descripción

El sistema permite:

* Gestionar pacientes, episodios, citas y departamentos mediante un CRUD completo en PHP.
* Consultar información clínica y asistencial a través de 12 consultas SQL predefinidas.
* Registrar personal sanitario y no médico con sus datos específicos.
* Controlar hospitalizaciones, estancias y tratamientos vinculados a cada episodio.
* Acceder a la aplicación desde cualquier navegador gracias al despliegue en producción.

## 🚀 Tecnologías

* PHP · MySQL
* Microsoft Access (prototipo inicial)
* MySQL Workbench (migración y diagrama EER)
* phpMyAdmin (gestión y poblamiento de datos)
* XAMPP (entorno de desarrollo local)
* InfinityFree (despliegue en producción)

## 🗄 Estructura de la base de datos

11 tablas normalizadas hasta 3FN:

* **DEPARTAMENTO** — servicios del hospital
* **PERSONAL** — supertipo con subtipos DOCTOR, ENFERMERO y PERSONAL\_NO\_MEDICO
* **PACIENTE** — datos identificativos y médico de cabecera
* **EPISODIO** — consultas, urgencias e ingresos
* **CITA** — agenda y seguimiento de citas
* **HABITACION / ESTANCIA** — gestión de camas y hospitalizaciones
* **TRATAMIENTO** — prescripciones vinculadas a episodios

## 🌐 Demo

[http://crud-ayoub.infinityfreeapp.com](http://crud-ayoub.infinityfreeapp.com)

## 🛠 Instalación local

1. Clona el repositorio:

```bash
git clone https://github.com/AyoubElHarrak/bd_hospital.git
cd bd_hospital
```

2. Importa la base de datos en phpMyAdmin:

```
Crea una BD llamada bd_hospital e importa el archivo bd_hospital.sql
```

3. Configura la conexión en `dbConnection.php`:

```php
$databaseHost     = 'localhost';
$databaseName     = 'bd_hospital';
$databaseUsername = 'root';
$databasePassword = '';
```

4. Copia la carpeta `crud` en `htdocs/` de XAMPP y abre:

```
http://localhost/crud/
```

## 👤 Autor

Ayoub El Harrak · [CPIFP Los Enlaces](https://cpilosenlaces.com/) · 1º ASIR
