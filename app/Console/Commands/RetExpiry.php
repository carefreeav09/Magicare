<?php

namespace App\Console\Commands;

use App\Mail\RetMail;
use App\Mail\SendMail;
use App\Mail\TaxMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MailController;

class RetExpiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ret:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email of expiry date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $varret = app('App\Http\Controllers\MailController')->retTaxExpiry();
        Mail::to('carefreeav09@gmail.com')->send(new RetMail($varret));
    }
}
