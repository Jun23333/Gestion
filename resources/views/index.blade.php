<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista</title>
        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="{{URL::asset('css/index.css')}}">
    </head>
    <body>
        <!-- filter -->
    	<div id="search">
	        <form action="name" method="get">
	            <input type="text" name="filter">
	            <button type="submit" class="btn btn-primary">Buscar por nombre</button>
	        </form>
	        <form action="gender" method="get">
	            <select name="filter">
	                <option value="Masculino">Masculino</option>
	                <option value="Femenino">Femenino</option>
	            </select>
	            <button type="submit" class="btn btn-primary">Filtrar por sexo</button>
	        </form>
	        <form action="age" method="get">
	            <button type="submit" class="btn btn-primary">Filtrar por edad de 25-55</button>
	        </form>
	        <form action="all" method="get">
	            <button type="submit" class="btn btn-primary">Mostrar todos</button>
	        </form>
        </div>

        <div id="table">
	    	<button data-toggle="modal" data-target="#addModal" class="btn btn-primary">Agregar</button>
			<?php
			echo '<table class="table">'
	        . '<caption>Personas</caption>'
	        . '<tr><th>Nombres</th><tr>';
	    	foreach ($listaPersona as $persona) {
	        echo '<tr><td>"'.$persona->nombre.'"</td>'
	        . '<td><form action="view" method="get">
	                <input type="hidden" name="id" value="'.$persona->id.'">
	                <button type="submit">Ver</button>
	            </form></td>'
	        . '<td><button data-toggle="modal" data-target="#modifyModal" onclick=modify("'.$persona->id.'","'.$persona->nombre.'","'.$persona->sexo.'","'.$persona->edad.'","'.$persona->movil.'","'.$persona->correo.'")>Modificar</button></td>'
	        . '<td><form action="del" method="get">
	                <input type="hidden" name="id" value="'.$persona->id.'">
	                <button type="submit">Eliminar</button>
	            </form></td>';
	        }
	        ?>
        </div>
        
        <!-- MODAL DE AGREGAR -->
        <div class="modal" id="addModal" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4>Agregar</h4>
					</div>
					<div class="modal-body">
		                            <form action="add" method="post">
		                            	{{ csrf_field() }}
		                                Nombre: <input type="text" name="name" id="id_addModalName" required><br>
		                                Sexo: <select name="gender" id="id_addModalSexo" required>
		                                    <option value="Masculino" >Masculino</option>
		                                    <option value="Femenino">Femenino</option>
		                                </select><br>
		                                Edad: <input type="number" name="age" id="id_addModalEdad" required><br>
		                                Movil: <input type="number" name="phone" id="id_addModalMovil" required><br>
		                                Correo: <input type="text" name="mail" id="id_addModalCorreo" required><br>
		                                <button type="submit" name="modify">Agregar</button>
		                            </form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
        </div>
	        
        <!-- MODAL DE MODIFICAR -->
        <div class="modal" id="modifyModal" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4>Modificar</h4>
					</div>
					<div class="modal-body">
		                            <form action="mod" method="post">
		                            	{{ csrf_field() }}
		                            	<input type="hidden" name="id" id="id_modifyModalId"><br>
		                                Nombre: <input type="text" name="name" id="id_modifyModalName" required><br>
		                                Sexo: <select name="gender" id="id_modifyModalSexo" required>
		                                    <option value="Masculino" >Masculino</option>
		                                    <option value="Femenino">Femenino</option>
		                                </select><br>
		                                Edad: <input type="number" name="age" id="id_modifyModalEdad" required><br>
		                                Movil: <input type="number" name="phone" id="id_modifyModalMovil" required><br>
		                                Correo: <input type="text" name="mail" id="id_modifyModalCorreo" required><br>
		                                <button type="submit" name="modify">Guardar</button>
		                            </form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
        </div>
	        
        <script>
            function modify(id,nombre,sexo,edad,movil,correo) {
                $('#id_modifyModalId').val(id);
                $('#id_modifyModalName').val(nombre);
                $('#id_modifyModalSexo').val(sexo);
                $('#id_modifyModalEdad').val(edad);
                $('#id_modifyModalMovil').val(movil);
                $('#id_modifyModalCorreo').val(correo);
            }
        </script>
    </body>
</html>
