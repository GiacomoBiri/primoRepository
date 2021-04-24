<?php
class Prodotto {
    private $codice;
    private $descrizione;
    private $prezzoDiVendita;

    public function __construct($codice, $descrizione, $prezzoDiVendita){
        $this->codice = $codice;
        $this->descrizione = $descrizione;
        $this->prezzoDiVendita = $prezzoDiVendita;
    }

    public function setCodice($codice){
        $this->codice = $codice;
        return $this;
    }

    public function setDescrizione($descrizione){
        $this->descrizione = $descrizione;
        return $this;
    }

    public function setPrezzoDiVendita($prezzoDiVendita){
        $this->prezzoDiVendita = $prezzoDiVendita;
        return $this;
    }

    public function getCodice(){
        return $this->codice;
    }

    public function getDescrizione(){
        return $this->descrizione;
    }

    public function getPrezzoDiVendita(){
        return $this->prezzoDiVendita;
    }

    public function __toString(){
        //return "Il codice è $this->getCodice(), la descrizione è $this->getDescrizione(), l'aliquota è $this->getAliquota(), il prezzo di vendita è $this->getPrezzoDiVendita()";
        return "Il codice è {$this->getCodice()} la descrizione è {$this->getDescrizione()} il prezzo di vendita è {$this->getPrezzoDiVendita()}";
    }
}
?>