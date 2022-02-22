   <section class="footer-section">
   	<div class="container">
   		<div class="row">
   			<div class="col-md-12">
   				&copy; <?php echo date('Y'); ?> INTEC SUP |
   			</div>

   		</div>
   	</div>
   </section>
   <?php
   if(!isset($_COOKIE['accepte-cookie'])){
   ?>
  <div class="banniere">
  <div class="text-banniere">
  <p>Nous utilisons des cookies pour vous garantir la meilleure expérience sur notre site web.</br>
  Si vous continuez à utiliser ce site, nous supposerons que vous en êtes satisfait.<a href="mentions-legales"> En savoir plus.</a></p>
</div>
<div class="button-banniere">
<a href="?accepte-cookie">Ok</a>
</div>
</div>

<?php
  }
?>
