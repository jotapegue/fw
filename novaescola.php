<?php

	include("topo.php");

	( !empty( $_GET['cadastrar'] ) )? $_GET['cadastrar'] = true : $_GET['cadastrar'] = false ;

	if( $_GET['cadastrar'] ){

		$ent = new entidades;
		$ent->createEnt();
	}

?>
<form name="form1" method="post" action="?cadastrar=true" role="form">
<div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Cadastrar Nova Escola</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                	<span class="label label-default">Código:</span>
                   <input type="text" name="cod" id="textfield" class="form-control" autocomplete="off" autofocus>
                </div>
                    <div class="col-md-9"></div>
            </div>

            <div class="row">
                <div class="col-md-7">
                	<span class="label label-default">Nome:</span>
                    <input type="text" name="nome" id="textfield2" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-5"></div>
            </div>
<br>
    <div class="row">
				<div class="col-md-3"></div>
                <div class="col-md-2">
                    <input type="submit" name="button" id="button" value="Cadastrar" class="btn btn-primary">
</div>
                <div class="col-md-7"></div>
            </div>

</div>
  </form>    


<?php
include ("rodape.php");
?>
