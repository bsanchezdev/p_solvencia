<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cur
 *
 * @author Desarrollo
 */
class cur extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->db_BI = $this->load->database('BI', TRUE);
    }
    
    public function show_todos_usuarios($tabla)
    {
         $r_c=$this->db_BI->query("select * from $tabla ")  ;
          return $r_c->result_array()                           ;
    }
    
    public function query($sql) {
        foreach ($sql as $key => $value) {
            $this->db_BI->query($value)  ;
        }
        
    }
    
    
    public function guardar($data,$data_original,$tabla)
            
    {
        $datos=array
            (
            "Grupo"     =>  $data[0],
            "Usuario"   =>  $data[1],
            "Rut"       =>  $data[2],
            "Nombre"    =>  $data[3],
            "Turno"     =>  $data[4],
            "Periodo"   =>  $data[5]
            );
        $this->db_BI->where('grupo', $data_original[0])->where('usuario', $data_original[1])->where('periodo', $data_original[5]);
        $this->db_BI->update($tabla, $datos); 
       
    }
    
    public function borrar($data_original,$tabla) {
        $datos=array
            (
            "Grupo"     =>  $data_original[0],
            "Usuario"   =>  $data_original[1],
            "Rut"       =>  $data_original[2],
            "Nombre"    =>  $data_original[3],
            "Turno"     =>  $data_original[4],
            "Periodo"   =>  $data_original[5]
            );
        $this->db_BI->where('grupo', $data_original[0])->where('usuario', $data_original[1])->where('periodo', $data_original[5]);
$this->db_BI->delete($tabla);
    }
    
    public function add($datos)
    {
        //var_dump($datos);
        $this->db_BI->query($datos[0]);
        ECHO "<script>alert('El Usuario fue creado correctamente');</script>";
    }
}
