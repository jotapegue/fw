<?php include("topo.php"); ?>

<div class="container">
	<div class="jumbotron">
    	<h1>CIE AEI-<?= date("Y")?></h1>
        <p>Utimo Protocolo aberto <?= $protocolo->seletc('cod'); ?></p>
            <?php
                if( $protocolo->protocoloCurrent() == 'open' ){
                    echo "<span class=\"alert alert-success btn-lg\">Aberto</span>";
                }else{
                    echo "<span class=\"alert alert-danger btn-lg\">Exportado</span>";
                }

            ?>



    </div>
</div>
     
<?php
include ("rodape.php");
?>
