<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class updatePubInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-pub-info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            // Execute the stored procedure
            DB::statement('CALL updatePubInfo()');

        } catch (QueryException $e) {

            Log::error('SQL Error: ' . $e->getMessage());
            return response()->json(['error' => 'There was a problem with the database query.'], 500);

        } catch (\Exception $e) {
            // Handle any other exceptions
            Log::error('General Error: ' . $e->getMessage());
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }
}
