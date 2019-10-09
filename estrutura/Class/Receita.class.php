<?php

class Receita {
private $idreceita;
private $nomer;
private $formap;
private $ingredientes;
private $tempo;

function __construct($nomer,$formap,$ingredientes,$tempo,$idreceita = NULL){
    $this->idreceita = $idreceita;
    $this->nomer = $nomer;
    $this->formap = $formap;
    $this->ingredientes = $ingredientes;
    $this->tempo = $tempo;
}

function getIdreceita(){
    return $this->idreceita;
}
function getNomer(){
    return $this->nomer;
}
function getFormap(){
    return $this->formap;
}
function getIngredientes(){
    return $this->getIngredientes;
}
function getTempo(){
    return $this->getTempo;
}
function setIdreceita($idreceita) {
    $this->idreceita = $idreceita;
}

function setNomer($nomer) {
    $this->nomer = $nomer;
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

}