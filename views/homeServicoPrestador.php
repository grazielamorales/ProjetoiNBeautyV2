<?php 
    require_once "headerPrestador.php";
    require_once "config.php";

    if(!isset($_SESSION))
		session_start();
     
?>

<div class="container-md mt-5">

    <div class="row justify-content-md-center">
        <div class="col md-auto">           
            <h3>Serviços Cadastrados</h3>
        </div>
    </div>
    <div class="card justify-content-md-center">

        <table class="table table-striped table-bordered mb-5">          
            <tr>
                <th>Procedimento</th>
                <th>Preço R$</th>
                <th>Tempo estimado</th>     
                 <th class="text-center">Editar</th>
                <th class="text-center">Apagar</th>
            </tr>           
            <?php if(is_array($retorno)){
                
                foreach ($retorno as $dado) {                    
                    echo "<tr>";
                    echo "<td>{$dado->descritivo}</td>";
                    echo "<td>" . number_format($dado->preco,2,",",".")."</td>";
                    echo "<td>{$dado->tempoEstimado}</td>";
                    //botões CRUD
                    
                    echo "<td class='text-center'>          
    						<a href='index.php?controle=servicoController&metodo=Editar&idServico=$dado->idServico&idPrestador=$idPrestador'><i class='fa-solid fa-pen fa-2xl' style='color: #ed563b;'></i></a></td>"; 
                     echo "<td class='text-center' id='confirm-delet'>          
    						<a href='index.php?controle=prestadorController&metodo=Deletar&idServico=$dado->idServico'><i class='fa-sharp fa-solid fa-eraser fa-2xl' style='color: #ed563b;'></i></a></td>"; 						
                                     
                    echo "</tr>";
                }
            } 
             echo"<div class='col-9 ms-5 mt-3 mb-3'>
                    <a class='btn btn-dark' href='index.php?controle=servicoController&metodo=Adicionar&idPrestador=$idPrestador'><i class='fa-solid fa-file-circle-plus 'style='color: #ed563b;'></i> Add Serviço</a>
                </div>"; 
            ?> 
            
        </table>
        <div class="row justify-content-end">                     
            <div class="col-2 mb-3">
                <a class="btn btn-success"href="index.php?controle=prestadorController&metodo=home">VOLTAR</a>
            </div> 
            <div class="m-3 text-center text-success">
                <?php echo $resp;?>
            </div>  
        </div>      
         
    </div>
</div>

<!--Inicio Modal p/ exclusão-->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"   aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var myModal = new bootstrap.Modal(document.getElementById('myModal'), options)
</script>














