<?php 
	//var_dump($prestador);
	//var_dump($servico);
	//die();
	require_once "headerUsuario.php";
    if(!isset($_SESSION))
		session_start();	
?>

<style>
	.container{
		margin-top:150px;
		margin-bottom:280px;
	
	}
	p{
		font-size: 18px;
		font-weight:bold;
	}
	strong{
		color: #ed563b;
		font-size: 18px;
		font-weight: bold;
		font-style: italic;
	}
	.input-padding-y{
		padding:0.5rem;
	}

</style>

<div class="container">
	<div class="card">
	
		<div class="card-header">
			<h2>Reserva de horário:</h2>	
			<p>Profissional: <strong><?php echo $prestador[0]->Nome;?></strong></p>			
			<p>Procedimento: <strong><?php echo $servico[0]->descritivo?></strong></p>
			<p>Valor procedimento: <strong><?php echo "R$". number_format($servico[0]->preco, 2, ',', '.');?></strong></p>
		</div>
		<div class="card-body mt-3 mb-5">
			<h2>Escolha uma data e hora:</h2>
			<form action="#" method="post">
				<input class="form-control" type="hidden" name="idUsuario" value="<?php echo $idUsuario?>" id="">
				<input class="form-control" type="hidden" name="idPrestador" value="<?php echo $prestador[0]->idPrestador ?>" id="">
				<input class="form-control" type="hidden" name="idServico" value="<?php echo $servico[0]->idServico ?>">
				<input type="hidden" name="Procedimento" value="<?php echo $servico[0]->descritivo;?>">
				<input class="form-control" type="hidden" name="ValorProcedimento" value="<?php echo $servico[0]->preco ?>">
						
				<input class="input-padding-y" type="date" name="DataReserva" id="DataReserva" required>
				
				<select class="input-padding-y" name="HoraReserva" id="" required>
					<option value="">Hora:</option>
					<option>08:00</option>
					<option>09:00</option>
					<option>10:00</option>
					<option>11:00</option>
					<option>12:00</option>
					<option>13:00</option>
					<option>14:00</option>
					<option>15:00</option>
					<option>16:00</option>
					<option>17:00</option>
					<option>18:00</option>
					<option>19:00</option>
				</select>
				
				<button type="submit" class="btn btn-primary ms-5">Agendar</button>
				<a href="index.php?controle=usuarioController&metodo=home" class="btn btn-success"> Voltar</a>				
			</form>
			
		</div>
		<div class="col-6 ms-5 mb-5" style="color:#198754"><?php echo $msg;?></div>
	</div>
</div>

<script>
	$("#DataReserva").on("change", function(){
		$.ajax({
		url:"?controle=reservaController&metodo=getHoraLivre",
		method:"GET",
		data:{
			idReserva:0,
			idPrestador:1,
			data: $('#DataReserva').val()
		},
		success: function(data){
			alert(data);
		},
		error:function(request, error){
			alert("Erro!");
		}

	})
	});
	
</script>
<?php 
	require_once "footer.php";
?>
