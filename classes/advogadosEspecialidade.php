<?php

    declare(strict_types=1);

    class AdvEspec{

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
         
        public function insert( $email, $id_espec) : int
        {
            $sql = 'INSERT INTO advogados_especialidade(id_adv, id_espec) VALUES(?, ?)';
           
            $prepare = $this->conexao->prepare($sql);

            include_once('Advogados.php');
            $user = new Advogados();
            
            $campo = $user->busca("SELECT id FROM advogados WHERE email = $email");
            foreach($campo as $campos);
            $id_adv = $campos['id'];

            $prepare->bindParam(1, $id_adv);
            $prepare->bindParam(2, $id_espec);
            $prepare->execute();

            return $prepare->rowCount();
        }

        public function delete($id_adv, $id_espec) : int
        {
            $sql = 'DELETE FROM advogados_especialidade WHERE id_adv = ? AND id_espec = ? ';

            $prepare = $this->conexao->prepare($sql); 

            $prepare->bindParam(1, $id_adv);
            $prepare->bindParam(2, $id_espec);
            $prepare->execute();

            return $prepare->rowCount();
        }

    }    

?>