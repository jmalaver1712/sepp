<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('profesor_list_table'))
{
    function profesor_list_table($data)
    {
        //setlocale(LC_MONETARY, 'en_US');
        $html = "";
        
        $i = 0;
        foreach($data as $a){
            
            $html .= "<tr>";
                $html .= "<td>".$a->nombre." ".$a->apellido."</td>";
                $html .= "<td>".$a->programa."</td>";
                $html .= "<td>".$a->facultad."</td>";
                if($a->estado !== "activo"){
                    $html .= "<td class=\"text-danger\">".$a->estado."</td>";
                }else{
                    $html .= "<td class=\"text-success\">".$a->estado."</td>";
                }
                
                $edit_btn = "<a class=\"btn btn-warning btn-xs\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" href = \"".base_url()."admin/profesor/edit/".$a->id."\" >
                                <span class=\"glyphicon glyphicon-edit\"></span>
                            </a>";
                
                $delete_btn = "<a class=\"btn btn-danger btn-xs\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar\" href = \"".base_url()."admin/profesor/remove/".$a->id."\" >
                                <span class=\"glyphicon glyphicon-remove\"></span>
                            </a>";
                
                $html .= "<td>$edit_btn&nbsp;$delete_btn</td>";
            $html .= "</tr>";
            
        }
        
        return $html;
    }   
}
