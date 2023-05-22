<?php 
    require_once "header.php";
    
?>
<html>
<body>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Cadastre sua Empresa</h2>
        </div>
        <span><?php echo $msg ?></span>
        <div class="card-body">
            <form action="#" method="post">
            <div class="row">
                <!--Razão Social e Fantasia-->               
                <div class="col-6">
                        <label class="label" for="NomeFantasia">Nome Fantasia</label>
                        <input class="form-control" type="text" required>
                </div>
                <div class="col-6">                   
                    <label class="label" for="RazaoSocial">Razão Social</label>
                    <input class="form-control" type="text" required>
                </div>

                <!--CNPJ e Fone-->                
                <div class="col-6 mt-3">
                        <label class="label" for="Cnpj">CNPJ</label>
                        <input class="form-control" type="text" required>
                </div>
                <div class="col-6 mt-3">                   
                    <label class="label" for="Fone">Telefone</label>
                    <input class="form-control" type="text" required>
                </div>

                <!--Logradouro e num-->
                 <div class="col-8 mt-3">
                        <label class="label" for="Logradouro">Logradouro</label>
                        <input class="form-control" type="text" required>
                </div>
                <div class="col-4 mt-3">                   
                    <label class="label" for="Num">Número</label>
                    <input class="form-control" type="text" required>
                </div>

                <!--Bairro e CEP-->
                <div class="col-8 mt-3">
                        <label class="label" for="Bairro">Bairro</label>
                        <input class="form-control" type="text" required>
                </div>
                <div class="col-4 mt-3">                   
                    <label class="label" for="Cep">CEP</label>
                    <input class="form-control" type="text" required>
                </div>

                <!--Cidade e UF-->
                <div class="col-8 mt-3">
                        <label class="label" for="Cidade">Cidade</label>
                        <input class="form-control" type="text" required>
                </div>
                <div class="col-4 mt-3">                   
                    <label class="label" for="Uf">Estado</label>
                    <input class="form-control" type="text" required>
                </div>

                <!--Email e Senha-->
                <div class="col-06 mt-3">
                        <label class="label" for="Email">E-mail</label>
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
                <span><?php echo $msg;?></span>
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

