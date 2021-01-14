<?php
namespace App\Services;

class MailLogger
{
    protected $adminEmail;

    public function __construct($adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    public function sendEmail(){
        /*........*/
    }

}