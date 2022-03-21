<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('uuid_to_bin'))
{
    /**
     * UUID to binary (16)
     *
     * Convert UUID to binary
     *
     * @param   string
     * @return  binary   Binary16
     */
    function uuid_to_bin($uuid){
        return pack("H*", str_replace('-', '', $uuid));
    }
}

if ( ! function_exists('bin_to_uuid'))
{
    /**
     * Binary (16) to UUID
     *
     * Convert binary to UUID
     *
     * @param   binary
     * @return  string   UUID
     */
    function bin_to_uuid($bin){
        return join("-", unpack("H8time_low/H4time_mid/H4time_hi/H4clock_seq_hi/H12clock_seq_low", $bin));
    }
}
