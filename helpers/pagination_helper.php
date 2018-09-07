<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
 
if (! function_exists('PaginationLinks')) {
    function PaginationLinks($post)
    {
        $CI = get_instance();
		$data=array("page_start"=>0,"page_end"=>0,"PAGINATION_LINKS"=>"");
		$respuesta=array('error'=>0,'mensaje'=>'','resultado');
		$CI->load->library('pagination');
		$num_row=($post['num_row'])?$post['num_row']:0;
		$idForm=$post['idForm'];
		$total_segments=$CI->uri->total_segments();
		$page=$CI->uri->segment($total_segments);
		$per_page=($post['per_page']>0)?$post['per_page']:1;
		$config['total_rows'] =$num_row;
		$config["num_links"] = $num_row;
		$config['per_page'] = $per_page;
		$config["uri_segment"] = $total_segments;
		$config['full_tag_open'] = '<ul class="pagination" dataFormulario="'.$idForm.'">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['use_page_number'] = TRUE;
		$start =  ($page<=1)?1:(($page)/$config["per_page"])+1;
		$CI->pagination->initialize($config);
		$data["page_start"]=((($start-1)*$per_page)+1);
		$data["page_end"]=((($start-1)*$per_page)+$per_page);
		$data["PAGINATION_LINKS"]=$CI->pagination->create_links();
		return $data;
    }
}
?>