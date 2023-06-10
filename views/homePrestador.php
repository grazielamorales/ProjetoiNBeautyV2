<?php     
    
    require_once "headerPrestador.php";
    
    if(!isset($_SESSION))
		session_start();

?>

<div class="container-md mt-5">

    <div class="row justify-content-md-center">
        <div class="col md-auto">
            <h3>Bem Vindo <em style="color:#ed563b; font-weight:bold"><?php echo $_SESSION["Nome"]?></em> </h3>
            <br>
            <h3>Agenda do dia </h3>"carregar as agendamentos para a data do dia"
        </div>
    </div>
    <div class="card justify-content-md-center">

        <table class="table table-striped table-bordered mb-5">
            <tr>
                <th>Data</th>
                <th>Hora</th>
                <th>Procedimento</th>
                <th>Cliente</th>               
                
            </tr>
            
            
             

        </table>
       
    </div>
</div>


<?php 
    require_once "footer.php";
?>













<?php 
    
    if(!isset($_SESSION))
		session_start();
    
    require_once "headerPrestador.php";

?>

<div class="container-md mt-5">

    <div class="row justify-content-md-center">
        <div class="col md-auto">
            <h3>Bem Vindo <em style="color:#ed563b; font-weight:bold"><?php echo $_SESSION["Nome"]?></em> </h3>
            <br>
            <h3>Agenda do dia </h3>"carregar as agendamentos para a data do dia"
        </div>
    </div>
    <div class="card justify-content-md-center">

        <table class="table table-striped table-bordered mb-5">
            <tr>
                <th>Data</th>
                <th>Hora</th>
                <th>Procedimento</th>
                <th>Cliente</th>               
                
            </tr>
            
            
             

        </table>
       
    </div>
</div>


<?php 
    require_once "footer.php";
?>













