<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AutoOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:order';  // {order} or   {order*} if array

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'it will make orders evry Monday';

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
        // $order = $this->argument('order');
        $order = 'pro 1 , pro 2';
        $this->info('hi this order is: '. $order);
    }
}
