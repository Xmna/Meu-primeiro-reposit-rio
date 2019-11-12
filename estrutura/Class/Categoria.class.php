<?php

class Categoria{
private $idcategoria;
private $nome;
}

function __construct($nome, $idcategoria = NULL){
    $this -> nome = $nome;
    $this -> idcategoria = $idcategoria;
}
function getIdcategoria(){
    return $this->idcategoria;
}
function getNome(){
    return $this->nome;
}
function setIdcategoria($idcategoria) {
    $this->idcategoria = $idcategoria;
}

function setNome($nome) {
    $this->nome = $nome;
}