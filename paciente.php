<?php

require_once "pessoa.php";

class Paciente extends Pessoa {
    private $enfermidadesPreexistentes

    public function __construct($nome, $sexo, $nascimento, $enfermidadesPreexistentes) {
        parent::__construct($nome, $sexo, $nascimento);
        $this->enfermidadesPreexistentes = $enfermidadesPreexistentes;
    }

    public function getEnfermidadesPreexistentes() {
        return $this->enfermidadesPreexistentes;
    }
    public function setEnfermidadesPreexistentes($enfermidadesPreexistentes) {
        $this->enfermidadesPreexistentes = $EnfermidadesPreexistentes;
    }

}

?>