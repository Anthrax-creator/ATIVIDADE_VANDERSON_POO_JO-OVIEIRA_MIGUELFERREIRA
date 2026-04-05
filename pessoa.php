<?php

class Pessoa {
    protected $nome;
    protected $sexo;
    protected $nascimento;

    public function __construct($nome, $sexo, $nascimento) {
        $this->nome = $nome;
        $this->sexo = $sexo;
        $this->nascimento = $nascimento;    
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getNascimento() {
        return $this->nascimento;
    }

    public function setNascimento($nascimento) {
        $this->nascimento = $nascimento;
    }

}

?>