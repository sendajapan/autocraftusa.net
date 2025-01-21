<?php

namespace App\Controllers;

use App\Models\AuthModel;

class LoginController extends BaseController
{
    
    public function login()
    {   
        /*$var = 'senda12';
        $hash = password_hash($var, PASSWORD_BCRYPT);
        echo $hash;
        exit;*/
        $data = [];
        if($this->request->getPost()){
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|max_length[255]',
            ];

            $errors = [
                'password' => [
                    'required' => 'Email required',
                    'validateUser' => "Email or Password don't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {
                return view('login', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new AuthModel();
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $cond = [
                    'email' => $email
                ];
                $user = $model->where('email',$email)->first();
                if (is_array($user)) {
                    $db_pass = $user['password'];
                    $ver = password_verify($password, $db_pass);
                    if ($ver) {
                        $rememberme = $this->request->getVar('remember_me');
                        // Stroing session values
                        $this->setUserSession($user,$rememberme);
                    }else{
                        session()->setFlashdata('notFound','Failed! Invalide email or password');
                        return redirect()->to(base_url('login'));
                    }
                }else{
                    session()->setFlashdata('notFound','Failed! Invalide email or password');
                    return redirect()->to(base_url('login'));
                }

                // Redirecting to dashboard after login
                return redirect()->to(base_url('admin/dashboard'));

            }
        }
        return view('login');
    }

    private function setUserSession($user,$rememberme)
    {
        $data = [
            'user_id' => $user['user_id'],
            'username' => $user['username'],
            'usertype' => $user['usertype'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];

        if($rememberme == '1')
            {
                setcookie("email", $_POST['email'], time() + (86400 * 15), "/");
                setcookie("password", $_POST['password'], time() + (86400 * 15), "/");
                setcookie("remember_me", "1", time() + (86400 * 15), "/");
            }
            else
            {
                setcookie("email", $_POST['email'], time() - (5), "/");
                setcookie("password", $_POST['password'], time() - (5), "/");
                setcookie("remember_me", "0", time() - (5), "/");
            }

        
        // setcookie("remember_me", "1", time() + (86400 * 15), "/");
       


        session()->set($data);
        return true;
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }

    // public function passHash(){
    //     echo password_hash("00000000", PASSWORD_DEFAULT);
    // }

    
}