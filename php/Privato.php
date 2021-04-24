<?php
class Privato{
    private $nome;
    private $cognome;
    private $indirizzoCompleto;
    private $codiceFiscale;
    private $numeroDiTelefono;

    public function __construct($cognome, $nome, $indirizzoCompleto, $codiceFiscale, $numeroDiTelefono){
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->indirizzoCompleto = $indirizzoCompleto;
        $this->codiceFiscale = $codiceFiscale;
        $this->numeroDiTelefono = $numeroDiTelefono;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getCognome(){
        return $this->cognome;
    }

    public function getIndirizzoCompleto(){
        return $this->indirizzoCompleto;
    }

    public function getCodiceFiscale(){
        return $this->codiceFiscale;
    }

    public function getNumeroDiTelefono(){
        return $this->numeroDiTelefono;
    }

    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }

    public function setCognome($cognome){
        $this->cognome = $cognome;
        return $this;
    }

    public function setIndirizzoCompleto($indirizzoCompleto){
        $this->indirizzoCompleto = $indirizzoCompleto;
        return $this;
    }

    public function setCodiceFiscale($codiceFiscale){
        $this->codiceFiscale = $codiceFiscale;
        return $this;
    }

    public function setNumeroDiTelefono($numeroDiTelefono){
        $this->numeroDiTelefono = $numeroDiTelefono;
        return $this;
    }
}
?>