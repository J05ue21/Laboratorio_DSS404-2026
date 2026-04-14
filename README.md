# DESAFIO 2 DSS404-2026

Instructor/Docente de la asignatura: Ing. Kevin Jiménez

Pequeño sitio web para Control de asistencia con las funcionalidades:

1. Página de Registro de usuarios
  • Formulario para crear un nuevo usuario con al menos:
  • Nombre completo.
  • Nombre de usuario o correo.
  • Contraseña.
  • La contraseña debe cifrarse antes de guardarla en la base de datos
    usando la función password_hash().
  • Guardar los datos en una tabla (por ejemplo, usuarios) usando PDO

2. Página de Login
  • Formulario con campos:
  • Nombre de usuario o correo.
  • Contraseña.
  • Validar las credenciales contra la base de datos usando PDO.
  • Verificar la contraseña usando password_verify().
  • Si las credenciales son correctas:
  • Iniciar una sesión.
  • Guardar el nombre completo del usuario en una variable de sesión.
  • Redirigir al usuario a una Página de bienvenida.
  • Si las credenciales son incorrectas:
  • Redirigir de vuelta a la página de Login con un mensaje de error (por ejemplo, usando $_GET o $_SESSION)

3. Página de Bienvenida
  • Mostrar el nombre completo del usuario autenticado usando la variable de sesión.
  • Mostrar algún tipo de información adicional que tenga sentido según la temática elegida (por ejemplo, último inicio de sesión, número de registros,
    lista de datos propios, etc.)
  • Incluir un enlace para cerrar sesión (session_destroy()).

4. Manejo de base de datos con PDO
  • Crear una base de datos y una tabla de usuarios con campos adecuados.
  • Usar sentencias preparadas (prepare() y execute()) para todas las consultas que reciban datos desde el formulario.
  • Enviar mensajes de error mínimo (no mostrar detalles de MySQL en producción).

5. Seguridad básica
  • Usar siempre password_hash() al registrar un usuario y password_verify() al comparar contraseñas.
  • No almacenar contraseñas en texto plano.
  • Bloquear el acceso directo a páginas restringidas (por ejemplo, la bienvenida) si el usuario no está autenticado.
