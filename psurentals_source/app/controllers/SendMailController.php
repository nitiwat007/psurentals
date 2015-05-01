<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SendMailController extends BaseController {

    public function sendMail() {
        Mail::send('emails.blank', array('msg' => 'This is the body of my email'), function($message) {
            $message->to('nitiwat007@gmail.com', 'John Smith')->subject('This is my subject');
        });
    }

}
