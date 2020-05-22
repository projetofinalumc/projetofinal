<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php $Locatario  = $Pedido->getLocatarioPedido();?>
<div class="container">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <h2 style="color:#0fad00">Sucesso</h2>
        <img src="http://osmhotels.com//assets/check-true.jpg">
        <h3>Obrigado, <?php echo $Locatario->getNome();?></h3>
        <p style="font-size:20px;color:#5C5C5C;">Obrigado por comprar com agente!!. Nos enviamos um email para "<?php echo $Locatario->getEmail();?>" com os detalhes da sua compra.</p>
        <a href="/produtos" class="btn btn-success">  Voltar</a>
    <br><br>
        </div>
        
	</div>
</div>