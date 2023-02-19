<?php
require_once('./src/model/PessoaModel.php');

class PessoaController
{
    private $pessoa;

    public function __construct() {
        $this->pessoa = new PessoaModel();
    }
    
    public function index()
    {
        $result = $this->pessoa->list();
        return $result;
    }

    public function listById($id)
    {
        $result = $this->pessoa->list($id);
        return $result;
    }

    public function save($nome_pessoa, $data_nasc)
    {
        $this->pessoa->insert($nome_pessoa, $data_nasc);
        header('Location: index.php');
    }

    public function update($id, $nome_pessoa, $data_nasc)
    {
        $this->pessoa->update($id, $nome_pessoa, $data_nasc);
        header('Location: index.php');
    }

    public function delete()
    {
        $id = $_GET['id'];
        if (isset($id) && !empty($id)) {
            $this->pessoa->delete($id);
        }
        header('Location: index.php');
    }
}
