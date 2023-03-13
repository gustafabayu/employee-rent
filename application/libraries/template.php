<?php
class Template{
    protected $_CI;
    function __construct(){
        $this->_CI=&get_instance();
    }
    
    function display($template,$data=null){
//        $this->_CI->load->model('m_menu');
//        $data['_getMenu'] = $this->_CI->m_menu->selectMenu();
//        $this->_CI->load->model('m_menu');
//        $menuid = $this->_CI->m_menu->get_menu($this->_CI->session->userdata('groupuser'))->result();
//        $data['_getMenu']=$menuid;
        
        $data['_style']=$this->_CI->load->view('template/style',$data,true);
        $data['_navigation']=$this->_CI->load->view('template/navigation',$data,true);
        $data['_menu']=$this->_CI->load->view('template/menu',$data,true);
	//$data['_navbar']=$this->_CI->load->view('template/navbar',$data,true);        
        $data['_content']=$this->_CI->load->view($template,$data,true);
	$data['_footer']=$this->_CI->load->view('template/footer',$data,true);
        $data['_script']=$this->_CI->load->view('template/script',$data,true);
        $this->_CI->load->view('/template.php',$data);
    }
    
}

