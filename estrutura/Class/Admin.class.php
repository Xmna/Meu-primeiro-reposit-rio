<?php

class Usuario {
private $idadm;
private $nome;
private $email;
private $senha;

function __construct($nome,$email,$senha,$idadm = NULL){
    $this->idadm = $idadm;
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
}

function getIdadm(){
    return $this->idadm;
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
function setIdadm($idadm) {
    $this->idadm = $idadm;
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