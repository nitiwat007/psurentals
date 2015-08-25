<?php

class UserRegisterController extends BaseController {

    public function UserRegister() {


        try {

            $UserId = Input::get("email");
            $Password = md5(Input::get("password"));
            $FirstName = Input::get("firstname");
            $LastName = Input::get("lastname");
            $Fullname = $FirstName . ' ' . $LastName;
            $Organization = Input::get("organization");
            $Position = ""; //Input::get("position");
            $MailingAddress = Input::get("mailingaddress");
            $TelephoneNumber = Input::get("telephonenumber");
            $Email = Input::get("email");
            $updated_at = $this->get_Datetime_Now();

            $results = DB::table('user')->insert([
                'UserId' => $UserId,
                'IsPSUPassport' => 2,
                'Password' => $Password,
                'FirstName' => $FirstName,
                'LastName' => $LastName,
                'Organization' => $Organization,
                'Position' => $Position,
                'MailingAddress' => $MailingAddress,
                'TelephoneNumber' => $TelephoneNumber,
                'Email' => $Email,
                'updated_at' => $updated_at
            ]);
        } catch (Exception $exc) {
            $results = "duplicate user";
        }

        try {
            Mail::send('emails.registration', array('fullname' => $Fullname), function($message) use($Email, $Fullname) {
                $message->to($Email, $Fullname)
                        ->subject('Confirmation Email of successful registration for PSU Rentals');
            });
        } catch (Exception $ex) {
            
        }

        return Response::json(array('result' => $results));
    }

    function get_Datetime_Now() {
        $tz_object = new DateTimeZone('Asia/Bangkok');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d\ h:i:s');
    }

}
