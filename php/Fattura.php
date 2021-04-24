<?php
class Fattura{
    private $acquirente;
    private $venditore;
    private $data;
    private $dataFattura;
    private $numeroFattura;
    private $modalitaDiPagamento;
    private $righe; 
    private $indice;

    public function __construct($acquirente, $venditore, $data, $dataFattura, $numeroFattura, $modalitaDiPagamento){
        $this->acquirente = $acquirente;
        $this->venditore = $venditore;
        $this->data = $data;
        $this->dataFattura = $dataFattura;
        $this->numeroFattura = $numeroFattura;
        $this->modalitaDiPagamento = $modalitaDiPagamento;
        $this->indice=0;
        $this->righe = [];
    }

    public function getAcquirente(){
        return $this->acquirente;
    }

    public function getVenditore(){
        return $this->venditore;
    }

    public function getData(){
        return $this->data;
    }

    public function getDataFattura(){
        return $this->dataFattura;
    }

    public function getNumeroFattura(){
        return $this->numeroFattura;
    }

    public function getModalitaDiPagamento(){
        return $this->modalitaDiPagamento;
    }

    public function getImponibile(){
        $imponibile = 0;
        foreach($this->righe as $riga){
            $imponibile += $riga->getImporto();
        }
        return $imponibile;
    }

    public function getImpostaIva(){
        $impostaIva = 0;
        foreach($this->righe as $riga){
            $impostaIva += $riga->getImporto() * $riga->getIva() / 100;
        }
        return $impostaIva;
    }

    public function getTotaleFattura(){
        return $this->getImpostaIva() + $this->getImponibile();
    }

    public function getRighe(){
        return $this->righe;
    }

    public function setAcquirente($acquirente){
        $this->acquirente = $acquirente;
        return $this;
    }

    public function setVenditore($venditore){
        $this->venditore = $venditore;
        return $this->venditore;
    }

    public function setData($data){
        $this->data = $data;
        return $this;
    }

    public function setDataFattura($dataFattura){
        $this->dataFattura = $dataFattura;
        return $this;
    }

    public function setNumeroFattura($numeroFattura){
        $this->numeroFattura = $numeroFattura;
        return $this;
    }

    public function setModalitaDiPagamento($modalitaDiPagamento){
        $this->modalitaDiPagamento = $modalitaDiPagamento;
        return $this;
    }

    public function addRiga($riga){
        $this->righe[$this->indice] = $riga;
        $this->indice = $this->indice +1;
        return $this;
    }
}
?>
