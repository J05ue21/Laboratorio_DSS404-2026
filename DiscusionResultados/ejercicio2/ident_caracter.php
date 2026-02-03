<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Tipo de caracter</title>
    </head>
    <body>
        <h2><center>Identificando el tipo de caracter ingresado</center></h2>
        <form method="POST">
            <label>Inserta un caracter:</label>
            <input type="text" name="caracter" maxlength="1" required style="width: 40px; text-align: center;">
            <input type="submit" name="enviar" id="enviar" value="Enviar"/>
        </form>

        <?php
        if(isset($_POST['enviar']))
            {
                $caracterX = $_POST['caracter'];    //guarda el valor del "textbox" caracter
                                                    //maxlength="1" para limitar a un solo caracter

                $regex_Vocal='/^[aeiouáéíóú]/i';
                $regex_Consonante='/^[a-zñ]/i';
                $regex_Numerito='/^[0-9]$/';
                $regex_caracterEspecial='/^[.,;:()""\'\'!¡¿?#$%&+*]/';

                
                //identificar por vocal, sean con tilde y/o mayuscula
                //utilizando la funcion preg_match('patron_comparar','caracter_ingresado')
                //evalua si la cadena/caracter ingrasado conincide con el patron especificado,
                //de ser así, devuelve 1/TRUE, caso contrario, devuelve 0/FALSE
                //https://www.php.net/manual/en/function.preg-match.php

                if(preg_match($regex_Vocal,$caracterX))
                    {
                        echo "<h3>El caracter '$caracterX' que ingresó es una Vocal</h3>";
                    }
                
                //idenfica si es una consonante [A - Z] incluyendo Ñ/ñ
                //para tomar en cuenta tanto mayuscula como minuscula,
                //se agrega 'i' al final de la expresion regular
                //https://www.w3schools.com/php/func_regex_preg_match.asp

                elseif(preg_match($regex_Consonante,$caracterX))
                    {
                        echo "<h3>El caracter '$caracterX' que ingresó es una Consonante</h3>";
                    }

                elseif(preg_match($regex_Numerito,$caracterX))
                    {
                        echo "<h3>El caracter '$caracterX' que ingresó es un Número</h3>";
                    }

                elseif(preg_match($regex_caracterEspecial,$caracterX))
                    {
                        echo "<h3>El caracter '$caracterX' que ingresó es un Simbolo / Caracter Especial</h3>";
                    }
                
                else
                    {
                        echo "<h3>El caracter ingresado no coincide con ningun filtro</h3>";
                    }
            }
            ?>

    </body>
</html>
