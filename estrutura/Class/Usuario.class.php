<?php

class Usuario {
private $idsuario;
private $nome;
private $email;
private $senha;

function __construct($nome,$email,$senha,$idsuario = NULL){
    $this->idusuario = $idsuario;
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
}

function getIdusuario(){
    return $this->idusuario;
}
function getNome(){
    return $this->nome;
}
function getEmail(){
    return $this->email;
}
function getSenha(){
    return $this->senha;
}
function setIdusuario($idusuario) {
    $this->idusuario = $idusuario;
}

function setNome($nome) {
    $this->nome = $nome;
}

function setEmail($email) {
    $this->email = $email;
}

function setSenha($senha) {
    $this->senha = $senha;

}

}