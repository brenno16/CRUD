<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar Funcionario');

use \App\Entity\Vaga;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

//CONSULTA A VAGA
$obVaga = Vaga::getVaga($_GET['id']);

//VALIDAR A VAGA
if(!$obVaga instanceof Vaga){
    header('location: index.php?status=error');
    exit;
}

// Validação do POST
if(isset($_POST['nome'],$_POST['email'],$_POST['funcao'],$_POST['telefone'],$_POST['endereco'])){

    $obVaga -> nome = $_POST['nome'];
    $obVaga -> email = $_POST['email'];
    $obVaga -> funcao = $_POST['funcao'];
    $obVaga -> telefone = $_POST['telefone'];
    $obVaga -> endereco = $_POST['endereco'];
    $obVaga -> atualizar();


    header('location: index.php?status=success');
    exit;


}

include __DIR__  .'/includes/header.php';
include __DIR__  .'/includes/formulario.php';
include __DIR__  .'/includes/footer.php';
