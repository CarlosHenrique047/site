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
        $this->load->helper('form');
        $this->load->library(array('form_validation', 'email'));// e necessario o array para carregar mais de 1 biblioteca por vez
        //regras de validacao do form
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('assunto', 'Assunto', 'trim|required');
        $this->form_validation->set_rules('mensagem', 'Mensagem', 'trim|required');
        //test de verificacao
        if($this->form_validation->run() == FALSE){
            $dados['formerror'] = validation_errors();
        }else{
            $dados_form = $this->input->post(); // recuperar os dados do input
            //print_r($dados_form); para mostrar os dados recuperados dos inputs

            $this->email->from($dados_form['email'], $dados_form['nome']);
            $this->email->to('carloscerbhga@gmail.com');
            $this->email->subject($dados_form['assunto']);
            $this->email->message($dados_form['mensagem']);

            if($this->email->send()){
                $dados['formerror'] = 'Email enviado com Sucesso';
            }else{
                $dados['formerror'] = 'erro ao enviar email';  
            }
            $dados['formerror'] = "A Validacao funcionou corretamente!";
            
        }


        $dados['titulo'] = 'Contato - RBernardi Desenvolvimento WEB';
        $this->load->view('contato', $dados);
	}
}
