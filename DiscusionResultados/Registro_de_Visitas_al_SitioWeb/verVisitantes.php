<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Panel de Administración - Libro de Visitas</title>
    <link rel="stylesheet" href="css/style.css" />
  
    
</head>
<body>

<section id="container">
    <h1 class="title-admin">Registros del Libro de Visitas</h1>
    
    <div class="admin-table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Cumpleaños</th>
                    <th>IP</th>
                    <th>Script</th>
                    <th>Fecha/Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // ruta donde está el guestBook.txt
                $path = "./guest/guestbook.txt"; 

                if (file_exists($path)) {
                    //fopen(con permisos solamente de lectura 'r')
                    $fh = fopen($path, "rb");

                    while (!feof($fh)) {
                        //feof: File End Of File
                        //devuelve valor booleano si el puntero llega al final del archivo
                        
                        $linea = fgets($fh);    //fgets() extrae todo el contenido del archivo
                                                //separandolo por medio de los saltos de linea \n
                                                //y almacena su contenido en $linea
                        if (!empty(trim($linea))) { //siempre y cuando $linea No este vacio
                                                        
                            $datos = explode(" : ", $linea);    // Separamos $linea por el mismo delimitador ':'
                                                                // y se almacena en $datos como un arreglo [] 
                            echo "<tr>";//imprime una fila (regisrto)
                            foreach ($datos as $dato) {
                                //$dato es cada elemento del arreglo $datos[],
                                //y se imprime en una columna hasta completar la fila (registro)
                                echo "<td>" . htmlspecialchars($dato) . "</td>";
                            }
                            echo "</tr>";
                        }
                    }
                    fclose($fh);//"cierre de sesion" entre el archivo y PHP
                } else {//si el archivo.txt está vacío, imprime una linea de aviso
                    echo "<tr><td colspan='7' style='text-align:center;'>No hay registros aún.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <p style="text-align: center;">
        <a href="recordvisits.php" style="color: #4A90E2; font-weight: bold;">[ Volver al Formulario ]</a>
    </p>
</section>

</body>
</html>