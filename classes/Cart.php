<?php

/**
 * Clasa Basket care salveaza produsele alese de utilizator si le salveaza in sesiune/cookies
 * O clasa folosita pentru a adauga sau sterge produse dintr-o sesiune/cookie-uri
 *
 * @author BogdanD
 */

class Cart { 

    public $cookieName = 'cosCumparaturi'; 
    public $cookieExpire = 86400; // 1 zi
    public $saveCookie = TRUE; 

    /** 
     * ShoppingBasket::__construct() 
     * 
     * Construct function. Parses cookie if set. 
     * @return 
     */ 
    function __construct() { 

        if(!isset($_SESSION)){
            session_start();
        }

        if (!isset($_SESSION['cos']) && (isset($_COOKIE[$this->cookieName]))) { 
            $_SESSION['cos'] = unserialize(base64_decode($_COOKIE[$this->cookieName])); 
        } 

    } 

    /*
     * Adauga produse in cos. Daca id-ul exista deja, se va actualiza doar cantitatea 
     */
    function Adauga_in_cos($id, $nume, $pret, $qty = 1) { 

        if (isset($_SESSION['cos'][$id])) { 
            $_SESSION['cos'][$id]['cantitate'] = $_SESSION['cos'][$id]['cantitate'] + $qty; 
        } else { 
            $_SESSION['cos'][$id] = array(
                                    'id' => $id,
                                    'nume'=> $nume, 
                                    'pret' => $pret, 
                                    'cantitate'=> $qty
                                    ); 
        } 
        $this->Seteaza_Cookie(); 
        return true; 
    } 

    
    /*
     * Scoate produse din cos. Daca cantitaea este mai mica decat 1, produsul va fi eliminat definitiv.
     */
    function Scoate_din_cos($id, $qty = 1) { 
        if (isset($_SESSION['cos'][$id])) { 
            $_SESSION['cos'][$id]['cantitate'] = $_SESSION['cos'][$id]['cantitate'] - $qty; 
        } 

        if ($_SESSION['cos'][$id]['cantitate'] <= 0) { 
            $this->Sterge_din_cos($id); 
        } 
        
        $this->Seteaza_Cookie(); 
        return true; 
        //exit(); 
    } 

    /*
     * Sterge produsul din cos definitiv
     */
    function Sterge_din_cos($id) { 
        unset($_SESSION['cos'][$id]); 
        $this->Seteaza_Cookie(); 
        return true; 
        //exit(); 
    } 


    /*
     * Afiseaza continutul cosului de cumparaturi
     * returneaza array sau false
     */
    function Get_Cos() { 
        if (isset($_SESSION['cos'])) { 
            foreach ($_SESSION['cos'] as $k => $v) { 
                $prodArray[$k] = $v; 
            } 
            return $prodArray; 
            exit(); 
        } else { 
            return false; 
        } 
    } 
    
    function Calculeaza_Cost_Total() {
        $allProds = $this->Get_Cos();
        $totalValue=0;

        if($allProds) {
            foreach($allProds as $item) {
                $totalValue += $item['cantitate']*$item['pret'];
            }
        }
        return $totalValue;
    }
    
    /*
     * Actualizeaza un produs existent in cos cu o cantitate preluata ca argument
     * returneaza bool
     */
    function Actualizeaza_Cos($id, $qty) { 

        $qty = ($qty == '') ? 0 : $qty; 

        if (isset($_SESSION['cos'][$id])) { 
            $_SESSION['cos'][$id]['cantitate'] = $qty; 

            if ($_SESSION['cos'][$id]['cantitate'] <= 0) { 
                $this->Sterge_din_cos($id); 
                return true; 
                exit(); 
            } 
            $this->Seteaza_Cookie(); 
            return true; 
            exit(); 

        } else { 
            return false; 
        } 

    } 

    /*
     * Returneaza numarul de produsedin cos
     */ 
    function Nr_Produse_Cos() { 
        if (isset($_SESSION['cos'])) { 
            $qty = 0; 
            foreach ($_SESSION['cos'] as $item) { 
                $qty = $qty + $item; 
            } 
            return $qty; 
        } else { 
            return 0; 
        } 
    } 

    /** 
     * Goleste sesiunea 'cos'
     */ 
    function Goleste_Cos() { 
        if(isset($_SESSION)){
            unset($_SESSION['cos']); 
        }
        $this->Seteaza_Cookie(); 
        return true; 
    } 

  /**  
   * Creeaza un cookie cu produsele actuale din cos
   */ 
    function Seteaza_Cookie() { 

        if ($this->saveCookie) { 
            $string = base64_encode(serialize($_SESSION['cos'])); 
            setcookie($this->cookieName, $string, time() + $this->cookieExpire, '/'); 
            return true; 
        } 
        
        return false; 
    } 
    
    function Salveaza_Cookie($bool = TRUE) { 
        $this->saveCookie = $bool; 
        return true; 
    } 

} 

