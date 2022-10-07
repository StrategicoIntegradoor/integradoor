<?php

if ($_SESSION["rol"] != 1 && $_SESSION["rol"] != 2) {

    echo '<script>

    window.location = "inicio";

  </script>';

    return;
}

?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3 form-group">
       
       
        </div>
    </div>
</div>

<script src="vistas/js/invalidarPesadoDemo.js?v=<?php echo (rand()); ?>"></script>

