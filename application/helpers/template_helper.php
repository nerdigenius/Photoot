<?php
/**
 * Template helper helps to templating views
 * @param [type] $pos    [description]
 * @param [type] $params [description]
 */
if ( ! function_exists('add_assets')){
    function add_assets($pos, $params)
    {
        $CI =& get_instance();
        // $CI = &get_instance();

        if (!is_array($params)) {
            $params = array();
        }

        $CI->config->set_item($pos, $params);
        return;
    }
}
if ( ! function_exists('header_assets')){
    function header_assets($str = '')
    {
        $CI      = &get_instance();
        $headers = $CI->config->item('header');

        foreach ($headers as $item) {
            $str .= $item . "\n";
        }

        echo $str;
    }
}
if ( ! function_exists('footer_assets')){
    function footer_assets($str = '')
    {
        $CI      = &get_instance();
        $footers = $CI->config->item('footer');

        foreach ($footers as $item) {
            $str .= $item . "\n";
        }

        echo $str;
    }
}
