<?php 
    require_once "headerUsuario.php";

    if(!isset($_SESSION))
		session_start();

?>

<div class="container-md mt-5">

    <div class="row justify-content-md-center">
        <div class="col md-auto mt-5">
            <h3>Bem Vindo <em style="color:#ed563b; font-weight:bold"><?php echo $usuario?></em> </h3>
            <p>Selecione o serviço que deseja agendar:</p>
        </div>
    </div>
    <div class="card justify-content-md-center">

        <table class="table table-striped table-bordered mb-5">
            <tr>
                <th>Procedimento</th>
                <th>Preço</th>
                <th>Tempo estimado</th>
                <th>Profissional</th>
                <th class="text-center">Agendar</th>
            </tr>
            <?php if(is_array($retorno)){
               
                    foreach ($retorno as $dado) {
                    echo "<tr>";
                    echo "<td>{$dado->descritivo}</td>";
                    echo "<td>" . number_format($dado->preco,2,",",".")."</td>";
                    echo "<td>{$dado->tempoEstimado}</td>";
                    echo "<td>{$dado->Nome}</td>";
                    echo "<td class='text-center'>          
    						<a href='index.php?controle=reservaController&metodo=agendar&id=$dado->Nome'><i class='fa-solid fa-calendar-plus fa-2xl' style='color: #ed563b; '></i></a>			
							
                    </td>";                   
                    echo "</tr>";
                }
            }
            
            ?>    

        </table>
       
    </div>
</div>


<?php 
    require_once "footer.php";
?>













