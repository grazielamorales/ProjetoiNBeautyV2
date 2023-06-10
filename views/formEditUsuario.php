<?php 
    require_once "views/headerUsuario.php";
    if(!isset($_SESSION))
	    session_start();

?>
<style>
.container{
		margin-top:80px;
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
                        <h2>Olá! <?php echo "<span>".$usuario."</span>"; ?></h2>
                        <p>Mantenha seus dados sempre atualizados!</p>
                    </div>
                    
                    <div class="card-body"-->
                        <form action="#" method="post">
                        <div class="row">
                        <?php foreach($ret as $dado):?>               
                       
                            <!--Nome e Nome de usuário-->
                            <input type="hidden" name="idUsuario" value="<?php echo $dado->idUsuario; ?>">              
                            <div class="col-6">
                                    <label class="label" for="nome">Nome Completo</label>
                                    <input class="form-control" type="text" name="Nome" value="<?php echo $dado->Nome; ?>">
                            </div>
                            <div class="col-6">                   
                                <label class="label" for="Apelido">Nome do usuário</label>
                                <input class="form-control" type="text" name="Apelido" value="<?php echo $dado->Apelido; ?>">
                            </div>
							<div class="col-6 erro"><?php echo $msg[0] != ""?$msg[0]:""?></div>
							<div class="col-6"></div>

                            <!--CPF e Celular-->                
                            <div class="col-6 mt-3">
                                <label class="label" for="Cpf">CPF</label>
                                <input class="form-control" type="text" name="Cpf" value="<?php echo $dado->Cpf; ?>">
                            </div>
							
                            <div class="col-6 mt-3">                   
                                <label class="label" for="Celular">Celular</label>
                                <input class="form-control" type="text" name="Celular" value="<?php echo $dado->Celular; ?>">
                            </div>
							<div class="col-6 erro"><?php echo $msg[1] != ""?$msg[1]:""?></div>
							<div class="col-6 erro"><?php echo $msg[2] != ""?$msg[2]:""?></div>

                            <!--Sexo e Data de Nascimento-->   
                            <div class="col-6 mt-3">
							<label class="label" for="Sexo">Sexo</label>
                                <select class="form-select "  name="Sexo" id="sexo">
                                    <option value=""><?php echo $dado->Sexo; ?></option>
                                    <option value="feminino"> Feminino</option>
                                    <option value="masculino"> Masculino</option>
                                </select>
                            </div>
                            <div class="col-6 mt-3">     
                                <label class="label" for="DataNascimento">Data de Nascimento</label>
                                <input class="form-control" type="date" name="DataNascimento" value="<?php echo $dado->DataNascimento; ?>">
                            </div>  
							<div class="col-6 erro"><?php echo $msg[3] != ""?$msg[3]:""?></div>
							<div class="col-6 erro"><?php echo $msg[4] != ""?$msg[4]:""?></div>	                            
                            
                            <!--Email e Senha-->
                            <div class="col-06 mt-3">
                                    <label class="label" for="Email">E-mail</label>
                                    <input class="form-control" type="email" name="Email" value="<?php echo $dado->Email; ?>">
                            </div>
							<div class="col-12 erro"><?php echo $msg[5] != ""?$msg[5]:""?></div>
							<div class="col-6 mt-3">     
                                <label class="label" for="Senha">Senha</label>
                                <input class="form-control" type="password" name="Senha">
                            </div>
                            <div class="col-6 mt-3">     
                                <label class="label" for="Confsenha">Confirme a Senha</label>
                                <input class="form-control" type="password" name="Confsenha">
                            </div>
                            <div class="col-6 erro"><?php echo $msg[6] != ""?$msg[6]:""?></div>
							<div class="col-6 erro"><?php echo $msg[7] != ""?$msg[7]:""?></div>
                        <?php endforeach; ?>           
                        
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary" name="action">Enviar</button>   
                                <button type="reset" class="btn btn-danger">Cancelar</button>

                                <a class="btn btn-success"href="index.php">Voltar</a>
                                      
                            </div>

                             <p class="text-center mt-5">Caso desejar, altere seus dados preenchendo corretamente os campos, em seguida click no botão Salvar!</p>                             
                        </div> 
                        <div class="col-6 erro"><?php echo $resp ?></div>   
                        
                        </form>
                    </div>
                </div>

</div>