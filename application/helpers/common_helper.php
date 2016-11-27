<?php

/*

	Este helper conterá as funções usadas de forma geral no projeto.

*/

if(!function_exists('get_asset'))
{
    /**
     * Esta função retorna o código de inclusão de
     * biblioteca CSS ou Java-Script. 
     *
     * @param $type string Type of library, CSS, JS or Custom.
     * @param $filename string File name to be included.
     * @return String 
     */
    function get_asset($type, $filename, $folder = 'assets')
    {
        switch ($type) {
            case 'css':
                return "<link href=\"".base_url($folder.'/css/'.$filename)."\" rel=\"stylesheet\">\n";
                break;
            case 'js':
                return "<script src=\"".base_url($folder.'/js/'.$filename)."\" type=\"text/javascript\"></script>\n";
                break;
            case 'custom':
                return $filename;
                break;
        }
    }
}