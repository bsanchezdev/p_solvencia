<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Unrar
 *
 * @author Bsanchez
 */
class Rar {
    var $rar_path='C:\"Archivos de programa"\WinRAR\Rar.exe x -o+ "';
    public function __construct() {
    $this->CI =& get_instance(); 
    }
    
    public function unrar($path,$archivo) {
    $file       =   $path.$archivo                          ; //   echo $path;
    $string     =   $this->rar_path.$file.'" "'.$path.'"'   ; //e "\\199.69.69.93\interfaces_cedentes\Carga DW\Movistar\cobex_prorrogas_SOLVENCIA.rar" "\\199.69.69.93\interfaces_cedentes\Carga DW\Movistar"
    exec($string)                                           ;
    }
}
