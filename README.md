# Laboratorio_DSS404-2026
"Desarrollo de Aplicaciones Web con Software Interpretado en el Servidor"
### Instructor/Docente de la asignatura: Ing. Kevin Jiménez
# DESAFIO PRACTICO III
Desarrollo de Aplicación Web con el framework Laravel y el modelo arquitectónico MVC (Modelo – Vista – Controlador)

### Sistema de Reservación de Citas Médicas

## 🚀 Instrucciones para Despliegue Local

Para restaurar y ejecutar este proyecto en otro entorno de desarrollo, siga estos pasos:

1. **Instalar dependencias de PHP:**
   ```bash
   composer install

2. **Configurar el archivo de entorno:**
* Duplique el archivo `.env.example` y cámbiele el nombre a `.env`.
* Abra el nuevo archivo `.env` y configure las credenciales de su servidor local (nombre de la base de datos, usuario y contraseña de MySQL en XAMPP).


3. **Generar la clave de la aplicación:**
```bash
php artisan key:generate

```


4. **Ejecutar migraciones y poblado de datos iniciales (Seeders):**
*(Asegúrese de haber creado la base de datos en phpMyAdmin antes de este paso)*
```bash
php artisan migrate --seed

```


5. **Iniciar el servidor local:**
```bash
php artisan serve

```
