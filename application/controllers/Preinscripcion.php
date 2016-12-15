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

    public function enviar() {
        $this->validarDatos();
    }

    private function validarDatos() {
        $config = array(
            array(
                'field' => 'cedula',
                'label' => 'Cédula',
                'rules' => 'trim|required|is_natural|is_unique[usuario.cedula]'
            ),
            array(
                'field' => 'codigo',
                'label' => 'Código Uniminuto',
                'rules' => 'trim|required|is_unique[usuario.codigo_uniminuto]|is_natural'
            ),
            array(
                'field' => 'nombre1',
                'label' => 'Primer Nombre',
                'rules' => 'trim|required|alpha'
            ),
            array(
                'field' => 'nombre2',
                'label' => 'Segundo Nombre',
                'rules' => 'trim|alpha'
            ),
            array(
                'field' => 'apellido1',
                'label' => 'Primer Apellido',
                'rules' => 'trim|required|alpha'
            ),
            array(
                'field' => 'apellido2',
                'label' => 'Segundo Apellido',
                'rules' => 'trim|alpha'
            ),
            array(
                'field' => 'email1',
                'label' => 'Primer Email',
                'rules' => 'trim|required|valid_email'
            ),
            array(
                'field' => 'email2',
                'label' => 'Segundo Email',
                'rules' => 'trim|valid_email'
            ),
            array(
                'field' => 'telFijo',
                'label' => 'Teléfono Fijo',
                'rules' => 'trim|is_natural|exact_length[7]'
            ),
            array(
                'field' => 'celular',
                'label' => 'Celular',
                'rules' => 'trim|exact_length[10]'
            ),
            array(
                'field' => 'facultad',
                'label' => 'Facultad',
                'rules' => 'trim|required|is_natural'
            ),
            array(
                'field' => 'programa',
                'label' => 'Programa',
                'rules' => 'trim|required|is_natural'
            ),
            array(
                'field' => 'sede',
                'label' => 'Sede',
                'rules' => 'trim|required|is_natural'
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $result = $this->guardar($this->input->post());
            if ($result === 1) {
                echo "<script>"
                . "alert('Usuario Creado Correctamente.');"
                . "window.location='" . base_url("preinscripcion") . "';"
                . "</script>";
            } else {
                echo "<script>"
                . "alert('Ocurrio un error intente nuevamente.');"
                . "window.location='" . base_url("preinscripcion") . ";"
                . "'</script>";
            }
        }
    }

    private function guardar($input) {
        $this->load->model("usuario_model");
        $rol = 1; /* Rol de estudiante */
        $insert["cedula"] = $input["cedula"];
        $insert["codigo_uniminuto"] = $input["codigo"];
        $insert["nombre"] = $input["nombre1"];
        $insert["nombre2"] = $input["nombre2"];
        $insert["apellido"] = $input["apellido1"];
        $insert["apellido2"] = $input["apellido2"];
        $insert["email1"] = $input["email1"];
        $insert["email2"] = $input["email2"];
        $insert["telefono_fijo"] = $input["telFijo"];
        $insert["celular"] = $input["celular"];
        $insert["id_rol_usuario"] = $rol;
        $insert["id_facultad"] = $input["facultad"];
        $insert["id_programa"] = $input["programa"];
        $insert["id_sede"] = $input["sede"];
        $result = $this->usuario_model->insertUsuario($insert);
        return $result;
    }

}
