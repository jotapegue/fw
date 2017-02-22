<?php
	
	include_once('topo.php');
	
	( !empty( $_GET['cadastrar'] ) )? $_GET['cadastrar'] = true : $_GET['cadastrar'] = false ;
	
	
	if( $_GET['cadastrar'] ){
		
		$usuario = new usuario( $protocolo->seletc('cod') );
		$usuario->createUser();
		
		$nome = $_POST['usu_nome'];
		
		if( strlen( $nome ) > 37 ){
			$sqlID = $usuario->selectTable( ALL, "{$usuario->data('nome')}='".$nome."'" );
				$id = mysql_fetch_assoc( $sqlID );
				
				header("location: FormEditar.php?id=".$id['usu_id']);
		}else{
						
			header("location: exportar.php?nome=".$_POST['usu_nome']."&pagina=FormCadastro");
		}
		
	}
	
?>
 

   
            <form id="formCadastro" method="post" action="?cadastrar=true" enctype="multipart/form-data" role="form">
               
                <div id="forms" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Cadastrar</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <span class="label label-default">Codigo:</span>
                            <input id="usu_cod_form" name="usu_cod_form" size="20" class="form-control " type="text" placeholder="Número do Formulário" autofocus autocomplete="off" required />
                      </div>

<div class="col-md-5">
                            <span class="label label-default">Nome:</span>
                            <input
                                name="usu_nome"
                                id="usu_nome"
                                type="text"
                                class="form-control "
                                size="50"
                                maxlength="50"
                                placeholder="EX: JOAO PEDRO FIGUEIRA GARCIA"
                                autocomplete="off"
                                required
                            />
                    </div>
                        <div class="col-md-3">
                            <span class="label label-default">Abreviatura:</span>
                            <input
                                name="usu_abreviatura"
                                id="usu_abreviatura"
                                type="text"
                                class="form-control "
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
                                name="usu_dt_nascto"
                                id="usu_dt_nascto"
                                type="text"
                                class="form-control"
                                size="10" maxlength="10"
                                placeholder="EX: DIA/MES/ANO"
                                autocomplete="off"
                                OnKeyPress="formatar('##/##/####', this)"
                                required
                            />
                        </div>
                    </div>
                    <!--  -->
                    <div class="row">
                        <div class="col-md-2">
                            <span class="label label-default">Fone:</span>
                            <input
                                id="usu_telefone"
                                name="usu_telefone"
                                class="form-control"
                                type="text"
                                placeholder="(DD)0000-0000"
                                autocomplete="off"
                                maxlength="9"
                            />
                        </div>
                        <div class="col-md-2">
                            <span class="label label-default">Turno:</span>
                            <select name="usu_turno" size="1" class="form-control dropdown">
                            	<option value="MANHÃ">MANHA</option>
                            	<option value="TARDE">TARDE</option>
                            	<option value="NOITE">NOITE</option>
				<option value="INTEGRAL">INTEGRAL</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <span class="label label-default">Série:</span>
                            <input
                                name="usu_serie"
                                id="usu_serie"
                                type="text"
                                class="form-control "
                                size="10"
                                maxlength="10"
                                placeholder="EX: 1 ANO"
                                autocomplete="off"
                                required
                            />
                    </div>
                        <div class="col-md-5">
                            <span class="label label-default">Escola:</span>
                            <select name="usu_ent_id" size="1" class="form-control dropdown" class="">
<?php
		$entidades = new sql('ent');
			$sql = $entidades->selectTable( ALL, "", "{$entidades->data('nome')} ASC" );
			while($campo = mysql_fetch_array($sql)){
?>
                            	<option value="<?php echo $campo["{$entidades->data('cod')}"]; ?>"><?php echo $campo["{$entidades->data('nome')}"]; ?></option>
<?php

}

?>
                            </select>
                        </div>
                    </div>
                    <!--  -->
                    <div class="row">
                        <div class="col-md-4">
                            <span class="label label-default">Logradouro:</span>
                            <input id="usu_endereco" name="usu_endereco" class="form-control " type="text" placeholder="EX: RUA, TRAV, AV, KM" autocomplete="off" />
                        </div>
                        <div class="col-md-1">
                            <span class="label label-default">Numero:</span>
                            <input id="usu_end_num" name="usu_end_num" class="form-control " type="text" placeholder="EX: 0000" autocomplete="off" />
                        </div>
                        <div class="col-md-3">
                            <span class="label label-default">Bairro:</span>
                            <input id="usu_bairro" name="usu_bairro" class="form-control " type="text" placeholder="EX: CENTRO" autocomplete="off" />
                        </div>
                        <div class="col-md-4">
                            <span class="label label-default">Foto:</span>
                            <input type="file" name="3x4" id="textfield" class="form-control" />
                        </div>
                    </div>
                    <!--  -->
                    <div class="row">

                        <div class="col-md-8">
                            <span class="label label-default">Responsável:</span>
                            <input id="usu_resp_nome" name="usu_resp_nome" type="text" class="form-control " size="40" maxlength="40" placeholder="NOME DO RESPONSÁVEL" autocomplete="off" />
                    </div>
                        <div class="col-md-2">
                            <span class="label label-default">Tiragem:</span>
                            <input id="usu_tiragem" name="usu_tiragem" type="text" class="form-control " size="40" maxlength="40" placeholder="TIRAGEM" autocomplete="off" />
                    </div>
                        <div class="col-md-1 botao">
                            <input type="submit" value="Enviar" class="btn btn-success" />
                        </div>
                        <div class="col-md-1 botao">
                            <a href="index.php" class="btn btn-danger" />Voltar</a>
                        </div>
                    </div>
                                      
                </div>
      </form>
<?php include_once('rodape.php')?>
