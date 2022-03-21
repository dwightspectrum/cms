<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseController.php'; 

use Phinx\Console\PhinxApplication;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

class Database extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function update(string $environment = "development")
    {
        $phinx = new PhinxApplication();
        $phinx->setAutoExit(false);

        $input = new ArrayInput(array(
            'command' => 'migrate',
            '-c' => FCPATH . 'phinx.php',
            '-e' => $environment,
        ));

        $output = new BufferedOutput();
        $phinx->run($input, $output);

        echo json_encode(nl2br($output->fetch()));
    }
}
