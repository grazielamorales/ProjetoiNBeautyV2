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
       <div class="col md-auto mt-5" >
            <input class="form-control" type="search" placeholder="Pesquisar serviço ou prestador..." id="pesquisar">            
       </div>
       <div class="col-1 md-auto mt-5" >
            <button onclick="searchData()" class="btn btn-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
       </div>
    </div>
   
    <div class="card justify-content-md-center">

        <table class="table table-striped table-bordered mb-5">
            <thead>
                <tr>
                    <th>Procedimento</th>
                    <th>Preço</th>
                    <th>Tempo estimado</th>
                    <th>Profissional</th>
                    <th class="text-center">Agendar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(!empty($_GET['search']))
                    {
                        foreach ($pesquisa as $dado) {
                        echo "<tr>";
                        echo "<td>{$dado->descritivo}</td>";
                        echo "<td>" . number_format($dado->preco,2,",",".")."</td>";
                        echo "<td>{$dado->tempoEstimado}</td>";
                        echo "<td>{$dado->Nome}</td>";
                        echo "<td class='text-center'>          
                                <a href='index.php?controle=reservaController&metodo=agendar&idUsuario=$idUsuario&idPrestador=$dado->idPrestador&idServico=$dado->idServico'><i class='fa-solid fa-calendar-plus fa-2xl' style='color: #ed563b; '></i></a>                               
                                </td>";                   
                        echo "</tr>";
                        }
                    }
                    else
                    {
                        if(is_array($retorno))
                        {                
                            foreach ($retorno as $dado) 
                            {
                                echo "<tr>";
                                echo "<td>{$dado->descritivo}</td>";
                                echo "<td>" . number_format($dado->preco,2,",",".")."</td>";
                                echo "<td>{$dado->tempoEstimado}</td>";
                                echo "<td>{$dado->Nome}</td>";
                                echo "<td class='text-center'>          
                                    <a href='index.php?controle=reservaController&metodo=agendar&idUsuario=$idUsuario&idPrestador=$dado->idPrestador&idServico=$dado->idServico'><i class='fa-solid fa-calendar-plus fa-2xl' style='color: #ed563b; '></i></a>			
                                    
                                </td>";                   
                                echo "</tr>";
                            }
                        }                    
                    }
                ?>     
                
            </tbody>
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
    						<a href='index.php?controle=reservaController&metodo=agendar&idUsuario=$idUsuario&idPrestador=$dado->idPrestador&idServico=$dado->idServico'><i class='fa-solid fa-calendar-plus fa-2xl' style='color: #ed563b; '></i></a>			
							
                    </td>";                   
                    echo "</tr>";
                }
            }
            
            ?>    

        </table>
       
    </div>
</div>

<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener('keydown', function(event){
        if(event.key === "Enter")
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'index.php?controle=usuarioController&metodo=pesquisar&search='+search.value;
    }
</script>

<?php
require_once "footer.php";
?>















