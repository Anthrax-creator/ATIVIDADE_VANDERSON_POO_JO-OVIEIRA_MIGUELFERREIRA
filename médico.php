<?php

required onde "pessoa.php";

class Médico extends Pessoa {
    private $crm;
    private $especialidade;

    public function __construct($nome, $sexo, $nascimento, $crm, $especialidade) {
        parent::__construct($nome, $sexo, $nascimento);
        $this->crm = $crm;
        $this->especialidade-> $especialidade;
    }

    public function getCrm() {
        return $this->crm;
    }
    public function setCrm($crm) {
        $this->crm = $crm;
    }

    public function getNascimento() {
        return $this->nascimento;
    }
    public function setNascimento($nascimento) {
        $this->nascimento = $nascimento;
    }

}

?>