<?php
	
	include_once('topo.php');
	
	$usuario = new usuario('usu');
	
	( !empty( $_GET['excluir'] ) )? $_GET['excluir'] : $_GET['excluir'] = false ;
	
	
	if( $_GET['excluir'] ){
		$usuario = new usuario('usu');
		$usuario->deleteUser();		
	}
	
?>
 

   
            <form id="formCadastro" method="post" action="" enctype="multipart/form-data"  role="form">
               
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Pesquisa</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <span class="label label-default">Nome:</span>
                    <input name="usu_nome" type="text" class="form-control " size="50" maxlength="50" placeholder="EX: JOAO PEDRO FIGUEIRA GARCIA" autofocus autocomplete="off"  required />
                </div>
            </div>
        
        </div>
      </form>
<br />
<br />
<br />
<div id="list" class="container">

<?php

	if( !empty( $_POST['usu_nome'] ) ){

?>
                      <table class="table table-bordered table-condensed">
                    <tr>
                        <td>Nome</td>
                        <td class="text-center">Editar</td>
                        <td class="text-center">Excluir</td>
                    </tr>
<?php
		
		( !empty( $_POST['usu_nome'] ) )? $nome = $_POST['usu_nome'] :  $nome = false;
		$sql = $usuario->selectTable( ALL, "{$usuario->data('nome')} like '$nome%' or {$usuario->data('cod_form')} = '$nome'");
        while( $campo = mysql_fetch_array( $sql ) ){
            
?>
                    <tr class="list">
                        <td><?= $campo["usu_nome"] ?></td>
                        <td class="text-center"><a href="FormEditar.php?id=<?= $campo["usu_id"] ?>"><i class="fa fa-pencil"></i></a></td>
                        <td class="text-center"><a href="?excluir=true&id=<?= $campo["usu_id"] ?>"><i class="fa fa-times"></i></a></td>
                    </tr>

<?php
            
        }}
?>
                </table>
</div>

<?php include_once('rodape.php')?>
