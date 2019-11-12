<?php
session_start();

class LoginAdm extends Db {
    static function checkAuth(){        
        if(!isset($_SESSION['login'])){
            header("Location:loginadmin.php");
        }
    }    
    
    function verificaLogin($admin){        
           
        $stmt = $this->conexao->prepare("SELECT * FROM adminstrador "
                . "WHERE senha = :senha AND email = :email");
 
        $stmt->bindValue(':senha', $admin->getSenha());
        $stmt->bindValue(':email', $admin->getEmail());
        $stmt->execute();
    
        $linha = $stmt->fetch();
        
        if($linha){
            $admin = new Admin();
            $admin->setNome($linha['nome']);
            $admin->setSenha($linha['senha']);
            $admin->setEmail($linha['email']);
            $admin->setId($linha['id']);
            
            $_SESSION['login'] = $admin;
            
            return $admin;
        }else {
            return false;
        }

    }