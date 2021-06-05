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

        public function list() : array
        {
            $sql = 'SELECT * FROM advogados ORDER BY id ASC';

            $produtos = [];

            foreach($this->conexao->query($sql) as $valor)
            {
                //return 'Id: '.$valor['id'].'<br> Descrição: '.$valor['descricao'].'<br><hr>';
                array_push($produtos, $valor);
            }

            return $produtos;
        }

        public function insert( $nome, $telefone, $endereco, $cpf, $email, $sexo, $dtNasc, $senha, $especialidade, $oab) : int
        {
            $sql = 'INSERT INTO advogados(nome, telefone, endereco, cpf, email, sexo, dtNasc, senha, especialidade, oab) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
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
            $prepare->bindParam(9, $especialidade);
            $prepare->bindParam(10, $oab); 
            $prepare->execute();

            return $prepare->rowCount();
        }

        public function update(string $nome, $telefone, $endereco, $cpf, $email, $sexo, $dtNasc, $senha, $especialidade, $oab, $emailAtual) : int
        {
            $sql = 'UPDATE advogados SET nome = ?, telefone = ?, endereco = ?, cpf = ?, email = ?, sexo = ?, dtNasc = ?, senha = ?, especialidade = ?, oab = ? WHERE email = ?';

            $prepare = $this->conexao->prepare($sql); 

            $prepare->bindParam(1, $nome);
            $prepare->bindParam(2, $telefone);
            $prepare->bindParam(3, $endereco);
            $prepare->bindParam(4, $cpf);
            $prepare->bindParam(5, $email);
            $prepare->bindParam(6, $sexo);
            $prepare->bindParam(7, $dtNasc);
            $prepare->bindParam(8, $senha);
            $prepare->bindParam(9, $especialidade);
            $prepare->bindParam(10, $oab);
            $prepare->bindParam(11, $emailAtual);

            $prepare->execute();

            return $prepare->rowCount();
        }

        public function delete($email) : int
        {
            $sql = 'DELETE FROM advogados WHERE email = ?';

            $prepare = $this->conexao->prepare($sql); 

            $prepare->bindParam(1, $email);
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

        public function listFiltroEspecialidade($opcao) : array
        {
            //$sql = 'SELECT * FROM advogados WHERE especialidade = "Vara de familia" ORDER BY id ASC';
            $sql = 'SELECT * FROM advogados WHERE especialidade = "'.$opcao.'" ORDER BY id ASC';
            //$sql = 'SELECT * FROM advogados WHERE especialidade = "?" ORDER BY id ASC';

            $produtos = [];

            //$prepare = $this->conexao->prepare($sql); 

            //$prepare->bindParam(1, $opcao);
            //$prepare->execute();

            foreach($this->conexao->query($sql) as $valor)
            {
                array_push($produtos, $valor);
            }

            return $produtos;
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

            $produtos = [];

            foreach($this->conexao->query($sql) as $valor)
            {
                array_push($produtos, $valor);
            }

            return $produtos;
        }

    }    

?>