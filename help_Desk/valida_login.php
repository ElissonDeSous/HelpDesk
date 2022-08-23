<?php
session_start();
$_SESSION['autenticado'];


$usuario_autenticado = false;
$usuario_ID = null;
$usuario_perfil_id = null;

// logins registrados para meu site de forma hard code
$Usuarios_relacao = array(
    array('id'=> 1,'Email'=> 'adm3663@gmail.com', 'senha'=> '123456','perfil_id'=>1),

    array('id'=> 2,'Email'=> 'Usuario123@gmail.com', 'senha'=> '1234','perfil_id'=>2),

    array('id'=> 3,'Email'=> 'elissonslayer@gmail.com', 'senha'=> '1234', 'perfil_id' => 2 ),
);
$perfis = array( 'Administrativo' => 1, 'Ususario' => 2 );
// veirficação se um dado e igual a outro, nesse caso se o dados do formulario e igual aos dados do logins registrado,usar foreach
foreach($Usuarios_relacao as $Usuario)
{
      if($Usuario['Email'] ==$_POST ['Email'] && $Usuario['senha'] == $_POST ['Senha'] )
      {
          $usuario_autenticado = true;
          $usuario_ID = $Usuario['id'];
          $usuario_perfil_id = $Usuario['perfil_id'];
      }
      if($usuario_autenticado == true)
      {
        echo('Usuario autenticado');
        $_SESSION  ['autenticado'] = 'Sim';
        $_SESSION['id'] = $usuario_ID;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
      
        header('location:home.php');
      }else{
        header('Location: index.php?login=erro');
        $_SESSION['autenticado'] = 'Nao';
      }
}
/*
 print_r($_GET);

 echo('<br>');
 echo $_GET ['Email'];
 echo('<br>');
 echo $_GET ['Senha'];
 

print_r($_POST);

 echo('<br>');
 echo $_POST ['Email'];
 echo('<br>');
 echo $_POST ['Senha'];
?>
*/
?>