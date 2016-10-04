<?php
  require_once 'cabecalho.php';
 ?>
 <form class="" action="envia-contato.php" method="post">
   <table class="table">
     <tr>
       <td>Nome</td>
       <td><input type="text" name="nome" value="" class="form-control"></td>
     </tr>
     <tr>
       <td>Email</td>
       <td><input type="email" name="email" value="" class="form-control"></td>
     </tr>
     <tr>
       <td>Mensagem</td>
       <td><textarea name="mensagem" rows="8" cols="40" class="form-control"></textarea></td>
     </tr>
     <tr>
       <td colspan="2">
         <button class="btn btn-primary">Enviar</button>
       </td>
     </tr>
   </table>
 </form>
 <?php
   require_once 'rodape.php';
  ?>
