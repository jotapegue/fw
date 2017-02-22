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
                                <input
                                    id="usu_cod_form"
                                    name="usu_cod_form"
                                    size="20" class="form-control"
                                    type="text"
                                    placeholder="Número do Formulário"
                                    value="<?= $user->viewUser('cod_form') ?>"
                                    autofocus autocomplete="off"
                                    required
                                />
                            </div>
                            
                            <div class="col-md-4">
                                <span class="label label-default">Nome:</span>
                                    <input
                                        id="usu_nome"
                                        name="usu_nome"
                                        type="text"
                                        class="form-control"
                                        value="<?= $user->viewUser('nome') ?>"
                                        size="50"
                                        maxlength="50"
                                        placeholder="EX: JOAO PEDRO FIGUEIRA GARCIA"
                                        autocomplete="off"
                                        required
                                    />
                                </div>
                                
                                <div class="col-md-4">
                                <span class="label label-default">Abreviatura:</span>
                                    <input
                                        id="usu_abreviatura"
                                        name="usu_abreviatura"
                                        type="text"
                                        class="form-control"
                                        value="<?= $user->viewUser('abreviatura') ?>"
                                        size="20"
                                        maxlength="20"
                                        placeholder="EX: JOAO P F GARCIA"
                                        autocomplete="off"
                                        required
                                    />
                                </div>
        
                                <div class="col-md-2">
                                <span class="label label-default">Nascimento:</span>
                                    <input
                                        id="usu_dt_nascto"
                                        name="usu_dt_nascto"
                                        class="form-control"
                                        type="text"
                                        placeholder="EX: DIA/MES/ANO"
                                        value="<?= $user->viewUser('dt_nascto') ?>"
                                        autocomplete="off"
                                        required
                                    />
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
                       	  <input
                                    id="usu_telefone"
                                	name="usu_telefone"
                                    class="form-control"
                                    type="text"
                                    placeholder="(DD)0000-0000"
                                    value="<?= $user->viewUser('telefone') ?>"
                                    autocomplete="off"
                                    maxlength="9"
								/>
                  </div>
                        <div class="col-md-2">
                            <span class="label label-default">Turno:</span>
                            <select name="usu_turno" size="1" class="form-control dropdown">
                                <option value="<?= $user->viewUser('turno') ?>"><?= $user->viewUser('turno') ?></option>
                                <option disabled>Escolha Abaixo</option>
                            	<option value="MANHA">MANHA</option>
                            	<option value="TARDE">TARDE</option>
                            	<option value="NOITE">NOITE</option>
                                <option value="INTEGRAL">INTEGRAL</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <span class="label label-default">Série:</span>
                       	  <input
                                    id="usu_serie"
                                	name="usu_serie"
                                    type="text"
                                    class="form-control"
                                    value="<?= $user->viewUser('serie') ?>"
                                    size="10"
                                    maxlength="10"
                                    placeholder="EX: 1 ANO"
                                    autocomplete="off"
                                    required
                          />
                    </div>
                        <div class="col-md-5">
                            <span class="label label-default">Escola:</span>
                            <select  name="usu_ent_id" size="1" class="form-control dropdown">
								<?php
									$ent = new entidades($user->viewUser('ent_id'));
								?>
                                <option value="<?= $ent->dataEnt('cod') ?>"><?= $ent->dataEnt('nome') ?></option>
                                <option disabled>Escolha Abaixo</option>
                                <?php
                                $sql = $ent->selectTable( ALL, "", "{$ent->data('nome')} ASC" );
                                while($campoescola = mysql_fetch_array( $sql )){
                                ?>
                                <option value="<?php echo $campoescola["ent_cod"]; ?>"><?php echo $campoescola["ent_nome"]; ?></option>
                                <?php
                                
                                }
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    
                    
                    <div class="row">
                        <div class="col-md-4">
                            <span class="label label-default">Logradouro:</span>
                            	<input
                                    id="usu_endereco"
                                	name="usu_endereco"
                                    class="form-control"
                                    type="text"
                                    placeholder="EX: RUA, TRAV, AV, KM"
                                    value="<?= $user->viewUser('endereco') ?>"
                                    autocomplete="off"
                                    
								/>
                        </div>
                        <div class="col-md-1">
                            <span class="label label-default">Numero:</span>
                            	<input
                                    id="usu_end_num"
                                	name="usu_end_num"
                                    class="form-control"
                                    type="text"
                                    placeholder="EX: 0000"
                                    value="<?= $user->viewUser('end_num') ?>"
                                    autocomplete="off"
								/>
                        </div>
                        <div class="col-md-3">
                            <span class="label label-default">Bairro:</span>
                            	<input
                                    id="usu_bairro"
                                	name="usu_bairro"
                                    class="form-control"
                                    type="text"
                                    placeholder="EX: CENTRO"
                                    value="<?= $user->viewUser('bairro') ?>"
                                    autocomplete="off"
								/>
                        </div>
                        <div class="col-md-4">
                       	 	<span class="label label-default">Foto:</span>
								<input
                                	type="file"
                                    name="3x4"
                                    id="textfield"
                                    class="form-control"
                                    autocomplete="off"
								/>                        
                      </div>
                    </div>
                    
                    
                    
                    <div class="row">
                        <div class="col-md-8">
                            <span class="label label-default">Responsável:</span>
                            	<input
                                    id="usu_resp_nome"
                                	name="usu_resp_nome"
                                    type="text"
                                    class="form-control"
                                    value="<?= $user->viewUser('resp_nome') ?>"
                                    size="40"
                                    maxlength="40"
                                    placeholder="NOME DO RESPONSÁVEL"
                                    autocomplete="off"
								/>
                    </div>
                        <div class="col-md-2">
                            <span class="label label-default">Protocolo:</span>
                            <select name="usu_protoloco" size="1" class="form-control dropdown">
                                <?php
                                	if( $protocolo->protocoloCurrent() == open ){
								?>
                            	<option value="<?= $user->viewUser('protocolo') ?>"><?= $user->viewUser('protocolo') ?></option>
                                <option value="<?= $protocolo->seletc('cod'); ?>"><?= $protocolo->seletc('cod'); ?></option>
                                <?php
									}
								?>
                            </select>
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