<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<?php if (empty($_SESSION['login']))
{require 'login.php';} ?>
<?php
  $errorMessage = '';
  if(!empty($_POST)) 
  {
	  define('LOGIN',$_POST['loginname']);
    // Les identifiants sont transmis ?
    if(!empty($_POST['loginname']) ) 
    {
      // Sont-ils les mêmes que les constantes ?
      if($_POST['loginname'] !== LOGIN) 
      {
        $errorMessage = 'Mauvais login !';
      }
        else
      {
        // On enregistre le login en session
        $_SESSION['login'] = LOGIN;
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
      }
    }
      else
    {
		  $errorMessage = 'Veuillez inscrire vos identifiants svp !';
    }
}
  
?>
 <?php 
		if (!empty($_SESSION['login'])){?>
<section class="cookies container-fluid">
    <div class="row">
	<?php foreach ($catalog as $id => $cookie) {?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
	<?php }?>
    </div>
</section>
<?php } echo $errorMessage;?>

<?php require 'inc/foot.php'; ?>
