<?php 
	
/**
 * 
 */

class Tpl 
{
	protected $ci;
	protected $web;
	function __construct()
	{
		$this->ci =& get_instance();
	}
	private function _header($data='')
	{
		 $tpl = null;
		 $tpl .=$this->_meta($data);
		 $tpl .=$this->ci->load->view("tpl/css",'',true);
		 $tpl .=$this->ci->load->view("tpl/js",'',true);
		 return $tpl;
	}
	private function _meta($data=''){
		if (!isset($data['web_title']) && !isset($data['web_des']) && !isset($data['web_key'])) 
		{
			$data =[
				'web_title' => 'E-recruitment PT. Kaldu Sari Nabati',
				'web_des' => 'Penerimaan pegawai PT. Kaldu Sari Nabati',
				'web_key' => 'Penerimaan pegawai PT. Kaldu Sari Nabati',
			];
		}
		$tpl = null;
		$tpl .=$this->ci->load->view("tpl/meta",$data,true);
		$this->web = $data;
		return $tpl;
	}
	public function _body($data='')
	{
		$_body= (isset($data['body'])) ? $data['body'] : $_body = null;
		$body = array_merge($this->web,array("body"=>$_body));
		return $this->ci->load->view('tpl/body',$body,true);
	}
	public function out($data='')
	{
		$tpl = null;
		$tpl .= $this->_header($data);
		$tpl .= $this->_body($data);
		$tpl .= $this->_footer();
		echo  $tpl;
	}
	public function print($data='')
	{
		$tpl = null;
		$tpl .= $this->_header($data);
		$tpl .= $this->_body($data);
		$tpl .= $this->_footer();
		return $tpl;
	}
	private function _footer()
	{

		 $tpl = null ;
		 $tpl .=$this->ci->load->view("tpl/footer",'',true);
		 return $tpl;
	}
}