<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\UserModel;

class RegisterController
{
    public function index()
    {
        return view('register');
    }

    public function store()
    {
        if (UserModel::exists($_REQUEST['email']) === true) {
            echo 'Email is al in gebruik';
            return;
        // return json_encode([
            //     'success' => false,
            //     'message' => "This user(name) has already been taken.",
            // ]);
        } else {
            // create password hash and set required fields
            $data = [
                'name' => $_REQUEST['name'],
                'email'      => $_REQUEST['email'],
                'password'   => password_hash($_REQUEST['password'], PASSWORD_DEFAULT),
                'created_by' => $_REQUEST['created_by'] = 1,
                'created'    => $_REQUEST['created'] = date('Y-m-d H:i:s'),
            ];
            
            $data['id'] = UserModel::store($data);

            UserModel::setUserSession($data);

            redirect('');
            
            // $msg = new \Plasticbrain\FlashMessages\FlashMessages();
            // $msg->info('Welcome <strong>' . $data['first_name'] . '</strong>!');

            // return json_encode([
            //     'success'  => true,
            //     'message'  => "Ok :-)",
            //     'redirect' => "home"
            // ]);
        }

        // // check if passwords are equal
        // if ($_REQUEST['password'] != $_REQUEST['password_2']) {
        //     return json_encode([
        //         'success' => false,
        //         'message' => "Passwords don't match."
        //     ]);
        //

        echo 'Gebruiker aangemaakt';
    }
}
