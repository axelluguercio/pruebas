<?php 

class paginationHelper {

    public $paginaActual;
    public $totalPaginas;
    public $nResultados;
    public $resultadosPorPagina;
    public $indice;

    public function __construct($nxPagina) {

        $this->resultadosPorPagina = $nxPagina;
        $this->indice = 0;
        $this->$paginaActual = 1;
    }

    public function calcularPaginas() {
        $this->totalPaginas = ceil(($this->nResultados) / ($this->resultadosPorPagina));
    }
}

?>