<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="INBEAUTY" content="Agendamento online para salões de beleza, barbearias e   clinicas de estética">
    <meta name="Graziela B. Morales" content="5º Sem S.I. FATEC/Jau">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
     <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/eefac6c057.js" crossorigin="anonymous"></script>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"-->   
    <title>INBEAUTY - FormCadastroUsuario</title>
    <link rel="stylesheet" href="assets/css/style2.css">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <style>
        #bkg-img{             
            font-family: "Helvetica Neue",Helvetica,Arial;         
            color: #fff;
            background-image: url("assets/images/bkg.jpeg");
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-position: center;
            background-size: cover;
        }
        #bkg-img li, p{
            font-size:25px
        }
		.erro{color:red;font-size:11px;}
    </style>


</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid ms-5">
        <a class="navbar-brand" href="index.php" id="logo">in<em>BEAUTY</em></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">        
       
        </div>
    </div>
    </nav>
<body>
    <div class="container-fluid">         
        <div class="row">
            <div class="col col-lg-6" id="bkg-img">             
                <div class="container mt-5 ms-5" id="text-info">              
                    <h2>Marcar horário no seu salão preferido é muito fácil e rápido com a <em>INBEAUTY</em></h2>
                    <ul class="list mt-5">
                        <li>Escolha o salão, serviços, profissionais e agende online</li>
                        <li>Encontre os salões mais perto de você</li>                       
                        <li>Acesse a agenda do salão 24h para marcar seu horário</li>
                        <li>Receba lembretes dos seus agendamentos</li>                       
                    </ul>   
                    <p>Preencha o formulário ao lado e cadastre-se gratuitamente!</p>
                </div>  

            </div>

            <div class="col col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Cadastre-se</h2>
                    </div>
                    
                    <div class="card-body"-->
                        <form action="#" method="post">
                        <div class="row">
                            
                            <!--Nome e Nome de usuário-->               
                            <div class="col-6">
                                    <label class="label" for="nome">Nome Completo</label>
                                    <input class="form-control" type="text" name="Nome" value="<?php echo isset($_POST['Nome'])?$_POST['Nome']:''; ?>">
                            </div>
                            <div class="col-6">                   
                                <label class="label" for="Apelido">Nome do usuário</label>
                                <input class="form-control" type="text" name="Apelido" value="<?php echo isset($_POST['Apelido'])?$_POST['Apelido']:''; ?>">
                            </div>
							<div class="col-6 erro"><?php echo $msg[0] != ""?$msg[0]:""?></div>
							<div class="col-6"></div>


                            
                            <!--CPF e Celular-->                
                            <div class="col-6 mt-3">
                                <label class="label" for="Cpf">CPF</label>
                                <input class="form-control" type="text" name="Cpf" value="<?php echo isset($_POST['Cpf'])?$_POST['Cpf']:''; ?>">
                            </div>
							
                            <div class="col-6 mt-3">                   
                                <label class="label" for="Celular">Celular</label>
                                <input class="form-control" type="text" name="Celular" value="<?php echo isset($_POST['Celular'])?$_POST['Celular']:''; ?>">
                            </div>
							<div class="col-6 erro"><?php echo $msg[1] != ""?$msg[1]:""?></div>
							<div class="col-6 erro"><?php echo $msg[2] != ""?$msg[2]:""?></div>


                            <!--Sexo e Data de Nascimento-->   
                            <div class="col-6 mt-3">
							<label class="label" for="Sexo">Sexo</label>
                                <select class="form-select "  name="Sexo" id="sexo">
                                    <option value="">Selecione</option>
                                    <option value="feminino"> Feminino</option>
                                    <option value="masculino"> Masculino</option>
                                </select>
                            </div>
                            <div class="col-6 mt-3">     
                                <label class="label" for="DataNascimento">Data de Nascimento</label>
                                <input class="form-control" type="date" name="DataNascimento" value="<?php echo isset($_POST['DataNascimento'])?$_POST['DataNascimento']:''; ?>">
                            </div>  
							<div class="col-6 erro"><?php echo $msg[3] != ""?$msg[3]:""?></div>
							<div class="col-6 erro"><?php echo $msg[4] != ""?$msg[4]:""?></div>		
                            
                            
                            <!--Email e Senha-->
                            <div class="col-06 mt-3">
                                    <label class="label" for="Email">E-mail</label>
                                    <input class="form-control" type="email" name="Email" value="<?php echo isset($_POST['Email'])?$_POST['Email']:''; ?>">
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
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary" name="action">Enviar</button>   
                                <button type="reset" class="btn btn-danger">Cancelar</button> 

                                <a class="mt-5 mb-5 ms-5" href="index.php? controle=usuarioController&metodo=login">Já tem conta? Clique aqui para entrar!</a></a>                    
                            </div>                          
                        </div>    
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
         
    </div>
</body>
<?php 
require_once "footer.php";
?>

