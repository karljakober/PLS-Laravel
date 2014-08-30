<?php

class MessageController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth', array('only' => array('postRegister', 'postAdd')));
    }

    public function postRegister()
    {
        $this->layout = null;

        $string = Auth::user()->toJson();
        $ciphertext = mcrypt_encrypt('rijndael-128', 'M02cnQ51Ji97vwT4', $string, 'ecb');
        echo base64_encode($ciphertext);
    }

    public function postAdd()
    {
        $this->layout = null;

        $message = new Message;

        $message->username = Auth::user()->username;
        $message->message = Input::get('message');

        $data = array('username' => Auth::user()->username, 'message' => Input::get('message'));

        if (null !== Input::get('to') && Input::get('to') != '') {
            $message->to = Input::get('to');
            $data['to'] = Input::get('to');
        }

        $message->save();
        $string = json_encode($data);

        $ciphertext = mcrypt_encrypt('rijndael-128', 'M02cnQ51Ji97vwT4', $string, 'ecb');
        echo base64_encode($ciphertext);
    }
}
