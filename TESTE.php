<?php

require_once "paciente.php";

$paciente = new Paciente("João", "Masculino", "2005-10-10", "Asma");

echo "Nome: " . $paciente->getNome() . "<br>";
echo "Sexo: " . $paciente->getSexo() . "<br>";
echo "Nascimento: " . $paciente->getNascimento() . "<br>";
echo "Enfermidades: " . $paciente->getEnfermidadesPreexistentes() . "<br>";

echo "". "<br>";

require_once "medico.php";

$medico = new Medico("Estevão", "Masculino", "2000-09-07", "12345", "Otorrino");

echo "Nome: " . $medico->getNome() . "<br>";
echo "Sexo: " . $medico->getSexo() . "<br>";
echo "Nascimento: " . $medico->getNascimento() . "<br>";
echo "Crm: " . $medico->getCrm() . "<br>";
echo "Especialidade: " . $medico->getEspecialidade() . "<br>";

?>