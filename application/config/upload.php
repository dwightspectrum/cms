<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['upload_path'] = realpath(APPPATH.'../storage/documents');
$config['allowed_types'] = '*';
$config['max_size'] = '0';