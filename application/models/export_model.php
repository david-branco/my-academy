<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Export_model  extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function pubsToBibtex() {
        $l = $this->livrosToBibtex();
        $p = $this->procedimentosToBibtex();
        $a = $this->artigosToBibtex();

        write_file('./downloads/pubs/'.$this->session->userdata('id').'/pubs.bib', $l.$p.$a);
        return 'downloads/pubs/'.$this->session->userdata('id').'/pubs.bib';
    }

    public function pubstoPdf() {

        echo "ola";
        $this->pubsToBibtex();
        $id = $this->session->userdata('id');
        $temp = './downloads/pubs/'.$id.'/temp/';
        mkdir($temp, 0777, true);
        copy('./downloads/pubs/references.tex', $temp.'references.tex');
        copy('./downloads/pubs/'.$id.'/pubs.bib', $temp.'pubs.bib');
        exec("cd ".$temp." && sudo latex references.tex && sudo bibtex references.aux && sudo latex references.tex && sudo latex references && sudo dvips references.dvi && sudo ps2pdf references.ps && cd");
        copy($temp.'references.pdf', './downloads/pubs/'.$id.'/pubs'.$id.'.pdf');
         exec('sudo rm -rf '.$temp);

        return 'downloads/pubs/'.$id.'/pubs'.$id.'.pdf';
    }

    public function livrosToBibtex() {
        $livros = $this->teacher_model->getBooksFromTeacher($this->session->userdata('id'));
        $l = "%%%%%%%%%%%%%%%%%%%%% BOOKS %%%%%%%%%%%%%%%%%%%%%\n\n";
        foreach($livros as $livro) {
            if(empty($livro->capitulo)) { $tipo = "@book {"; } 
            else { $tipo = "@inbook {"; }

            $livro_id = "book".$livro->livro_id;
            $autores = ",\n\tauthor = \"".$livro->autores."\"";

            if(empty($livro->editores)) { $editores = ""; }
            else {
                $editores = ",\n\teditor = \"".$livro->editores."\"";
            }

            $titulo = ",\n\ttitle = \"".$livro->titulo."\"";
            $editora = ",\n\tpublisher = \"".$livro->editora."\"";

            if(empty($livro->capitulo)) { $capitulo = ""; }
            else {
                $capitulo = ",\n\tchapter = \"".$livro->capitulo."\"";
            }

            if(empty($livro->paginas)) { $paginas = ""; }
            else {
                $paginas = ",\n\tpages = \"".$livro->paginas."\"";
            }

            if(empty($livro->volume)) { $volume = ""; }
            else {
                $volume = ",\n\tvolume = \"".$livro->volume."\"";
            }

            $data = explode("-",$livro->data_data);
            $ano = ",\n\tyear = ".$data[0];
            $mes = ",\n\tmonth = ".$data[1]."}\n\n";

            $l = $l.$tipo.$livro_id.$autores.$editores.$titulo.$editora .$capitulo.$paginas.$volume.$ano.$mes;
        }
        return $l;
    }

     public function procedimentosToBibtex() {
        $procedimentos = $this->teacher_model->getProceduresFromTeacher($this->session->userdata('id'));
        $p = "\n\n%%%%%%%%%%%%%%%%%%% PROCEEDINGS %%%%%%%%%%%%%%%%%%%\n\n";
        foreach($procedimentos as $procedimento) {
            if(empty($procedimento->titulo_livro)) { $tipo = "@proceedings {"; } 
            else { $tipo = "@inproceedings {"; }

            $procedimento_id = "proc".$procedimento->procedimento_id;
            $autores = ",\n\tauthor = \"".$procedimento->autores."\"";
            $titulo = ",\n\ttitle = \"".$procedimento->titulo."\"";   

            if(empty($procedimento->titulo_livro)) { $titulo_livro = ""; }
            else {
                $titulo_livro = ",\n\tbooktitle = \"".$procedimento->titulo_livro."\"";
            }

            if(empty($procedimento->local)) { $local = ""; }
            else {
                $local = ",\n\taddress = \"".$procedimento->local."\"";
            }

            $data = explode("-",$procedimento->data_data);
            $ano = ",\n\tyear = ".$data[0];
            $mes = ",\n\tmonth = ".$data[1]."}\n\n";

            $p = $p.$tipo.$procedimento_id.$autores.$titulo.$titulo_livro.$local.$ano.$mes;
        }
        return $p;  
    }   

    public function artigosToBibtex() {
        $artigos = $this->teacher_model->getArticlesFromTeacher($this->session->userdata('id'));
        $a = "\n\n%%%%%%%%%%%%%%%%%%%% ARTICLES %%%%%%%%%%%%%%%%%%%%\n\n";
        foreach($artigos as $artigo) {

            $tipo = "@article {";
            $artigo_id = "art".$artigo->artigo_id;
            $autores = ",\n\tauthor = \"".$artigo->autores."\"";
            $titulo = ",\n\ttitle = \"".$artigo->titulo."\"";
            $publicacao = ",\n\journal = \"".$artigo->publicacao."\"";

            if(empty($artigo->volume)) { $volume = ""; }
            else {
                $volume = ",\n\tvolume = \"".$artigo->volume."\"";
            }

            if(empty($artigo->doi)) { $doi = ""; }
            else {
                $doi = ",\n\tnote = \"".$artigo->doi."\"";
            }

            $data = explode("-",$artigo->data_data);
            $ano = ",\n\tyear = ".$data[0];
            $mes = ",\n\tmonth = ".$data[1]."}\n\n";

            $a = $a.$tipo.$artigo_id.$autores.$titulo.$volume.$doi.$ano.$mes;
        }
        return $a;
    }

    public function push_file($path, $name) {

        if(is_file($path)) {
            if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off'); } 
        }

        $this->load->helper('file');
        $mime = get_mime_by_extension($path);

        header('Pragma: public');    
        header('Expires: 0');         
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($path)).' GMT');
        header('Cache-Control: private',false);
        header('Content-Type: '.$mime); 
        header('Content-Disposition: attachment; filename="'.basename($name).'"'); 
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: '.filesize($path)); 
        header('Connection: close');
        readfile($path);
        exit();
    }
}
