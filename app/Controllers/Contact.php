<?php

namespace App\Controllers;
use App\Models\ContactModel;
class Contact extends BaseController
{
    
    public function index(): string
    {   

        $meta = contact_meta();
        $data['page_title'] = $meta[4]['content'];    
        $data['meta'] = $meta;

        return view('contact', $data);
    }


    public function contact_submit(){

        $this->ContactModel = new ContactModel();

        $email_obj = \Config\Services::email();
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('telephone');
        $message = $this->request->getPost('message');
        $date = date('Y-m-d H:i:s');
        
        if($name == '' || $email == '' || $phone == '' || $message == '')
        {
            $data = array(
                            'error' => true,    
                            'error_message'  => 'All Fields are Required'
                        );
        }
        elseif(!$this->request->getPost('recaptcha_token'))
        {   
            $data = array(
                            'error' => true,    
                            'error_message'  => 'Recaptcha Validation Failed.'
                            );
        }
        else{

            $token = $this->request->getPost('recaptcha_token');

            $secret_key = '6LenXaYqAAAAAKbuGJoO7UFoIKieHojgJZYPaCro';

            $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$token);

            $response_data = json_decode($response);

            if(!$response_data->success AND !$response_data->score >= 0.5 AND !$response_data->action == 'submit')
            {
                $data = array(
                            'error' => true,    
                            'error_message'  => 'Recaptcha Validation Failed.'
                            );
            }else{


                $data = [
                    "name" => $name,
                    "email" => $email,
                    "telephone" => $phone,
                    "message" => $message,
                    "message_date" => $date
                ];

                
                if ($this->ContactModel->insert($data)) {

                    $email_obj->setFrom('rztech139@gmail.com', 'AUTOCRAFT USA');
                    // $email_obj->setTo('mnoman55@gmail.com');        
                    // $email_obj->setTo('iftikhar@sendajapan.com');            
                    $email_obj->setTo('rztech139@gmail.com');   
                    
                    // $email_obj->setTo('info@autocraftkorea.com');        

                            
                    $email_obj->setSubject('Autocraft USA - Contact Message from '.$name);

                    $mailContent = '<table width="800px" style="font-family:calibri;">
                      <tr height="50">
                        <td colspan="2"><h2>New Message Received - Contact Us Page</h2></td>
                      </tr>

                      
                      <tr height="10">
                        <td colspan="2" style="border-bottom:1px solid #ddd;"></td>
                      </tr>

                      <tr height="20"></tr>


                      <tr height="40">
                        <td colspan="2">
                            <table width="100%" cellpadding="5" cellspacing="0" border="0">
                              <tbody>
                                <tr width="100%">
                                    <td width="15%" style="padding: 10px 25px; color: #222 !important; font-size: 16px; font-weight: bold;" nowrap="">Name:</td>
                                    <td width="85%" style="padding: 10px 25px; color: #222 !important; font-size: 18px; font-weight: bold;" nowrap="">'.$name.'</td>
                                </tr>
                                <tr width="100%">
                                    <td width="15%" style="padding: 10px 25px; color: #222 !important; font-size: 16px; font-weight: bold;" nowrap="">Email</td>
                                    <td width="85%" style="padding: 10px 25px; color: #222 !important; font-size: 18px; font-weight: bold;" nowrap="">'.$email.'</td>
                                </tr>
                                <tr width="100%">
                                    <td width="15%" style="padding: 10px 25px; color: #222 !important; font-size: 16px; font-weight: bold;" nowrap="">Phone</td>
                                    <td width="85%" style="padding: 10px 25px; color: #222 !important; font-size: 18px; font-weight: bold;" nowrap="">'.$phone.'</td>
                                </tr>
                                <tr width="100%">
                                    <td width="15%" style="padding: 10px 25px; color: #222 !important; font-size: 16px; font-weight: bold;" nowrap="">Message:</td>
                                    <td width="85%" colspan="3" style="padding: 10px 25px; color: #222 !important; font-size: 18px; font-weight: bold;">'.$message.'</td>
                                </tr>
                              </tbody>
                            </table>
                        </td>
                      </tr>
                    </table>';
                            
                            $email_obj->setMessage($mailContent);
                            if($email_obj->send()){

                                    $success_message = "REQUEST SUBMITTED SUCCESSFULLY";
                                        $data = array(
                                       'success'  => true,
                                       'success_message'  => $success_message
                                    );
                            }else{
                                    $data = array(
                                    'error' => true,    
                                    'error_message'  => $email_obj->printDebugger()
                                    );
                            }
                            

                    }else{
                        $data = array(
                        'error' => true,    
                        'error_message'  => "Something went wrong. Record Insertion Failed"
                        );
                    }

                }

            }     

       echo json_encode($data);

    }

}
?>