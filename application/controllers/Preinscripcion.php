<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Esta clase muestra el formulario de preinscripcion
 * del estudiante, recibe los datos por POST los valida y los inserta en la base de datos
 *
 * @author cvelasquez
 */
class Preinscripcion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("facultades_model");
        $this->load->model("Sedes_model");
    }

    public function index() {
        $datos["facultades"] = $this->facultades_model->SelectAllFacultades();
        $datos["sedes"] = $this->Sedes_model->SelectAllSedes();
        $this->load->view("formPreinscripcion", $datos);
    }

    public function traerPrograma($idFacultad = "") {
        $peticion = strtolower($this->input->server("HTTP_X_REQUESTED_WITH"));
        if ($idFacultad !== "" && $peticion === "xmlhttprequest") {
            $this->load->model("programas_model");
            $programas = $this->programas_model->SelectProgramasByFacultad($idFacultad);
            echo json_encode($programas->result());
        } else {
            redirect("preinscripcion", "refresh");
        }
    }

}
