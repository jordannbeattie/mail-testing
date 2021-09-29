<?php

namespace Jordanbeattie\MailTesting\Commands;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Jordanbeattie\MailTesting\Mail\TestEmail;

class TestMail extends Command
{

    protected $signature = "mail:test {email}";

    protected $description = "Test your email configuration by sending to a specified address";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if(!$this->argument('email'))
        {
            $this->comment('Please include an email address');
        }
        else
        {
            try{
                Mail::to($this->argument('email'))->send(new TestEmail());
                $this->comment('Email sent successfully to ' . $this->argument('email'));
            }
            catch (\Exception $e)
            {
                $this->comment($e->getMessage());
            }
        }
    }

}
