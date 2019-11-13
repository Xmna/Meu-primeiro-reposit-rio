<?php
session_start();

class Login extends Db {
    static function checkAuth(){        
        if(!isset($_SESSION['login'])){
            header("Location:index.html");
        }
    }    
    
    function verificaLogin($usuario){        
           
        $stmt = $this->conexao->prepare("SELECT * FROM usuario "
                . "WHERE senha = :senha AND email = :email");
 
        $stmt->bindValue(':senha', $usuario->getSenha());
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->execute();
    
        $linha = $stmt->fetch();
        
        if($linha){
            $usuario = new Usuario($linha['email'],$linha['nome'],$linha['senha'],$linha['id']);
            
            $_SESSION['login'] = $usuario;
            
            return $usuario;
        }else {
            return false;
        }

    }
}