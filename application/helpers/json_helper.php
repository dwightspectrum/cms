<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('json_output'))
{
    /**
     * JSON output
     *
     * Return data as json using Codeigniter Output class
     *
     * @param   array or object
     * @return  json   output class
     */
    function json_output($data, $status = 200)
    {
        $CI =& get_instance();
        $CI->output->set_content_type(JSON_CONTENT_TYPE)
                    ->set_status_header($status)
                    ->set_output(json_encode($data));
    }
}
