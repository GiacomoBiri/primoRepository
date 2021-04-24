<?php
class Azienda{
    private $ragioneSociale;
    private $logo;
    private $indirizzoCompleto;
    private $partitaIva;
    private $numeroDiTelefono;

    public function __construct($ragioneSociale, $indirizzoCompleto, $partitaIva, $numeroDiTelefono, $logo){
        $this->ragioneSociale = $ragioneSociale;
        $this->indirizzoCompleto = $indirizzoCompleto;
        $this->partitaIva = $partitaIva;
        $this->numeroDiTelefono = $numeroDiTelefono;
        $this->logo=$logo;
    }

    public function getRagioneSociale(){
        return $this->ragioneSociale;
    }

    public function getLogo(){
        return $this->logo;
    }

    public function getIndirizzoCompleto(){
        return $this->indirizzoCompleto;
    }

    public function getPartitaIva(){
        return $this->partitaIva;
    }

    public function getNumeroDiTelefono(){
        return $this->numeroDiTelefono;
    }

    public function setRagioneSociale($ragioneSociale){
        $this->ragioneSociale = $ragioneSociale;
        return $this;
    }

    public function setLogo($logo){
        $this->logo=$logo;
        return $this;
    }

    public function setIndirizzoCompleto($indirizzoCompleto){
        $this->indirizzoCompleto = $indirizzoCompleto;
        return $this;
    }

    public function setPartitaIva($partitaIva){
        $this->partitaIva = $partitaIva;
        return $this;
    }

    public function setNumeroDiTelefono($numeroDiTelefono){
        $this->numeroDiTelefono = $numeroDiTelefono;
        return $this;
    }
}
?>