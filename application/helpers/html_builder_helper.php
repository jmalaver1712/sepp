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
            $html .= "</tr>";
            
        }
        
        return $html;
    }   
}
