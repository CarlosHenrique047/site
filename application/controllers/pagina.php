<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

	public function index()
	{
        $dados['titulo'] = 'RBernardi Desenvolvimento WEB';
        $this->load->view('home', $dados);
    }
    
    public function clientes()
	{
        $dados['titulo'] = 'Clientes - RBernardi Desenvolvimento WEB';
        $this->load->view('clientes', $dados);
    }
    
    public function servicos()
	{
        $dados['titulo'] = 'Servicos - RBernardi Desenvolvimento WEB';
        $this->load->view('servicos', $dados);
    }
    
    public function sobre()
	{
        $dados['titulo'] = 'Sobre - RBernardi Desenvolvimento WEB';
        $this->load->view('sobre', $dados);
    }
    
    public function contato()
	{
        $dados['titulo'] = 'Contato - RBernardi Desenvolvimento WEB';
        $this->load->view('contato', $dados);
	}
}
