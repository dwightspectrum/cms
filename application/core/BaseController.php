 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BaseController extends CI_Controller {

    public $cfg = [];

    public function __construct()
    {
        parent::__construct();

        $this->cfg['BASE_URL'] = base_url();
        $this->load->model('Employee_model','employee');
        $this->load->model('Freelancer_model','freelancer');

    }

    public function loadView($main, $data = null){
        $header['cfg'] = $this->cfg;
        $header['isAdmin'] = $this->isAdmin();
        $header['isAccounting'] = $this->isAccounting();
        $header['isFreelancer'] = $this->isFreelancer();
 
    
        $this->load->view('template/header', $header);
        
        if($data == null){
            $this->load->view($main);
        }
        else{
            $this->load->view($main, $data);
        }
        
        $this->load->view('template/footer');
    }

    public function check_user_session(){
        if(!$this->session->userdata('employee_type')){
            redirect('login');
        }
    }
 
    public function createPagination($rows, $per_page, $cur_page){
        $this->load->library('pagination');

        $config['per_page'] = $per_page;
        $config['total_rows'] = $rows;
        $config['cur_page'] = $cur_page;

        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }

    public function getStartRow($cur_page, $per_page){
        return empty($cur_page)? 0 : ($cur_page - 1) * $per_page;
    }

    public function download_file($path, $filename){
        $file = realpath($path.$filename);
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.$filename.'"' );
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }
    }

    public function config_init(){
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.udag.de',
            'smtp_user' => 'marcia.lopez@hotwork.ph',
            'smtp_pass' => 'Mar85Lop@',
            'smtp_crypto' => 'STARTTLS',    
            'newline' => "\r\n", //REQUIRED! Notice the double quotes!
            'smtp_port' => 587,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => true  

        );

        return $config;
    } 

    public function send_mail_requests($config, $receiver, $sender_email, $sender_name, $subject, $message){
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->set_crlf( "\r\n" );
        
        $formatted_message = "<p>" . nl2br($message) . "</p>";  

        $this->email->to($receiver);
        $this->email->from($sender_email, $sender_name);
        $this->email->subject($subject);
        $this->email->message($formatted_message);

        if ( ! $this->email->send())
        { 
            echo $this->email->print_debugger();
        }else{
            echo "Successful! ";
        }

        $this->email->clear(true); // clear kung ganahan ka ibalik uno; i.e. paras loop
    }
    
    public function send_mail_requests_with_attachments($config, $receiver, $sender_email, $sender_name, $subject, $message, $file){
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->set_crlf( "\r\n" );
        
        $formatted_message = "<p>" . nl2br($message) . "</p>";
        
        $this->email->to($receiver);
        $this->email->from($sender_email, $sender_name);
        $this->email->subject($subject);
        $this->email->message($formatted_message);  
        $this->email->attach($file);

        if ( ! $this->email->send())
        { 
            echo $this->email->print_debugger();
        }else{
            //echo "Successful! ";
        }

        $this->email->clear(true); // clear kung ganahan ka ibalik uno; i.e. paras loop
    }

    public function isAdmin(){
        $employee = $this->employee->get_by_id($this->session->userdata('employee_id'));
        $freelancer = $this->freelancer->get_by_id($this->session->userdata('freelancer_id'));

        if ($employee) {
            $roles = explode(',', $employee->employee_role);
        } else {
            $roles = explode(',', $freelancer->freelancer_role);
        }
       

        if(in_array(1, $roles) || in_array(0, $roles))
            return true;

        return false;
    }
    public function isFreelancer(){
        $freelancer_id = $this->session->userdata('freelancer_id');

        if (!$freelancer_id) {
            return false;
        }
        
        $freelancer = $this->freelancer->get_by_id($freelancer_id);

        if ($freelancer->freelancer_role == 6 || $freelancer->freelancer_role == 0) {
            return true;
        }

        return false;
   
    }

    public function admin_only(){
        $employee = $this->employee->get_by_id($this->session->userdata('employee_id'));
        $freelancer = $this->freelancer->get_by_id($this->session->userdata('freelancer_id'));

        if ($employee) {
            $roles = explode(',', $employee->employee_role);
        } else if ($freelancer) {
            $roles = explode(',', $freelancer->freelancer_role);
        }

        if(!(in_array(1, $roles) || in_array(0, $roles))){
            redirect('errorpage/unauthorized_access');
        }
    }

    public function isAccounting(){
        $employee = $this->employee->get_by_id($this->session->userdata('employee_id'));
        $freelancer = $this->freelancer->get_by_id($this->session->userdata('freelancer_id'));

        if ($employee) {
            $roles = explode(',', $employee->employee_role);
        } else if ($freelancer) {
            $roles = explode(',', $freelancer->freelancer_role);
        }

        if(in_array(4, $roles) || in_array(0, $roles))
            return true;

        return false;
    }

    public function accounting_only(){
        $employee = $this->employee->get_by_id($this->session->userdata('employee_id'));
        $roles = explode(',', $employee->employee_role);

        if(!(in_array(4, $roles) || in_array(0, $roles))){
            redirect('errorpage/unauthorized_access');
        }
    }

    public function compressHtml($str)
    {
        $search = array(
            '/\n/',      // replace end of line by a space
            '/\>[^\S ]+/s',    // strip whitespaces after tags, except space
            '/[^\S ]+\</s',    // strip whitespaces before tags, except space
            '/(\s)+/s'    // shorten multiple whitespace sequences
        );

        $replace = array(' ', '>', '<', '\1');
        return preg_replace($search, $replace, $str);
    }

    public function sendEmail($config, $receiver, $sender_email, $sender_name, $subject, $message)
    {
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->set_crlf("\r\n");
        $this->email->to($receiver);
        $this->email->from($sender_email, $sender_name);
        $this->email->subject($subject);
        $this->email->message($message);

        if (!$this->email->send()) {
            //echo $this->email->print_debugger();
        } else {
            //echo "";
        }

        $this->email->clear(true);
    }

    public function getEmailConfig()
    {
        $config = array(
            'protocol' => 'sendmail',
            'newline' => "\r\n", //REQUIRED! Notice the double quotes!
            'smtp_port' => 587,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => true,
        );
             
        return $config;
    }
}