<?php   

    if(!isset($_SESSION))
		session_start();

    
    require_once "views/config.php";

?>
<style>
 body{
        margin:0;
        padding: 0;
        box-sizing: border-box;
        background-color:black;
    }
    .container-sm{
        background-color: #F5F5DC;
       
        

    }
    .card{
        margin-bottom:3.5rem;
    }
   
</style>
<div class="container-sm">   

    <div class="row justify-content-md-center">
        <div class="col-6 md-auto mt-3 mb-3">
            <h2>Cadastro de Serviço </h2>
            <?php foreach($ret as $dado):?>
            <strong style="font-size:22px; color:#ed563b"><em><?php echo $dado->Nome?></em> </strong>
            <p>Preencha o formulário abaixo para cadastrar um novo serviço</p>
            <?php endforeach?>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="card col-6 md-auto">        
            <form action="#" method="post">
                <div class="m-3">
                    <input type="hidden" name="idPrestador" value="idPrestador">
                    <label class="control-label" for="descritivo">Descrição</label>
                    <input class="form-control" type="text" name="descritivo" value="" required>        
                </div>
                <div class="m-3">
                    <label class="control-label" for="preco">Preço R$</label>
                    <input class="form-control" type="text" name="preco" value="" required>        
                </div>
                <div class="m-3">
                    <label class="control-label" for="tempoEstimado">Tempo Estimado</label>
                    <input class="form-control" type="time" name="tempoEstimado" value=""
                    required>        
                </div>
                <div class="m-3">
                    <select class="form-select"  aria-label="Default select example"  name="prestador">
                        <option selected>Selecione um prestador</option>
                    <?php foreach($opt as $option){
                    
                        echo "<option value='$option->idPrestador'>$option->Nome</option>";                
                    
                    }
                    ?>                        
                    </select>    
                    		
                </div>

                <button class="btn btn-primary ms-3 mb-5">Salvar</button>
                <a class="btn btn-success ms-3 mb-5" href="index.php?controle=prestadorController&metodo=listarServicos">Voltar</a>
                
                <div class="m-3" style="color:green"> 
                    <?php echo "<em>".$resp."</em>";?>  
                </div> 
            </form>  
        </div>               
    </div>        
</div>









