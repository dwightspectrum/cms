<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('nl_breaktag'))
{
    /**
     * New line to break tag
     *
     * Return string from newline to break tag
     *
     * @param   string
     * @return  string
     */
    function nl_breaktag(string $str = null): string
    {
        if (!$str) {
            return '';
        }

        return preg_replace("/\\n/m", "<br />", $str);
    }
}

if ( ! function_exists('multiple_nl_breaktag'))
{
    /**
     * Multiple newline to break tag
     *
     * Return string from newline to break tag
     *
     * @param   string
     * @return  string
     */
    function multiple_nl_breaktag(string $str = null): string
    {
        if (!$str) {
            return '';
        }

        return preg_replace("/\r\n|\r\r|\n\n/", "<br />", $str);
    }
}

if (!function_exists('breaktag_nl')) {
    /**
     * Break tag to newline
     *
     * Return string from break tag to newline
     *
     * @param   string
     * @return  string
     */
    function breaktag_nl(string $str = null): string
    {
        if (!$str) {
            return '';
        }

        return preg_replace('/<br(\s+)?\/?>/i', "\n", $str);
    }
}
