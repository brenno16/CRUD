<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar Funcionario');

use \App\Entity\Vaga;

$obVaga = new Vaga;


// Validação do POST
if(isset($_POST['nome'],$_POST['email'],$_POST['funcao'],$_POST['telefone'],$_POST['endereco'])){

    
    $obVaga -> nome = $_POST['nome'];
    $obVaga -> email = $_POST['email'];
    $obVaga -> funcao = $_POST['funcao'];
    $obVaga -> telefone = $_POST['telefone'];
    $obVaga -> endereco = $_POST['endereco'];
    $obVaga -> cadastrar();

    header('location: index.php?status=success');
    exit;

    //echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;

}

include __DIR__  .'/includes/header.php';
include __DIR__  .'/includes/formulario.php';
include __DIR__  .'/includes/footer.php';
