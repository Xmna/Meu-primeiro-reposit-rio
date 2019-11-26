<?php

class Receita {
private $idreceita;
private $nomer;
private $categ;
private $formap;
private $ingredientes;
private $tempo;
private $porc;
private $pendente;

function __construct($nomer,$categ,$formap,$ingredientes,$tempo,$porc,$pendente=1,$idreceita = NULL){
    $this->idreceita = $idreceita;
    $this->nomer = $nomer;
    $this->categ = $categ;
    $this->formap = $formap;
    $this->ingredientes = $ingredientes;
    $this->tempo = $tempo;
    $this->porc = $porc;
    $this->pendente = $pendente;
}

function getIdreceita(){
    return $this->idreceita;
}
function getNomer(){
    return $this->nomer;
}
function getCateg(){
    return $this->categ;
}
function getFormap(){
    return $this->formap;
}
function getIngredientes(){
    return $this->ingredientes;
}
function getTempo(){
    return $this->tempo;
}
function getPorc(){
    return $this->porc;
}
function getPendente(){
    return $this->pendente;
}
function setIdreceita($idreceita) {
    $this->idreceita = $idreceita;
}

function setNomer($nomer) {
    $this->nomer = $nomer;
}

function setCateg($categ) {
    $this->categ = $categ;
}

function setFormap($formap) {
    $this->formap = $formap;
}

function setIngredientes($ingredientes) {
    $this->ingredientes = $ingredientes;

}
function setTempo($tempo) {
    $this->tempo = $tempo;

}

function setPorc($porc) {
    $this->porc = $porc;
}

function setPendente($pendente) {
    $this->pendente = $pendente;

}

}