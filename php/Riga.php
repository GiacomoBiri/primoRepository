<?php
class Riga{
    private $prodotto;
    private $quantita;
    private $sconto;
    private $iva;

    public function __construct($prodotto, $quantita, $sconto, $iva){
        $this->prodotto = $prodotto;
        $this->quantita = $quantita;
        $this->sconto = $sconto;
        $this->iva = $iva;
    }

    public function getProdotto(){
        return $this->prodotto;
    }

    public function getQuantita(){
        return $this->quantita;
    }

    public function getSconto(){
        return $this->sconto;
    }

    public function getIva(){
        return $this->iva;
    }

    public function getImporto(){
        return ($this->prodotto->getPrezzoDiVendita() - ( $this->prodotto->getPrezzoDiVendita()* $this->sconto /100)) * $this->quantita ;
    }

    public function setProdotto($prodotto){
        $this->prodotto = $prodotto;
        return $this;
    }

    public function setQuantita($quantita){
        $this->quantita = $quantita;
        return $this;
    }

    public function setSconto($sconto){
        $this->sconto = $sconto;
        return $this;
    }

    public function setIva($iva){
        $this->iva = $iva;
        return $this;
    }
}
?>