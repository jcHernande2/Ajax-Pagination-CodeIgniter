<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Paginacion extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
	}
	public function index()
	{
		
	}
	public function GeneraReporte(){
		$respuesta=array('error'=>0,'mensaje'=>'','view_result'=>"");
		$post=array();
		#se genera el WHERE con los post de campos seleccionados para la busqueda
		$where="";
		
		$this->load->helper("pagination");
		$this->load->model("M_Modelo");
		$post["idForm"]=$this->input->post('idForm');
		$post["per_page"]=$this->input->post('per_page');
		
		$post["num_row"]=$this->M_Modelo->num_row($where);
		$result_Page=PaginationLinks($post);
		$result=$this->M_Modelo->BuscarListar($where,$result_Page["page_start"],$result_Page["page_end"]);
		$data["consulta"]=$result['query'];
		$data["pagination"]=$result_Page["PAGINATION_LINKS"];
		$respuesta['view_result']=$this->load->view('Vista/ListResult',$data,true);
		echo json_encode($respuesta);
	}
}
