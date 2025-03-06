<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Laravel\Sanctum\PersonalAccessToken;

class RemoveExpiredTokes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tokens:remove_all {--day=7 : The number of days to remove}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove expired tokens';

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
     * @return int
     */
    public function handle()
    {


        $expiration = config(('sanctum.expiration'));
        if ($expiration) {
            $day = $this->option('day');
            $token = PersonalAccessToken::where('created_at' ,'<' , now()->subMinute($expiration + ($day * 24 * 60) ));
            $token->delete();

            $this->info('Tokens have been removed');

            return 0;

        }

        $this->error('No expiration set');

    }
}
