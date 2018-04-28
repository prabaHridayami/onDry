<?php
    class send_email extends CI_Controller{
        public function send($value=""){
            $this->load->library('email');
            $config = Array(
                'useragent'=>'CodeIgniter',
                'protocol'=>'smtp',
                'smtp_host'=>'ssl://smtp.googlemail.com',
                'smtp_port'=>465,
                'smtp_user'=>'prabahridayami97@gmail.com',
                'smtp_pass'=>'hr1d4y4m1',
                'mailtype'=>'html',
                'charset'=>'utf-8',
                'smtp_crypto' => 'security',
                'crlf' => '\r\n',
		        'newline' => '\r\n',
			    'bcc_batch_mode'=> FALSE,
			    'bcc_batch_size' => 200,
                'wordwrap'=>TRUE
            );

            $this->email->initialize($config);

            $this->email->from('prabahridayami97@gmail.com','Praba Hridayami');
            $this->email->to('seulseulgi20@gmail.com');
            $this->email->subject('Laundry Online Verification');
            $this->email->message("Registrasi");

            if($this->email->send()){
                echo "Email has been sent. Thank You.";
            }else{
                echo $this->email->print_debugger();
            }
        }

        // public function email_template(){
        //     echo "Hey Regis";
        // }

    }
            
?>