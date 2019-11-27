<?php

class ReceitaBanco extends Db{

    private $table = 'receita';

    public function insert($receita) {

        $stmt = $this->conexao->prepare("INSERT INTO {$this->table} (nomer, formap, ingredientes, tempo, pendente) 
        VALUES (:nomer, :formap, :ingredientes, :tempo, :pendente)");

        $stmt->bindValue(':nomer', $receita->getNomer());
        $stmt->bindValue(':formap', $receita->getFormap());
        $stmt->bindValue(':ingredientes', $receita->getIngredientes());
        $stmt->bindValue(':tempo', $receita->getTempo());
        $stmt->bindValue(':pendente', 1);
        echo("INSERT INTO {$this->table} (nomer, formap, ingredientes, tempo, pendente) 
        VALUES (:nomer, :formap, :ingredientes, :tempo, :pendente)");
        return $stmt->execute();
    }
    
    public function update($receita) {
        $stmt = $this->conexao->prepare("UPDATE {$this->table} "
                . "SET nomer=:nomer, formap = :formap, ingredientes =: ingredientes, tempo = :tempo 
                WHERE idreceita = :idreceita;");

        $stmt->bindValue(':idreceita', $receita->getIdreceita());
        $stmt->bindValue(':nomer', $receita->getFormap());
        $stmt->bindValue(':ingredientes', $receita->getIngredientes());
        $stmt->bindValue(':formap', $receita->getFormap());
        $stmt->bindValue(':tempo', $receita->getTempo());

        return $stmt->execute();
    }
    
    public function aceitar($receita) {
        $stmt = $this->conexao->prepare("UPDATE {$this->table} "
                . "SET pendente = :pendente
                WHERE idreceita = :idreceita;");

        $stmt->bindValue(':idreceita', $receita);
        $stmt->bindValue(':pendente', 0);

        return $stmt->execute();
    } 

    public function delete($idreceita) {
        $stmt = $this->conexao->prepare("DELETE FROM {$this->table} "
                . " WHERE idreceita = :idreceita");

        $stmt->bindValue(':idreceita', $idreceita);
        
        return $stmt->execute();
    }

    public function select() {
        $stmt = $this->conexao->prepare("SELECT * FROM $this->table WHERE pendente=0");
        $stmt->execute();

        $receitas = array();

        while ($linha = $stmt->fetch()) {
            $receita = new Receita($linha['nomer'],
            $linha['idcategoria'],
            $linha['formap'],
            $linha['ingredientes'],
            $linha['tempo'],
            "nulo",
            $linha['pendente'],
            $linha['idreceita']);

            $receitas[] = $receita;
        }
        return $receitas;
    }

    public function select_pendentes() {
        $stmt = $this->conexao->prepare("SELECT * FROM $this->table WHERE pendente=1");
        $stmt->execute();

        $receitas = array();

        while ($linha = $stmt->fetch()) {
            $receita = new Receita($linha['nomer'],
            $linha['idcategoria'],
            $linha['formap'],
            $linha['ingredientes'],
            $linha['tempo'],
            "nulo",
            $linha['pendente'],
            $linha['idreceita']);

            $receitas[] = $receita;
        }
        return $receitas;
    }

    public function selectById($idreceita) {
        $stmt = $this->conexao->prepare("SELECT * FROM $this->table WHERE idreceita = :idreceita");
        
        $stmt->bindValue(':idreceita', $idreceita);
        $stmt->execute();
        
        $linha = $stmt->fetch();

        $receita = new Receita();
        $receita->setNome($linha['nome']);
        $receita->setCateg($linha['idcategoria']);
        $receita->setFormap($linha['formap']);
        $receita->setIngredientes($linha['ingredientes']);
        $receita->setTempo($linha['tempo']);
        $receita->setPorc($linha['porc']);
        $receita->setPendente($linha['pendente']);
        $receita->setIdreceita($linha['idreceita']);
        
        return $receita;
    }
}
