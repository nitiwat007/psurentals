<?php

class UserRegisterController extends BaseController {

    public function UserRegister() {


        try {

            $UserId = Input::get("username");
            $Password = md5(Input::get("password"));
            $FirstName = Input::get("firstname");
            $LastName = Input::get("lastname");
            $Fullname = $FirstName . ' ' . $LastName;
            $Organization = Input::get("organization");
            $Position = Input::get("position");
            $MailingAddress = Input::get("mailingaddress");
            $TelephoneNumber = Input::get("telephonenumber");
            $Email = Input::get("email");

            $results = DB::table('user')->insert([
                'UserId' => $UserId,
                'IsPSUPassport' => 0,
                'Password' => $Password,
                'FirstName' => $FirstName,
                'LastName' => $LastName,
                'Organization' => $Organization,
                'Position' => $Position,
                'MailingAddress' => $MailingAddress,
                'TelephoneNumber' => $TelephoneNumber,
                'Email' => $Email
            ]);

            Mail::send('emails.registration', array('fullname' => $Fullname), function($message) use($Email,$Fullname) {
                $message->to($Email, $Fullname)
                        ->subject('Confirmation Email of successful registration for PSU Rentals');
            });
        } catch (Exception $exc) {
            $results = "duplicate user";
        }

        return Response::json(array('result' => $results));
    }

}
