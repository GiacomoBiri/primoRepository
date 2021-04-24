<?php
    require_once("Prodotto.php");
    require_once("Riga.php");
    require_once("Fattura.php");
    require_once("Privato.php");
    require_once("Azienda.php");

    $venditore = new Azienda("Negozio di scarpe", "Viale Garibaldi 5", 12345678901, 2095843920, "https://c.static-nike.com/a/images/w_1920,c_limit/mdbgldn6yg1gg88jomci/image.jpg");
    $acquirente = new Privato("Giancarlotto", "Gianni", "Via del pino 43", "FSD423DFS32F", 2947503859);
    //$acquirente = new Azienda("Negozio di vestiti", "Viale Mazzini 25", 10987654321, 5843209920, null);
    $fattura = new Fattura($acquirente, $venditore, "2021", "02/04/2021", 65, "Assegno");
    
    $prodotto = new Prodotto(1, "È il prodotto migliore esistente", 55);
    $prodotto2 = new Prodotto(2, "È il secondo prodotto migliore esistente", 545);
    $prodotto3 = new Prodotto(3, "È il terzo prodotto migliore esistente", 73);
    $prodotto4 = new Prodotto(4, "È il quarto prodotto migliore esistente", 5);
    $prodotto5 = new Prodotto(5, "È il quinto prodotto migliore esistente", 23);
    $prodotto6 = new Prodotto(6, "È il sesto prodotto migliore esistente", 90);

    $fattura->addRiga(new Riga($prodotto, 4, 22, 10));
    $fattura->addRiga(new Riga($prodotto2, 43, 0, 22));
    $fattura->addRiga(new Riga($prodotto3, 1, 0, 4));
    $fattura->addRiga(new Riga($prodotto4, 48, 2, 13));
    $fattura->addRiga(new Riga($prodotto5, 5, 42, 4));
    $fattura->addRiga(new Riga($prodotto6, 6, 0, 22));
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Fattura</title>
    </head>
    <body>
    <!-- intestazione-->
        <div>
            <table>
                <tr>
                    <td><img src=<?= "'".$fattura->getVenditore()->getLogo()."'"?> id='logo' ></td>
                    <td><h1><?=$fattura->getVenditore()->getRagioneSociale()?></h1></td>
                </tr>
            </table>
        </div>
    <!-- dati venditore e compratore-->
        <div>
            <table>
                <tr>
                    <td>
                        <!-- venditore -->
                        <div id='bg'>
                            <h3>Venditore</h3>
                            <p>Ragione sociale: <?=$fattura->getVenditore()->getRagioneSociale()?></p>
                            <p>Indirizzo completo: <?=$fattura->getVenditore()->getIndirizzoCompleto()?></p>
                            <p>Partita iva: <?=$fattura->getVenditore()->getPartitaIva()?></p>
                            <p>Numero di telefono: <?=$fattura->getVenditore()->getNumeroDiTelefono()?></p>
                        </div>
                    </td>
                    <td>
                        <!-- acquirente -->
                        <div id='bg'>
                            <h3>Acquirente</h3>
                            <?php
                                if(get_class($fattura->getAcquirente())=="Privato"){
                                    echo "<p>Nome: ".$fattura->getAcquirente()->getNome()."</p>";
                                    echo "<p>Cognome: ".$fattura->getAcquirente()->getCognome()."</p>";
                                    echo "<p>Indirizzo completo: ".$fattura->getAcquirente()->getIndirizzoCompleto()."</p>";
                                    echo "<p>Codice fiscale: ".$fattura->getAcquirente()->getCodiceFiscale()."</p>";
                                    echo "<p>Numero di telefono: ".$fattura->getAcquirente()->getNumeroDiTelefono()."</p>";
                                } else{
                                    echo "<p>Ragione sociale: ".$fattura->getAcquirente()->getRagioneSociale()."</p>";
                                    echo "<p>Indirizzo completo: ".$fattura->getAcquirente()->getIndirizzoCompleto()."</p>";
                                    echo "<p>Partita iva: ".$fattura->getAcquirente()->getPartitaIva()."</p>";
                                    echo "<p>Numero di telefono: ".$fattura->getAcquirente()->getNumeroDiTelefono()."</p>";
                                }
                            ?>
                        </div>
                    </td>
                </tr>
                <!-- data, numero fattura e data fattura -->
                <tr>
                    <td>
                    <div id='bg'>
                        <h4>Anno fattura</h4>
                        <p><?=$fattura->getData()?></p>
                    </div>
                    </td>
                    <td>
                    <div id='bg'>
                        <h4>Numero fattura</h4>
                        <p><?=$fattura->getNumeroFattura()?></p>
                    </div>
                    </td>
                    <td>
                    <div id='bg'>
                        <h4>Data</h4>
                        <p><?=$fattura->getDataFattura()?></p>
                    </div>
                    </td>
                </tr>
            </table>
        </div>
        <!-- Prodotti-->
        <div>
            <table id='tabella'>
                <tr><th>Codice Prodotto</th><th>Descrizione</th><th>Quantità</th><th>Prezzo unitario</th><th>Sconto</th><th>Importo</th><th>Iva</th></tr>
                <?php
                    //stampa prodotti
                    foreach($fattura->getRighe() as $riga){
                        echo "<tr id='tabella'><td id='tabella'>".$riga->getProdotto()->getCodice()."</td>";
                        echo "<td id='tabella'>".$riga->getProdotto()->getDescrizione()."</td>";
                        echo "<td id='tabella'>".$riga->getQuantita()."</td>";
                        echo "<td id='tabella'>".$riga->getProdotto()->getPrezzoDiVendita()."</td>";
                        echo "<td id='tabella'>".$riga->getSconto()."%</td>";
                        printf("<td id='tabella'>%.2f</td>", $riga->getImporto());
                        //echo "<td></td>";
                        echo "<td id='tabella'>".$riga->getIva()."%</td></tr>";
                    }
                ?>
                <!-- dati finali-->
                <tr id='tabella'>
                    <td colspan="5" id='tabella'>Imponibile</td>
                    <td id='tabella'>
                        <?php
                            printf("%.2f", $fattura->getImponibile());
                        ?>
                    </td >
                    <td id='tabella'></td>
                </tr>
                <tr id='tabella'>
                    <td id='tabella' colspan="5">Imposta iva</td>
                    <td id='tabella'>
                        <?php
                            printf("%.2f", $fattura->getImpostaIva());
                        ?>
                    </td>
                    <td id='tabella'></td>
                </tr>
                <tr id='tabella'>
                    <td colspan="5" id='tabella'>Importo totale</td>
                    <td id='tabella'>
                        <?php
                            printf("%.2f", $fattura->getTotaleFattura());
                        ?>
                    </td>
                    <td id='tabella'></td>
                </tr>
            </table>
        </div>
        <p>Metodo di pagamento: <?= $fattura->getModalitaDiPagamento()?></p>
    </body>
</html>