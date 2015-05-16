<?php

/**
 * Acesta clasa se ocupa de produse
 */
class Produse 
{

    private $id = NULL;
    //private $cod = NULL;
    public $nume;
    public $descriere;
    public $pret;
    public $stoc;
    public $img_url;
    public $caracteristici = array();
    public $categorie;
    //private $codDeBare;

    function __construct($id, $nume, $categorie, $img_url, $pret) 
    {
        $this->id=$id;
        $this->nume=$nume;
        $this->pret=$pret;
        $this->img_url=$img_url;
        $this->categorie=$categorie;
    }

    function Afiseaza_produs() 
    {
        $prod->nume = $this->nume;
        $prod->categorie = $this->categorie;
        $prod->pret = $this->pret;
        $prod->img_url = $this->img_url;
        /*echo "<div> <span> $this->nume </span>" .
        "<span> <a href='#'> $this->categorie</a> </span>" .
        "<span> $this->pret </span>"
        . "</div><br/>";*/
        
        return $prod;
    }
    
    function getProdusID()
    {
        $prodID = $this->id;
        return $prodID;
    }

}
