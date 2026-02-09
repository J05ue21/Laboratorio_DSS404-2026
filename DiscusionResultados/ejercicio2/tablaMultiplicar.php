<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css" /> <!--estilos generados de forma artificial-->
    <title>Tabla de Multiplicar</title>
    
</head>
<body>

<div class="container">
    <h2>Practiquemos las tablas de Multiplicar</h2>
    
    <!-- formulario que muestra una lista desplegable con los numero del 1 - 10
        para elegir la tabla de multiplicar que se calculará
        tanto el formulario como el calculo con php se muestra en la misma pagina,
        utilizando la matriz $_SERVER['PHP_SELF'] para retroalimentarse-->

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="numero">Selecciona un número:</label>
        <select name="numero" id="numero">
            <option value = 1>1</option>
            <option value = 2>2</option>
            <option value = 3>3</option>
            <option value = 4>4</option>
            <option value = 5>5</option>
            <option value = 6>6</option>
            <option value = 7>7</option>
            <option value = 8>8</option>
            <option value = 9>9</option>
            <option value = 10>10</option>
        </select>
        <button type="submit" name="enviar">Mostrar Tabla</button>
    </form>

    <?php
    /* aquí se verifica si se ha recibido algun valor,
        luego de presionar el boton Mostrar tabla, se llama al metodo post y 
        se envia el valor seleccionado de la lista
    */
    if (isset($_POST['enviar'])) {
       $numeroTabla = $_POST['numero']; //se guarda en variable $numeroTabla el 'valor'
                                        //que pertece a la 'clave' [numero]
        
        echo "<h3>Tabla del $numeroTabla</h3>";
        echo "<table class='tabla-producto'>";

        /*
        ciclo for que inicia en 1 hasta 10, repitiendo el producto 
        del numero elegido $numeroTabla X la misma variable de control $i,
        se guarda en $producto y se va imprimiendo la tabla de 3 columnas
        1 x 1 | = | 1
        */
        for ($i = 1; $i <= 10; $i++) {
            $producto = $numeroTabla * $i;
            echo "<tr>
                    <td>$numeroTabla x $i</td>
                    <td>=</td>
                    <td class ='producto'>$producto</td>
                  </tr>";
        }
        echo "</table>";
    }
    ?>
</div>

</body>
</html>