<?php
session_start();

class Login extends Db {
    static function checkAuth(){        
        if(!isset($_SESSION['login'])){
            header("Location:index.html");
        }
    }    
    
    function verificaLogin($usuario){        
           
        //busca nos usuarios
        $stmt = $this->conexao->prepare("SELECT * FROM usuario "
                . "WHERE senha = :senha AND email = :email");
 
        $stmt->bindValue(':senha', $usuario->getSenha());
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->execute();
    
        $linha = $stmt->fetch();

        
        //busca nos admins
        $stmt = $this->conexao->prepare("SELECT * FROM administrador "
        . "WHERE senha = :senha AND email = :email");

        $stmt->bindValue(':senha', $usuario->getSenha());
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->execute();

        $linhaadm = $stmt->fetch();
        
        if($linha){
            $usuario = new Usuario($linha['email'],$linha['nome'],$linha['senha'],$linha['id']);
            
            $_SESSION['login'] = $usuario;
            
            return 'user';
        }else {
            if($linhaadm){
                $adm = new Admin($linha['email'],$linha['nome'],$linha['senha'],$linha['idadm']);
                
                $_SESSION['login'] = $adm;
                
                return 'admin';
            }else{
            return false;}
        }

    }
}