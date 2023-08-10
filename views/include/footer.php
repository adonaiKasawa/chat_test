<script src="<?= URL ?>public/assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="<?=URL ?>public/assets/jquery/jquery.3.6.0.js" ></script>
</body>
</html>

<?php
if (isset($this->js)) {
  foreach ($this->js as $js) {
    echo '<script src="' . URL . 'views/' . $js . '"></script>';
  }
}
?>