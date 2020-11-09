<?php
  // Definition des constantes et variables
  //define('LOGIN',$_POST['loginname']);
  $errorMessage = '';
  echo 'je suis dans auth';
  
  // Test de l'envoi du formulaire

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
        // On ouvre la session
        session_start();
        // On enregistre le login en session
        $_SESSION['login'] = LOGIN;
        
        header('Location:index.php');
        exit();
      }
    }
      else
    {
		echo 'erreur';
		header('Location:index.php');
      $errorMessage = 'Veuillez inscrire vos identifiants svp !';
    }
  }
  
?>