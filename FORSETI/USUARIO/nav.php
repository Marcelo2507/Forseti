<!--Menu da página-->

<div style="width: 100%;">
  <nav class="navbar navbar-dark fixed-top" style="background: black; font-size:14px;">

     <img src="../img/image_1.png" style="width: 2.99rem; height:2.87rem;">
    <div class="dropdown">
      <a class="navbar-brand" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:20px"><b><?php echo $nome; ?><span class="badge badge-light" style="margin:2px; background:yellow;">9</span>
  <span class="sr-only">Mensagens não lidas</span></b><img src="<?php echo $foto;?>" style="width:52px; height:38px; padding:0 8px; border-radius:50%;"></a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="perfil.php?cd=<?php echo $_SESSION['cd'];?>">Ver perfil</a>
      <a class="dropdown-item" href="chat.php?cd=<?php echo $_SESSION['cd'];?>">Chat<span class="badge badge-light" style="margin:2px; background:yellow;">9</span>
  <span class="sr-only">Mensagens não lidas</span></a>
      <a class="dropdown-item" href="../Php/sair.php">Sair</a>

    </div>

  </div>

    </div>

  </nav>
</div>


<!--fim do menu-->