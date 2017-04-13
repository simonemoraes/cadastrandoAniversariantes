<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cadastroaniversariantes extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('cadastro_de_aniversariantes_model');
    }

    public function index() {
        $this->load->view('cadastro/paginaInicial');
    }

    public function formulario() {

        $listaAniversariante = $this->cadastro_de_aniversariantes_model->listaTodos();

        $dados = array("aniversariantes" => $listaAniversariante);

        $this->load->view('cadastro/cadastro_de_aniversariantes', $dados);
    }

    public function salvar() {

        $id = $this->input->post('id');

        $retorno = '';

        if ($id == '') {
            $dados = array(
                "nome" => $this->input->post('nome'),
                "dt_nasc" => $this->input->post('dt_nasc'),
                "convenio" => $this->input->post('convenio')
            );
            $retorno = $this->cadastro_de_aniversariantes_model->salva($dados);
        } else {
            $dados = array(
                "id" => $id,
                "nome" => $this->input->post('nome'),
                "dt_nasc" => $this->input->post('dt_nasc'),
                "convenio" => $this->input->post('convenio')
            );
            $retorno = $this->cadastro_de_aniversariantes_model->edita($dados);
        }
        echo $retorno;
    }

    public function editar() {
        $id = $this->input->post("id");

        $retornaAniversariante = $this->cadastro_de_aniversariantes_model->buscaPorId($id);

        $aniversariante = array(
            "id" => $retornaAniversariante->row()->id,
            "nome" => $retornaAniversariante->row()->nome,
            "dt_nasc" => $retornaAniversariante->row()->dt_nasc,
            "convenio" => $retornaAniversariante->row()->convenio
        );
        echo json_encode($aniversariante);
    }

    public function remover() {
        $id = $this->input->post("id");

        $aniversariante = array(
            "id" => $id,
            "nome" => $this->input->post('nome'),
            "dt_nasc" => $this->input->post('dt_nasc'),
            "convenio" => $this->input->post('convenio')
        );
        $retorno = $this->cadastro_de_aniversariantes_model->deletar($aniversariante);

        echo $retorno;
    }

    function relatorio() {
        $listaAniversariante = '';
        $mes = $this->input->post('mes');

        if ($mes != '0' && $mes != '') {

            $listaAniversariante = $this->cadastro_de_aniversariantes_model->listaMes($mes);


            if ($listaAniversariante != '') {
                echo json_encode($listaAniversariante);
            } else {
                echo json_encode('vazio');
            }
        } else {
            $this->load->view('cadastro/relatorio');
        }
    }

    /* função usada somente para teste */

    public function teste() {
        $this->load->view('cadastro/lista');
    }

    public function teste1() {
        $mes = $_POST['meses'];

     

        if ($mes != '0' && $mes != '') {

            $listaAniversariante = $this->cadastro_de_aniversariantes_model->listaMes($mes);

            if ($listaAniversariante != '') {
                
                $dados['niver'] = $listaAniversariante;
                
                echo '<pre>';
                print_r($dados);
                echo '</pre>';
                
                
                $this->load->view('cadastro/lista', $dados);
                
                
            } else {
                echo 'Não houve retorno de lista';
            }
        } else {
            $dados['niver'] = $listaAniversariante;
            $this->load->view('cadastro/lista',$dados);
        }

       
    }

    private function listarTodos() {
        $retorno = $this->cadastro_de_aniversariantes_model->listaTodos();

        return $retorno;
    }

}
