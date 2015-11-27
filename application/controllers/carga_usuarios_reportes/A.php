<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of A
 *
 * @author Desarrollo
 */
class A extends CI_Controller{
    public function __construct() {
        parent::__construct();
         $this->load->helper("sql_construct")                              ;
        $this->load->helper("url")                                        ;
        $this->load->helper("form")                                        ;
         $this->load->helper("bootstrap")                              ;
        $this->load->model("carga_usuarios_reportes/cur");
    }
    
    public function index() {
   
        $columnas=array("1"=>"GRUPO","2"=>"USUARIO","3"=>"RUT","4"=>"NOMBRE","5"=>"TURNO","6"=>"PERIODO");
        $data["columnas"]=$columnas;
        $data["id_tab"]="usuarios";
        $data["count"]=0;
        $data["data_tabla"]=$this->cur->show_todos_usuarios('T_Usuarios');
   
   
   $this->load->view("show_tabla",$data);
    }
    
    
        public function importarExcel(){
    	//Cargar PHPExcel library
        $this->load->library('excel');
    	$name   = $_FILES['userfile']['name'];
     	$tname  = $_FILES['userfile']['tmp_name'];
        $obj_excel = PHPExcel_IOFactory::load($tname);       
       	$sheetData = $obj_excel->getActiveSheet()->toArray(null,true,true,true);
        $sheet_names=$obj_excel->getSheetNames();
        foreach ($sheet_names as $key => $hoja) {
         //   echo $hoja."<br>";
     
       // var_dump($sheet_names);
        $sheetData =$obj_excel->getSheetByName($hoja)->toArray(null,true,true,true);
   //     echo $hoja;
        $this->data[$hoja]=$sheetData;
       	$arr_datos = array();
     //   var_dump($sheetData);
       /*	foreach ($sheetData as $index => $value) {            
            if ( $index != 1 ){
                $arr_datos = array(
                    'campo'  => $value['A'],
                    'campo1'  =>  $value['B'],
                    'campo2' =>  $value['C'],
                    'campo3'  =>  $value['D'],                                        
                ); 
          //      var_dump($sheetData);
             //   var_dump($value);
		foreach ($arr_datos as $llave => $valor) {
			$arr_datos[$llave] = $valor;
		}
		//$this->db->insert('example_table',$arr_datos);	
            } 
       	}*/
       	$result['valid'] = true;
	$result['message'] = 'Productos importados correctamente';
	//$this->output
    	  //   ->set_content_type('application/json')
    	   //  ->set_output(json_encode($result)); 	
        
       
    }
    $this->insertar(); 
    }
    
    protected function insertar()
    {
        $this->index();
        foreach ($this->data as $key => $array) {
            unset($array[1]);
            echo $key;
        //    var_dump(construir_array_de_inserts($array,"T_Usuarios"));
            $this->cur->query(construir_array_de_inserts($array,"T_Usuarios"));
           
        }
        
        //  var_dump($this->data["movistar"]);
       // var_dump(construir_array_de_inserts($this->data["movistar"]));
    }
    
    public function seleccion()
    {
      //  var_dump($_POST);
        $datax= trim($_POST["data"],"|"); 
        $data["data_original"]=$datax;
             $data["data"]      =   explode("|", $datax);
             $data["labels"]    =   array("0"=>"Grupo","1"=>"Usuario","2"=>"Rut","3"=>"Nombre","4"=>"Turno","5"=>"Periodo");
             
        $this->load->view('modal_edit_usuarios/edit',$data);
    }
    public function add()
    {
      //  var_dump($_POST);
             $data["labels"]    =   array("0"=>"Grupo","1"=>"Usuario","2"=>"Rut","3"=>"Nombre","4"=>"Turno","5"=>"Periodo");
             
        $this->load->view('modal_edit_usuarios/add',$data);
    }
    public function guardar() {
       // var_dump($_POST);
    $data= trim($_POST["data"],"|"); 
    $data_original= trim($_POST["original"],"|"); 
             $data_original=  explode("|", $data_original);
    
             $data=  explode("|", $data);
             $labels=array("0"=>"Grupo","1"=>"Usuario","2"=>"Rut","3"=>"Nombre","4"=>"Turno","5"=>"Periodo");
             $this->cur->guardar($data,$data_original,"T_Usuarios");
    }
    
    public function borrar()
    {
        //var_dump($_POST);
         $datos= trim($_POST["datos"],"|"); 
         $datos=  explode("|", $datos);
         $this->cur->borrar($datos,"T_Usuarios");
    }
    
    public function nuevo() {
        $datos= trim($_POST["data"],"|"); 
         $datos=  explode("|", $datos);
    $this->cur->add( construir_array_de_inserts(array(""=>$datos),"T_Usuarios") );
    }
}
