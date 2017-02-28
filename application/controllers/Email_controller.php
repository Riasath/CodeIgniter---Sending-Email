<?php 
   class Email_controller extends CI_Controller { 
 
      function __construct() { 
         parent::__construct(); 
         $this->load->library('session'); 
         $this->load->helper('form'); 
      } 
		
      public function index() { 
	
         $this->load->helper('form'); 
         $this->load->view('email_form'); 
      } 
  
      
      function send_mail()
      {
          $config = Array(
              'protocol' => 'smtp',
              'smtp_host' => 'ssl://smtp.googlemail.com',
              'smtp_port' => 465,
              'smtp_user' => 'shuvrohosain@gmail.com', // change it to yours
              'smtp_pass' => '******', // change it to yours
              'mailtype' => 'html',
              'charset' => 'iso-8859-1',
              'wordwrap' => TRUE
         );

        $message = '';
        $this->load->library('email', $config);
         $this->email->set_newline("\r\n");
         $this->email->from('sender@email.com'); // change it to yours
         $this->email->to('reciver@email.com');// change it to yours
         $this->email->subject('Hello dear,its working');
         $this->email->message($message);
         if($this->email->send())
        {
         echo 'Email sent.';
        }
        else
       {
        show_error($this->email->print_debugger());
       }

      }



   } 
?>