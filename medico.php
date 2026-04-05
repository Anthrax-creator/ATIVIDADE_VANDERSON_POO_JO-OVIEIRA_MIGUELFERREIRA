<?php

require_once "pessoa.php";

class Medico extends Pessoa {
    private $crm;
    private $especialidade;

    public function __construct($nome, $sexo, $nascimento, $crm, $especialidade) {
        parent::__construct($nome, $sexo, $nascimento);
        $this->crm = $crm;
        $this->especialidade = $especialidade;
    }

    public function getCrm() {
        return $this->crm;
    }
    public function setCrm($crm) {
        $this->crm = $crm;
    }

    public function getEspecialidade() {
        return $this->nascimento;
    }
    public function setEspecialidade($especialidade) {
        $this->especialidade = $especialidade;
    }

}

?>