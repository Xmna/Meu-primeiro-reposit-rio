<?php

class ReceitaBanco extends Db{

    private $table = 'receita';

    public function insert($receita) {

        $stmt = $this->conexao->prepare("INSERT INTO {$this->table} (nomer, formap, ingredientes, tempo) VALUES (:nomer, :formap, :ingredientes, :tempo)");

        $stmt->bindValue(':nomer', $receita->getNomer());
        $stmt->bindValue(':formap', $receita->getFormap());
        $stmt->bindValue(':ingredientes', $receita->getIngredientes());
        $stmt->bindValue(':tempo', $receita->getTempo());
        echo("INSERT INTO {$this->table} (nomer, formap, ingredientes, tempo) VALUES (:nomer, :formap, :ingredientes, :tempo)");
        return $stmt->execute();
    }
    
    public function update($usuario) {
        $stmt = $this->conexao->prepare("UPDATE {$this->table} "
                . "SET nome=:nome, senha = :senha, email = :email WHERE id = :id;");

        $stmt->bindValue(':id', $usuario->getIdusuario());
        $stmt->bindValue(':nome', $usuario->getNome());
        $stmt->bindValue(':senha', $usuario->getSenha());
        $stmt->bindValue(':email', $usuario->getEmail());

        return $stmt->execute();
    }    

    public function delete($usuario) {
        $stmt = $this->conexao->prepare("DELETE FROM {$this->table} "
                . " WHERE idusuario = :idusuario");

        $stmt->bindValue(':idusuario', $usuario->getIdusuario());
        
        return $stmt->execute();
    }

    public function select() {
        $stmt = $this->conexao->prepare("SELECT * FROM $this->table");
        $stmt->execute();

        $usuarios = array();

        while ($linha = $stmt->fetch()) {
            $usuario = new Usuario();
            $usuario->setNome($linha['nome']);
            $usuario->setSenha($linha['senha']);
            $usuario->setEmail($linha['email']);
            $usuario->setIdusuario($linha['idusuario']);

            $usuarios[] = $usuario;
        }
        return $usuarios;
    }

    public function selectById($usuario) {
        $stmt = $this->conexao->prepare("SELECT * FROM $this->table WHERE idusuario = :idusuario");
        
        $stmt->bindValue(':id', $usuario->getIdusuario());
        $stmt->execute();
        
        $linha = $stmt->fetch();

        $usuario = new Usuario();
        $usuario->setNome($linha['nome']);
        $usuario->setSenha($linha['senha']);
        $usuario->setEmail($linha['email']);
        $usuario->setIdusuario($linha['id']);
        
        return $usuario;
    }
}
