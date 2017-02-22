<footer>
<div id="barRodape" class="">
        <ul>
        <li><a href="index.php" class="btn btn-default"><i class="fa fa-home"></i>
        <p>In&iacute;cio</p></a></li>
              <?php
				if( $protocolo->protocoloCurrent() == "close" ){
				?>
              <li><a href="protocolo.php?protocolo=true" class="btn btn-default"><i class="fa fa-plus-square"></i><p>Protocolo</p></a></li>
               <?php 
			}

				if( $protocolo->protocoloCurrent() == "open" ){
			  ?>
     
            <li><a href="FormCadastro.php" class="btn btn-default"><i class="fa fa-users"></i><p>Cadastrar</p></a></li>
              <?php
				}
			  ?>

            <li><a href="FormPesquisa.php" class="btn btn-default"><i class="fa fa-search"></i><p>Procurar</p></a></li>
              <?php
				if( $protocolo->protocoloCurrent() == "open" ){
					echo '<li><a href="protocolo.php?protocolo=false" class="btn btn-default"><i class="fa fa-upload"></i><p>Protocolo</p></a></li>';
				}
			  ?>

        <li><a href="novaescola.php" class="btn btn-default"><i class="fa fa-file-o"></i><p>Nova Escola</p></a></li>
        </ul>

     </div>
    </footer>
    <script src="includes/js/jquery.js"></script>
</body>
</html>