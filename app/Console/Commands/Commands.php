<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class Commands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:TestPost';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test petition post';

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
        $client = new Client();
        try {

            $client->post('https://atomic.incfile.com/fakepost',[]);

            // Here the code for successful request

        } catch (RequestException $e) {
            // To catch exactly error 400 use
            if ($e->getResponse()->getStatusCode() !== '200') {
                $this->error("Got response ".$e->getResponse()->getStatusCode());
            }

            // You can check for whatever error status code you need

        } catch (\Exception $e) {

            // There was another exception.

        }
    }
}
