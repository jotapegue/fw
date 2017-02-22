<?php include_once('topo.php')?>
    

                <table class="table table-bordered table-condensed">
                    <tr>
                        <td>Nome</td>
                        <td class="text-center">Editar</td>
                        <td class="text-center">Excluir</td>
                    </tr>
<?php

        mysql_connect( "localhost", "root", "" );
		mysql_select_db( "carteirinha" );
        
        $sql = mysql_query("SELECT * FROM usu ORDER BY usu_nome ASC");
        
        while( $campo = mysql_fetch_array( $sql ) ){
            
?>
                    <tr>
                        <td><?php echo $campo["usu_nome"] ?></td>
                        <td class="text-center"><a href="FormEditar.php?id=<?php echo $campo["usu_id"] ?>"><i class="fa fa-pencil"></i></a></td>
                        <td class="text-center"><a href="excluir.php?id=<?php echo $campo["usu_id"] ?>"><i class="fa fa-times"></i></a></td>
                    </tr>

<?php
            
        }
?>
                </table>
<?php include_once('rodape.php')?>