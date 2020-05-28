<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <h2 style="color:#0fad00">Sucesso</h2>
        <h3>Seja Muito Bem Vindo <?php echo $locatarioCadastrado->getNome();?></h3>
        <p style="font-size:20px;color:#5C5C5C;">. Nos enviamos um email para "<?php echo $locatarioCadastrado->getEmail();?>"</p>
        <a href="/Entrar" class="btn btn-success">  Fazer Login</a>
    <br><br>
        </div>
        
	</div>
</div>