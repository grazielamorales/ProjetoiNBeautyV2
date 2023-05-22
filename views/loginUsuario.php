<?php 
    require_once "header.php";
    
?>
<html>
<body>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <div class="row">
                <div class="col-10 mt-3">
                    <h2>Cadastre-se</h2>                    
                </div>
                <div class="col-2 mt-3 justify-content-end">
                    <a class="btn btn-outline-success" href="index.php?controle=clienteController&metodo=login">Já sou cliente</a>
                </div>
            </div>           
        </div>        
        
        <div class="card-body">
            <form action="#" method="post">
            <div class="row">
                <!--Nome CPF-->               
                <div class="col-6">
                        <label class="label" for="Nome">Nome </label>
                        <input class="form-control" type="text" required>
                </div>
                <div class="col-6">                   
                    <label class="label" for="Cpf">CPF</label>
                    <input class="form-control" type="text" required>
                </div>

                <!--DtNasc Cel-->                
                <div class="col-6 mt-3">
                        <label class="label" for="DtNasc">Datat de nascimento</label>
                        <input class="form-control" type="date" required>
                </div>
                <div class="col-6 mt-3">                   
                    <label class="label" for="Cel">Celular</label>
                    <input class="form-control" type="text" required>
                </div>

                <!--Email e Senha-->
                 <div class="col-12 mt-3">
                        <label class="label" for="Email">Email</label>
                        <input class="form-control" type="email" required>
                </div>
                <div class="col-6 mt-3">                   
                    <label class="label" for="Senha">Senha</label>
                    <input class="form-control" type="password" required>
                </div>
                
                 <div class="col-6 mt-3">                   
                    <label class="label" for="confirmaSenha">Confirme a Senha</label>
                    <input class="form-control" type="password" required>
                </div>
                
                <div class="col-12 mt-5">
                    <button type="submit" class="btn btn-outline-success" name="action">Enviar</button>   
                    <button type="reset" class="btn btn-danger">Cancelar</button>                                
                </div>  
                
            </div>               
                 
            </form>
        </div>
    </div>
</div>
<?php 
require_once "footer.php";
?>

