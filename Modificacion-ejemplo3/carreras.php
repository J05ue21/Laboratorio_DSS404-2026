<?php
spl_autoload_register(function ($class_name) {
    require("class/" . $class_name . ".class.php");
});

// instanciando el objeto de la página de carreras
$carrerasPage = new page();

// contenido para esta sección
$carrerasPage->content = <<<PAGE
<div id="topcontent">
    <div id="textbox">
        <div id="title">
            <h2>NUESTROS POSTGRADOS</h2>
        </div>
        <div id="paragraph">
            <p>Ofrecemos una formación especializada con altos estándares de calidad:</p>
            <ul>
                <li>Maestría en Seguridad Informática</li>
                <li>Maestría en Gestión de la Energía</li>
                <li>Maestría en Diseño Gráfico</li>
                <li>Doctorado en Educación</li>
            </ul>
        </div>
    </div>
    <div id="picture">
        <img src="img/campus-de-antiguo-cuscatlan-2007.jpg" alt="Imagen de Carreras" width="800" height="370" />
    </div>
</div>
PAGE;

// "imprimiendo" la página completa
echo $carrerasPage->display();
?>