<?php
// Conexión a la base de datos (configura tus credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comentarios_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Guardar comentario si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $comentario = $conn->real_escape_string($_POST['comentario']);

    // Insertar comentario en la base de datos
    $sql = "INSERT INTO comentarios (nombre, email, comentario, fecha) VALUES ('$nombre', '$email', '$comentario', NOW())";
    if ($conn->query($sql) === TRUE) {
        $mensaje = "Comentario enviado correctamente.";
    } else {
        $mensaje = "Error al enviar el comentario: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linux Mint - Historia e Instalación</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            background-color: #f3f4f6;
        }
        header {
            background-color: #87c038;
            padding: 20px;
            text-align: center;
        }
        header img {
            max-width: 200px;
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 10px;
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: #4caf50;
            padding: 10px;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: 500;
            transition: transform 0.3s ease;
        }
        nav a:hover {
            transform: scale(1.1);
            text-decoration: none;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .section {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
        }
        h2 {
            color: #4caf50;
        }
        iframe {
            width: 100%;
            height: 400px;
            border-radius: 10px;
        }
        footer {
            background-color: #4caf50;
            color: white;
            text-align: center;
            padding: 20px;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        .footer-links {
            margin: 10px 0;
        }
        .footer-links a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
        .footer-links a:hover {
            text-decoration: underline;
        }

        /* Estilos para la sección de comentarios */
        #comentarios {
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        #comentarios h3 {
            color: #4caf50;
        }

        .comment-box {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form {
            margin-top: 20px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>

    <header>
        <img src="logo-linusmint.png" alt="Logo Linux Mint">
    </header>

    <nav>
        <a href="#historia">Historia</a>
        <a href="#instalacion">Instalación</a>
        <a href="#sitios">Sitios de Interés</a>
        <a href="#razones">¿Por qué Linux Mint?</a>
        <a href="#comentarios">Comentarios</a>
    </nav>

    <div class="container">

        <section id="historia" class="section">
            <h2>Historia del Sistema Operativo Linux Mint</h2>
            <p>Linux Mint fue desarrollado por Clement Lefebvre y lanzado por primera vez en el año 2006...</p>
            <p><strong>Autor:</strong> Clement Lefebvre</p>
            <p><strong>Año:</strong> 2006</p>
            <p><strong>Versiones:</strong> Ubuntu-based, Debian-based. Actualmente se recomienda instalar la versión Linux Mint 22.</p>
        </section>

        <section id="instalacion" class="section">
            <h2>Instalación y Configuración</h2>
            <p>A continuación puedes ver el video de instalación realizado por el grupo:</p>
            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Video de instalación de Linux Mint"></iframe>
        </section>

        <section id="sitios" class="section">
            <h2>Sitios de Interés</h2>
            <ul>
                <li><a href="https://linuxmint.com" target="_blank">Página oficial de Linux Mint</a></li>
                <li><a href="https://blog.linuxmint.com" target="_blank">Blog de Linux Mint</a></li>
                <li><a href="https://forums.linuxmint.com" target="_blank">Foro oficial de Linux Mint</a></li>
            </ul>
        </section>

        <section id="razones" class="section">
            <h2>¿Por qué instalar este Sistema Operativo?</h2>
            <p>Linux Mint se destaca por su facilidad de uso, estabilidad, y seguridad...</p>
            <p><strong>Áreas de uso:</strong> Educativas, empresariales, y en desarrollo de software.</p>
        </section>

        <!-- Sección de Comentarios -->
        <section id="comentarios" class="section">
            <h2>Zona de Comentarios</h2>

            <?php if (!empty($mensaje)) echo "<p>$mensaje</p>"; ?>

            <!-- Formulario de Comentarios -->
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" name="nombre" placeholder="Tu nombre" required>
                <input type="email" name="email" placeholder="Tu correo electrónico" required>
                <textarea name="comentario" placeholder="Escribe tu comentario" required></textarea>
                <button type="submit">Enviar Comentario</button>
            </form>

            <!-- Mostrar Comentarios -->
            <h3>Comentarios:</h3>
            <?php
            // Recuperar y mostrar comentarios de la base de datos
            $sql = "SELECT nombre, comentario, fecha FROM comentarios ORDER BY fecha DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='comment-box'>";
                    echo "<p><strong>" . htmlspecialchars($row['nombre']) . "</strong> (" . $row['fecha'] . ")</p>";
                    echo "<p>" . htmlspecialchars($row['comentario']) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay comentarios todavía.</p>";
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </section>

    </div>

    <footer>
        <div class="footer-links">
            <a href="#historia">Historia</a>
            <a href="#instalacion">Instalación</a>
            <a href="#sitios">Sitios de Interés</a>
            <a href="#razones">Razones</a>
            <a href="#comentarios">Comentarios</a>
        </div>
        <p>&copy; 2024 Linux Mint. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
