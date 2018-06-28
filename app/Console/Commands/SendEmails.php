<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\MailController;
use Illuminate\Console\Command;
use Repositories\Eloquent\Company;
use Repositories\Eloquent\Event;
use Illuminate\Container\Container as App;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending Mail To Companies Administrators';

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
        $emailController = new MailController(new Company(New App()), new Event(New App()));
        $emailController->index();
    }
}
