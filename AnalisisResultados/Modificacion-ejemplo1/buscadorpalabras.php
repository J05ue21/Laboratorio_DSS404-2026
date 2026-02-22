<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ejercicio de Expresiones Regulares</title>
        <link rel="stylesheet" href="css/styles.css" />
        
    </head>

<body>
    <div id="bodywrap">
        <section id="pagetop"></section>
        <header id="pageheader">
            <h1>Uso de<span> Expresiones Regulares</span></h1>
        </header>
    
        <div id="contents">
            <section id="main">
                <div id="leftcontainer">
                    <h2>Buscador de Palabras</h2>
                    <section id="sidebar">
                        <?php
                            
                            if (isset($_POST['Enviar'])) {
                                $text = $_POST['comment'];
                                $palabra = $_POST['palabra'];

                                $patronRgX = "/\b(" . $palabra . ")\b/i";

                                //la funcion preg_match_all devuelve un numero entero igual al numero de coincidencias encontradas
                                //valiendose del patron y texto a comparar.
                                //$matches contiene la Matriz de todas las coincidencias en una matriz multidimensional 
                                //https://www.php.net/manual/en/function.preg-match-all.php 
                                $total = preg_match_all($patronRgX, $text, $matches);

                                $text = preg_replace("/\b(" . $palabra . ")\b/i", '<span style="background:#5fc9f6">\1</span>', $text);
                                //o bien:
                                //$text = preg_replace($patronRgX, '<span style="background:#5fc9f6">\1</span>', $text);
                       
                        ?>
        
                        <div id="sidebarwrap">
                            <h2>Resultado</h2>
                            <p>Se encontraron <strong><?= $total ?></strong> coincidencias.</p>
                            <hr>
        
                            <p><?= $text ?></p>
                        </div>
        
                        <?php
                            }
                        ?>
                    </section>

                <div class="clear"></div>
                    <article class="post">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form">
                            <p class="textfield">
                                <label for="palabra">
                                    <small>Palabra a buscar</small>
                                </label>
                                <input name="palabra" id="palabra" value="" size="22" tabindex="1" type="text" />
                            </p>

                            <p>
                                <small>Ingrese el texto de prueba para procesarlo con las <strong>expresiones regulares</strong>
                                </small>
                            </p>
                            <p class="text-area">
                            <textarea name="comment" id="comment" cols="50" rows="10" tabindex="4">
PHP es un lenguaje de programación interpretado​ del lado del servidor y de uso general 
que se adapta especialmente al desarrollo web.
PHP es un lenguaje de scripting del lado del servidor que permite el desarrollo de
aplicaciones web dinámicas y es compatible con múltiples sistemas operativos y servidores, 
facilitando la integración con bases de datos como MySQL y PostgreSQL. 
Además, PHP es uno de los lenguajes más utilizados en la creación de sitios web modernos como 
WordPress, Drupal y Joomla. Fue creado inicialmente por el programador danés-canadiense Rasmus Lerdorf en 1994.
En la actualidad, la implementación de referencia de PHP es producida por The PHP Group.
PHP originalmente significaba Personal Home Page (Página personal), 
pero ahora significa el inicialismo​ recursivo PHP: Hypertext Preprocessor.
YouTube fue creado con este lenguaje inicialmente.
                            </textarea>
                            </p>

                            <p>
                                <input name="Enviar" id="Enviar" value="1" type="hidden" />
                                <input name="submit" id="submit" tabindex="5" type="image"
                                src="images/submit.png" />
                            </p>
                            
                            <div class="clear"></div>
                        </form>
                        <div class="clear"></div>
                    </article>
                </div>
            </section>
            <div class="clear"></div>
        </div>
    </div>
    <footer id="pagefooter">
    <div id="footerwrap"></div>
    </footer>
</body>
</html>