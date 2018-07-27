<div class="container-fluid">
	<form id="formulario">
		<div class="row" >
			<input type="hidden" name="id" value="" id="id_reg">
			<div class="col-md-6">
				<label>Nombre</label>
				<input type="text" name="data[Personas][nombre]" id="nombre_reg" class="form-control">
			</div>
			<div class="col-md-6">
				<label>Apellido</label>
				<input type="text" name="data[Personas][apellido]" id="apellido_reg"class="form-control">
			</div>
			<div class="col-md-6">
				<label>Correo</label>
				<input type="text" name="data[Personas][correo]" id="correo_reg" class="form-control">
			</div>
			<div class="col-md-6">
				<label>Cedula</label>
				<input type="text" name="data[Personas][cedula]" id="cedula_reg" class="form-control">
			</div>
			<div class="col-md-6">
				<label>Clave</label>
				<input type="text" id="clave_reg" class="form-control">
			</div>
			<div class="col-md-6">
				<label>Confirmar Clave</label>
				<input type="text" name="data[Personas][clave]" id="confir_clave" class="form-control">
			</div>
		</div>
	</form>
</div>
<hr>
<table>
	<tr>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Correo</td>
		<td>Cedula</td>
		<td>Fecha Creacion</td>
		<dt>Acciones</dt>
	</tr>
	<?php foreach ($personas as $key => $persona) { ?>
	<tr>
		<td><?php echo $persona['Personas']['nombre'];?><input type="hidden" value="<?php echo $persona['Personas']['nombre'];?>" id="nombre_<?php echo $persona['Personas']['id'];?>"></td>
		<td><?php echo $persona['Personas']['apellido'];?><input type="hidden" value="<?php echo $persona['Personas']['apellido'];?>" id="apellido_<?php echo $persona['Personas']['id'];?>"></td>
		<td><?php echo $persona['Personas']['correo'];?><input type="hidden" value="<?php echo $persona['Personas']['correo'];?>" id="correo_<?php echo $persona['Personas']['id'];?>"></td>
		<td><?php echo $persona['Personas']['cedula'];?><input type="hidden" value="<?php echo $persona['Personas']['cedula'];?>" id="cedula_<?php echo $persona['Personas']['id'];?>"></td>
		<td><input type="hidden" value="<?php echo $persona['Personas']['created'];?>" id="fecha_<?php echo $persona['Personas']['id'];?>"><?php echo $persona['Personas']['created'];?></td>
		<td><input type="hidden" value="<?php echo $persona['Personas']['clave'];?>" id="clave_<?php echo $persona['Personas']['id'];?>"><button class="editar" data-id="<?php echo $persona['Personas']['id'];?>" class="btn btn-xs btn-default">Editar</button><button class="eliminar" data-id="<?php echo $persona['Personas']['id'];?>" >Eliminar</button></td>
	</tr>
	<?php }	?>

</table>
<script type="text/javascript">
	$( document ).ready(function() {
	    $('#nuevo_registro').on('click',function(){
	    	$.ajax({                        
	           type: "POST",                 
	           url: '/prueba_final/Registros/registro',                     
	           data: $("#formulario").serialize(), 
	           success: function(data)             
	           {
	             //$('#resp').html(data);     
	            	alert("Se registro de forma correcta");
	            	location.reload();            
	           }
	      	});
	    });

	    $('#editar_registro').on('click',function(){
	    	$.ajax({                        
	           type: "POST",                 
	           url: '/prueba_final/Registros/registro',                     
	           data: $("#formulario").serialize(), 
	           success: function(data)             
	           {
	             //$('#resp').html(data);     
	            	alert("Registro Actualizado de forma correcta");
	            	location.reload();         
	           }
	      	});
	    });

	    $('.editar').on('click',function(){
	    	var id = $(this).data('id');
	    	var nombre = $('#nombre_'+id).val();
	    	var apellido = $('#apellido_'+id).val();
	    	var correo = $('#correo_'+id).val();
	    	var cedula = $('#cedula_'+id).val();
	    	var clave = $('#clave_'+id).val();

	    	$('#nombre_reg').val(nombre);
	    	$('#apellido_reg').val(apellido);
	    	$('#correo_reg').val(correo);
	    	$('#cedula_reg').val(cedula);
	    	$('#clave_reg').val(clave);
	    	$('#confir_clave').val(clave);
	    	$('#id_reg').val(id);


	    });

	    $('.eliminar').on('click',function(){

	    	var id = $(this).data('id');
	    	$.ajax({                        
	           type: "POST",                 
	           url: '/prueba_final/Registros/eliminar',                     
	           data: {id:id}, 
	           success: function(data)             
	           {
	             //$('#resp').html(data);     
	            	alert("Se elimino de forma correcta");
	            	location.reload();            
	           }
	      	});
	    });
	});
</script>