<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of U_Crud
 *
 * @author Desarrollo
 */
class U_Crud  {
    
    var $db=null;
    var $tabla=null;
    var $obj=null;
    public function __construct() {
        
    }
   public function init($database=null) {
       
        $this->CI = get_instance()                                            ;
        $this->db= $this->CI->load->database($database, TRUE);
        if($database!=null):
       // $this->db=$database                                                 ;
      //  var_dump($this);
        $this->CI->load->helper("sql_construct")                              ;
        else:
        show_error("Debe ud indicar el objeto BD",500,"Error U_Crud")   ;
        endif;
       
   }
   
   public function tabla($tabla) {
       $this->tabla=$tabla;
       
   }
   public function setobj($obj) {
       $this->obj=$obj;
       
   }
   
   
   public function columnas()
   {
       

$query = $this->db->query("select * from $this->tabla");
$string = "";
foreach ($query->result_array() as $row)
{
    foreach($row as $key=>$val){$string.="$key:$val,";}
}
//echo $string;

   }
   
   
   
   }
