<?php

setcookie('idioma',$_GET['idioma'],time()+(86400*30));

header('Location:restaurante.php');

?>