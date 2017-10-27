<?php
/**
 * Desenvolvida para realizar a captura de informações textuais e gravar
 * em um arquivo. 
 * @author Edmilson Cosme
 */

class Log {

    //put your code here
    private $diretorio;
    private $aquivo;

    function getDiretorio() {
        return $this->diretorio;
    }

    function getAquivo() {
        return $this->aquivo;
    }

    function setDiretorio($diretorio) {
        $this->diretorio = $diretorio;
    }

    function setAquivo($aquivo) {
        $this->aquivo = $aquivo;
    }

    private function checkDir($Dir) {
        if (file_exists($Dir) && is_dir($Dir)):
            return TRUE;
        else:
            return FALSE;
        endif;
    }
/**
 * Cria um diretório no diretório corrente da aplicação.
 */
    public function criarDiretorio() {
        $dir = getcwd() . "/Log";
        if (!$this->checkDir($dir)):
            mkdir($dir, 0777);
            var_dump($dir);
        endif;
        $this->setDiretorio($dir);
    }

    public function escreverLog($String) {
        $this->criarDiretorio();
        $File = fopen("{$this->getDiretorio()}/log.txt", 'a');        
        $Txt = $String."\r\n";
        fwrite($File, $Txt);
        fclose($File);
    }

}
