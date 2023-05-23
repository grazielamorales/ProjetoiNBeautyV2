<html lang="pt-BR">
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">   
    <title>INBEAUTY - HeaderUsuario</title>
    <link rel="stylesheet" href="assets/css/style2.css">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

<body>
 <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid ms-5">
        <a class="navbar-brand" href="index.php" id="logo">IN<em> BEAUTY</em></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        </div>
    </div>
 </nav>
<div class="container ">
    <div class="card col-5 offset-3 mt-3 mb-3">
        <div class="card-header text-center">            
            <h2 style="font: size 2em; font-weight: 800;">ENTRAR</h2>        
                     
        </div>        
        
        <div class="card-body">
            <form action="#" method="post">            
                 <!--Email e Senha-->
                 <div class="col-8 offset-2 mt-3">
                        <label class="label" for="Email">Email</label>
                        <input class="form-control" type="email" required>
                </div>
                <div class="col-8 offset-2 mt-3">                   
                    <label class="label" for="Senha">Senha</label>
                    <input class="form-control" type="password" required>
                </div>
                <div class="col-8 offset-2 mt-5 mb-5">
                    <button type="submit" class="btn btn-success" name="action">Enviar</button>   
                    <button type="reset" class="btn btn-danger">Cancelar</button>                                
                </div>  
                
            </form>
        </div>
    </div>
</div>
<?php 
require_once "footer.php";
?>

