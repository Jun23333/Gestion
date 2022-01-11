<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Persona</title>
    </head>
    <body>
        <?php
            echo 'Nombre: "'.$persona[0]->nombre.'"<br>'
                    . 'Sexo: "'.$persona[0]->sexo.'"<br>'
                    . 'Edad: "'.$persona[0]->edad.'"<br>'
                    . 'Movil: "'.$persona[0]->movil.'"<br>'
                    . 'Correo: "'.$persona[0]->correo.'"<br>';
        ?>
        <input type="button" value="Volver" onclick="location.href='/'">
    </body>
</html>