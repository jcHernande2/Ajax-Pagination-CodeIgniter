<?php
/*
este modelo esta generado para sql server
puede cambier segun sea la base de datos
*/
class M_Modelo extends CI_Model {
	
	public function __construct()  
	{
		parent::__construct();
		// Your own constructor code
	}
	public function num_row($where)
	{
		$number=0;
		$fields=" count(*) as number ";
		$sql=$this->GeneraSelectQuery($fields,$where);
		$number=$this->db->query($sql)->row()->number; 
		return intval($number);
	}
	#consulta puede cambiar segun el tipo de base de datos que se maneje
	public function BuscarListar($where,$page_start,$page_end)
	{
		$fields=" 
			id
			,Nombre
			,Descrip
			,ROW_NUMBER() over (order by Nombre desc) as rownum 
		";
		$sql=$this->GeneraSelectQuery($fields,$where);
		$query = $this->db->query("SELECT * FROM (".$sql.") as TBL where rownum BETWEEN ".$page_start." AND ".$page_end." order by TBL.Nombre desc");
		return $query->result();
	}
	#genera el script para la consulta
	private function GeneraSelectQuery($fields,$where)
	{
		$sql="select 
			".$fields." 
			from Tabla
			inner join Tabla1  on Tabla1.id=Tabla.idTabla1
			".(($where)?" WHERE ".$where:"");
		return $sql;
	}
}
?>