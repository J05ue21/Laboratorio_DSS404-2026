<?php
if (isset($_POST['calcular'])) 
    {
    
    $fechaTexto = $_POST['fecha_nacimiento']; // valor recibido desde el input text=fecha_nacimiento
    
    $formato = 'd/m/Y'; // variable para almacenar un formato especifico (Día/Mes/Año)

    $nacimiento = DateTime::createFromFormat($formato, $fechaTexto);    
    /*  https://www.w3schools.com/Php/func_date_create_from_format.asp
        Como la fecha ingresada se almacena como una cadena de texto, hay que convertirla al tipo
        DateTime. createFromFormar($string1, $string2) es una funcion que toma una cadena ($string2) suponiendo
        que se ha digitado como una fecha; luego utiliza la otra cadena ($string1) para especificar el formato
        en que debe guardarse. Si falla al intentar "convertirla", su valor será FALSE
    */

    $hoy = new DateTime();
        
            if ($nacimiento > $hoy)
                {
                    echo "La fecha no debe ser posterior a este día";
                } 
            else 
                {
                    $diferencia=date_diff($hoy, $nacimiento);
                    /*
                        https://www.w3schools.com/Php/func_date_date_diff.asp
                        date_diff($datetime1, $datetime2) es una funcion que compara dos cadenas (deben ser de tipo DateTime) y devuelve
                        su "diferencia" ya sea positiva (si datetime1 es > datetime2) o  negativo (si datetime 1 < datetime2)
                    */

                    echo "Desde ". $nacimiento->format($formato) ." has vivido: " . $diferencia->format('%a') . " días";
                    /*
                        Aqui imprime la fecha de nacimiento ($nacimiento) pero hay que "convertirla" a cadena (string), para ello
                        se usa la funcion format($formato) que devuelve un string con la fecha en formato dd/mm/YYYY.
                        
                        de igual forma, en $diferencia->format('%a') extraemos solo los días acumulados 
                        https://www.php.net/manual/en/dateinterval.format.php
                    */
                }
    
    }
   
?>

<form method="POST">
    <label>Ingresa tu fecha (dd/mm/aaaa):</label>
    <input type="text" name="fecha_nacimiento" placeholder="20/01/2000">
    <button type="submit" name="calcular">Calcular</button>
</form>
