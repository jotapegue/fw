<?php

	include_once('topo.php');
	
	( !empty( $_GET['editar'] ) )? $_GET['editar'] : $_GET['editar'] = false ;
    ( !empty( $_GET['baixa'] ) )? $_GET['baixa'] : $_GET['baixa'] = false ;
	
	
	if( $_GET['editar'] ){
		$user = new usuario;
		$user->editUser();
		header("location: exportar.php?nome=".$_POST['usu_nome']."&pagina=FormEditar&id=".$_GET['id']);
	}

    if( $_GET['baixa'] ){
        if ( $_GET['tipo'] == 1 ) {
                 $baixa = new baixa;
                 $baixa->impressao( $_GET['id'] );
        }
            
        if ( $_GET['tipo'] == 2 ){
                 $baixa = new baixa;
                 $baixa->entrega( $_GET['id'] );
        }
    }
	
	$user = new usuario;
	
?>
    <div id="forms" class="container">
        <div  class="row">
            <div class="col-md-10">
            <?php
               switch ( $user->viewUser('status') ) {
                   case '1':
                       echo '<div class="alert alert-danger">Impressa</div>';
                       break;
                   
                   case '2':
                       echo '<div class="alert alert-success">Entregue</div>';
                       break;
               }

            ?>
            </div>
            
        </div>
		<div class="row">
        	<div class="col-md-2">
            	<table width="150" height="100%">
                	<tr>
            			<td align="center" valign="middle" colspan="2">
                        	<img src="<?= thumburl . $user->viewUser('foto_3x4') ?>" width="134" height="163" alt="">
                        </td>
                    </tr>
                    <tr>
                    	<td align="center" colspan="2">
                        <a href="backupunico.php?id=<?= $_GET['id']; ?>" class="btn btn-default"><i class="fa fa-upload"> Backup Unico</i></a>
                        </td>
                  </tr>
                  <tr>
                      <td width="75" align="center">
                            <?php
                                if( $user->viewUser('status') == 0 ){
                                    $btnImpressao = "";
                                    $btnEntrega = "disabled";
                                }

                                if( $user->viewUser('status') == 1 ){
                                    $btnImpressao = "disabled";
                                    $btnEntrega = "";
                                }


                                if( $user->viewUser('status') == 2 ){
                                    $btnImpressao = "disabled";
                                    $btnEntrega = "disabled";
                                }
                            ?>
                            <a
                                href="?baixa=true&tipo=1&id=<?= $_GET['id']; ?>"
                                class="btn btn-default"
                                    <?= $btnImpressao; ?>
                                >
                                <i class="fa fa-print"></i>
                            </a>
                        </td>
                      <td align="center">
                            <a
                                href="?baixa=true&tipo=2&id=<?= $_GET['id']; ?>"
                                class="btn btn-default"
                                    <?= $btnEntrega; ?>
                                >
                                <i class="fa fa-check-square "></i>
                            </a>
                      </td>
                  </tr>
				</table>
        </div>
            
            <!-- formulario a partir daqui -->
            <div class="col-md-10">
            <form id="formCadastro" method="post" action="?editar=true&id=<?= $_GET['id']; ?>" enctype="multipart/form-data" rolo="form">
              	<div class="row">
                    <div class="col-md-9">

                        <div class="row">
                            <div class="col-md-2">
                            <span class="label label-default">Codigo:</span>
                                <?= $user->viewUser('cod_form') ?>
                            </div>
                            
                            <div class="col-md-4">
                                <span class="label label-default">Nome:</span>
                                    <?= $user->viewUser('nome') ?>
                                </div>
                                
                                <div class="col-md-4">
                                <span class="label label-default">Abreviatura:</span>
                                    <?= $user->viewUser('abreviatura') ?>
                                </div>
        
                                <div class="col-md-2">
                                <span class="label label-default">Nascimento:</span>
                                    <?= $user->viewUser('dt_nascto') ?>
                                </div>
			</div>
                    
                    
                    <div class="row">
                    	<div class="col-md-12">
                        	<span class="label label-default">Abreviatura Carteira</span>
                            <?php if( strlen( $user->viewUser('nome')) > 37 ){ ?>
           		      <input
                                    id="usu_abreviatura_carteira"
                                	name="usu_abreviatura_carteira"
                                    value="<?= $user->viewUser('abreviatura_carteira') ?>"
                                    type="text"
                                    class="form-control alert-danger"
                                    size="37"
                                    maxlength="37"
                                    autocomplete="off"
                                    required
								/>
                            <?php }else{?>
           		      <input
                                    id="usu_abreviatura_carteira"
                                	name="usu_abreviatura_carteira"
                                    value="<?= $user->viewUser('abreviatura_carteira') ?>"
                                    type="text"
                                    class="form-control"
                                    size="37"
                                    maxlength="37"
                                    autocomplete="off"
                                    disabled
								/>
                            <?php }?>                            
                        </div>
                    </div>
                    
                    
                    
                    <div class="row">
                        <div class="col-md-2">
                            <span class="label label-default">Fone:</span>
                       	  <?= $user->viewUser('telefone') ?>
                  </div>
                        <div class="col-md-2">
                            <span class="label label-default">Turno:</span>
                            <?= $user->viewUser('turno') ?>
                        </div>
                        <div class="col-md-3">
                            <span class="label label-default">Série:</span>
                                <?= $user->viewUser('serie') ?>
                    </div>
                        <div class="col-md-5">
                            <span class="label label-default">Escola:</span>
								<?php
									$ent = new entidades($user->viewUser('ent_id'));
								?>
                                <?= $ent->dataEnt('nome') ?>
                            </select>
                        </div>
                    </div>
                    
                    
                    
                    <div class="row">
                        <div class="col-md-5">
                            <span class="label label-default">Logradouro:</span>
                            	<?= $user->viewUser('endereco') ?>
                        </div>
                        <div class="col-md-2">
                            <span class="label label-default">Numero:</span>
                            	<?= $user->viewUser('end_num') ?>
                        </div>
                        <div class="col-md-5">
                            <span class="label label-default">Bairro:</span>
                            	<?= $user->viewUser('bairro') ?>
                        </div>
                    </div>
                    
                    
                    
                    <div class="row">
                        <div class="col-md-8">
                            <span class="label label-default">Responsável:</span>
                            	<?= $user->viewUser('resp_nome') ?>
                    </div>
                        <div class="col-md-2">
                            <span class="label label-default">Protocolo:</span>
                            <?= $user->viewUser('protocolo') ?>
                        </div>
                        <div class="col-md-1 botao">
                            <input type="submit" value="Enviar" class="btn btn-success" />
                        </div>

                    </div>
                 
                 
                 
                 

                </div>
              </div>
</form>            
            
            </div>
      </div>
    </div>

    
<?php 
include_once('rodape.php')?>