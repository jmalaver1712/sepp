<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('profesor_list_table')) {

    function profesor_list_table($data) {
        //setlocale(LC_MONETARY, 'en_US');
        $html = "";

        $i = 0;
        foreach ($data as $a) {

            $html .= "<tr>";
            $html .= "<td>" . $a->nombre . " " . $a->apellido . "</td>";
            $html .= "<td>" . $a->programa . "</td>";
            $html .= "<td>" . $a->facultad . "</td>";
            if ($a->estado !== "activo") {
                $html .= "<td class=\"text-danger\">" . $a->estado . "</td>";
            } else {
                $html .= "<td class=\"text-success\">" . $a->estado . "</td>";
            }

            $edit_btn = "<a class=\"btn btn-warning btn-xs\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" href = \"" . base_url() . "admin/profesor/edit/" . $a->id . "\" >
                                <span class=\"glyphicon glyphicon-edit\"></span>
                            </a>";
            if ($a->estado !== "no_disponible" && $a->estado !== "inactivo") {
                $option_btn = "<button class=\"btn btn-danger btn-xs remove\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Deshabilitar\" id=\"$a->id\" >
                                <span class=\"glyphicon glyphicon-remove\"></span>
                            </button>";
            } else {
                 $option_btn = "<button class=\"btn btn-success btn-xs active\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Habilitar\" id=\"$a->id\" >
                                <span class=\"glyphicon glyphicon-check\"></span>
                            </button>";
            }
            $html .= "<td>$edit_btn&nbsp;$option_btn</td>";
            $html .= "</tr>";
        }

        return $html;
    }

    if (!function_exists('show_notification')) {

        function show_notification() {
            $CI = & get_instance();  //get instance, access the CI superobject
            $html = "";

            if ($CI->session->flashdata('error') !== FALSE && $CI->session->flashdata('error') != "") {

                $html = "<div class=\"well well-sm alert-info\">" . $CI->session->flashdata('error') . "</div>";
            } elseif ($CI->session->flashdata('message') !== FALSE && $CI->session->flashdata('message') != "") {

                $html = "<div class=\"well well-sm alert-info\">" . $CI->session->flashdata('message') . "</div>";
            }

            return $html;
        }

    }
}
