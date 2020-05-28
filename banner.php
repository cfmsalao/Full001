

<div class="container-fluid">
<div class="container jumbotron fuid">
  <div class="row">
    <div class="col-sm-3">        
        Hoje é dia:
          <?php  echo date("d/m/Y"); ?><br/>
    horas:  <?php  echo date("H:i"); ?><br/>
     Anúncios:: <?php echo $total_anuncios; ?></br>	  
		Usuarios: :<?php echo $total_usuarios; ?>  
    </div>
    <div class="col-sm-3">   
		Sejam bem Vindos
        <h5>Cadastre o seu o Salão.</h5>
            <h6>&Eacute; Gratuito.</h6>
    </div>
	<div class="col-sm-1">     
        
    </div>
    <div class="col-sm-4">
     Temos um limite de 10.000 cadastro Brasileiro grátuito resta <?php echo  '10000' - $total_anuncios; ?> , Após o seu cadastro iremos te cadastrar no google gratuitamente.</div>
  </div>
</div>
</div>









