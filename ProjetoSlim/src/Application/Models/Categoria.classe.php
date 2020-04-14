<?php
namespace App\Application\Models;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author fisherman
 */
class Categoria {
    
    private $idCategoria;
    private $nomeCategoria;
    
    
    function __construct() {
        
    }

     function getIdCategoria() {
        return $this->idCategoria;
    }

    function getNomeCategoria() {
        return $this->nomeCategoria;
    }

    function setIdCategoria(int $idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    function setNomeCategoria(string $nomeCategoria) {
        $this->nomeCategoria = $nomeCategoria;
    }

        //put your ide here
}
