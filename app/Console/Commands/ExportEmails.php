<?php

namespace EasyShop\Console\Commands;

use Illuminate\Console\Command;

use DB;

class ExportEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'documents:ExportEmails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A command to export data from the table Documents with type that equals order.';

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
        
        DB::table('documents')->where('type','narachka')->orderBy('id')->chunk(100, function ($records) {
            $filepath = public_path("exportedEmails.txt");
            foreach ($records as $record) {
                $email=json_decode($record->document_json)->userBilling->email;
                file_put_contents($filepath ,$email.PHP_EOL, FILE_APPEND);
            }
        });
        
    }
}
