<?php

    declare(strict_types=1);

    class Advogados{

        /**
         * @var PDO
         */
        private $conexao;

        public function __construct()
        {

            $host = 'localhost';
            $dbname = 'advocacia';
            $user = 'root';
            $pass = '';

            try
            {
                $this->conexao = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $pass);
            }catch(Exception $e)
            {
                $e->getMessage();
                die();
            }

            return $this->conexao;
        }

        public function list($campo) : array
        {
            $sql = 'SELECT * FROM advogados ORDER BY '.$campo.' ASC';

            $produtos = [];

            foreach($this->conexao->query($sql) as $valor)
            {
                //return 'Id: '.$valor['id'].'<br> Descrição: '.$valor['descricao'].'<br><hr>';
                array_push($produtos, $valor);
            }

            return $produtos;
        }

        public function insert( $nome, $telefone, $endereco, $cpf, $email, $sexo, $dtNasc, $senha, $oab) : int
        {
            $sql = 'INSERT INTO advogados(nome, telefone, endereco, cpf, email, sexo, dtNasc, senha, oab) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)';
            //$sql = 'INSERT INTO advogados(nome, telefone, endereco, cpf, email, sexo, dtNasc, senha, especialidade, oab) VALUES('.$nome.','. $telefone.','. $endereco.','. $cpf.','. $email.','. $sexo.','. $dtNasc.','. $senha.','. $especialidade.','. $oab.')';

            $prepare = $this->conexao->prepare($sql);

            $prepare->bindParam(1, $nome);
            $prepare->bindParam(2, $telefone);
            $prepare->bindParam(3, $endereco);
            $prepare->bindParam(4, $cpf);
            $prepare->bindParam(5, $email);
            $prepare->bindParam(6, $sexo);
            $prepare->bindParam(7, $dtNasc);
            $prepare->bindParam(8, $senha);
            $prepare->bindParam(9, $oab); 
            $prepare->execute();

            return $prepare->rowCount();
        }

        public function update(string $nome, $telefone, $endereco, $cpf, $email, $sexo, $dtNasc, $senha, $oab, $emailAtual) : int
        {
            $sql = 'UPDATE advogados SET nome = ?, telefone = ?, endereco = ?, cpf = ?, email = ?, sexo = ?, dtNasc = ?, senha = ?, oab = ? WHERE email = ?';

            $prepare = $this->conexao->prepare($sql); 

            $prepare->bindParam(1, $nome);
            $prepare->bindParam(2, $telefone);
            $prepare->bindParam(3, $endereco);
            $prepare->bindParam(4, $cpf);
            $prepare->bindParam(5, $email);
            $prepare->bindParam(6, $sexo);
            $prepare->bindParam(7, $dtNasc);
            $prepare->bindParam(8, $senha);
            $prepare->bindParam(9, $oab);
            $prepare->bindParam(10, $emailAtual);

            $prepare->execute();

            return $prepare->rowCount();
        }

        public function delete($id) : int
        {
            $sql = 'DELETE FROM advogados WHERE id = ?';

            $prepare = $this->conexao->prepare($sql); 

            $prepare->bindParam(1, $id);
            $prepare->execute();

            return $prepare->rowCount();
        }

        //CRIADO POR MIM
        public function logar($email , $senha) : int
        {
            $sql = 'SELECT email, senha FROM advogados WHERE email = ? AND senha = ?';

            $prepare = $this->conexao->prepare($sql); 

            $prepare->bindParam(1, $email);
            $prepare->bindParam(2, $senha);
            $prepare->execute();

            return $prepare->rowCount();
        }

        public function conferirSessao() : ?string
        {   
            @session_start();

            if(@$_SESSION['logado'] != 1)
            {
                return 'Não está logado';   
            }
            else if(@$_SESSION['logado'] == 1 AND @$_SESSION['email'] != 'admin@admin.com.br') 
            {
                return 'Logado';
            }
            else
            {
                return 'Admin';
            }
     
        }

        public function busca($query) : array
        {
            $sql = $query;

            

            foreach($this->conexao->query($sql) as $valor)
            {
                $produtos = $valor;
            }

            return $produtos;
        }

    }    

?>