<?php include_once('../topo.php')?>

<?php
        
        $id = $_GET['id'];
        
        mysql_connect( "localhost", "root", "" );
		mysql_select_db( "carteirinha" );

        echo $usu_matricula = $_POST["usu_matricula"];
        $usu_nome = $_POST["usu_nome"];
        $usu_abreviatura = $_POST["usu_abreviatura"];
        $usu_dt_nascto = $_POST["usu_dt_nascto"];
        $usu_telefone = $_POST["usu_telefone"];
        $usu_turno = $_POST["usu_turno"];
        $usu_bairro = $_POST["usu_bairro"];
        $usu_endereco = $_POST["usu_endereco"];
        $usu_cod_form = $_POST["usu_cod_form"];
        $usu_cidade = $_POST["usu_cidade"];
        $usu_uf = $_POST["usu_uf"];
        $usu_resp_nome = $_POST["usu_resp_nome"];
        $usu_serie = $_POST["usu_serie"];
        $usu_end_num = $_POST["usu_end_num"];
        $usu_end_compl = $_POST["usu_end_compl"];
        $usu_ent_id = $_POST["usu_ent_id"];
        $usu_protoloco = $_POST["usu_protoloco"];
        
        mysql_query("UPDATE usu SET 
            usu_matricula = '$usu_matricula',
            usu_nome = '$usu_nome',
            usu_abreviatura = '$usu_abreviatura',
            usu_dt_nascto = '$usu_dt_nascto',
            usu_telefone = '$usu_telefone',
            usu_turno = '$usu_turno',
            usu_bairro = '$usu_bairro',
            usu_endereco = '$usu_endereco',
            usu_cod_form = '$usu_cod_form',
            usu_cidade = '$usu_cidade',
            usu_uf = '$usu_uf',
            usu_resp_nome = '$usu_resp_nome',
            usu_serie = '$usu_serie',
            usu_end_num = '$usu_end_num',
            usu_end_compl = '$usu_end_compl',
            usu_ent_id = '$usu_ent_id',
            usu_protoloco = '$usu_protoloco'
            
            WHERE usu_id = '$id'
        ");
        
        header("location: FormEditar.php?id=$id")

?>

