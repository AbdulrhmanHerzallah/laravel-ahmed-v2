<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Schema;


class DropAllDataFromPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'drop-all-data-from-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command responsible to delete a role and permissions data from database';

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

//        $tableNames = config('permission.table_names');
//
//        if (empty($tableNames)) {
//            throw new \Exception('Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
//        }
//
//        Schema::drop($tableNames['role_has_permissions']);
//        Schema::drop($tableNames['model_has_roles']);
//        Schema::drop($tableNames['model_has_permissions']);
//        Schema::drop($tableNames['roles']);
//        Schema::drop($tableNames['permissions']);

        DB::table('model_has_permissions')->delete();
        DB::table('model_has_roles')->delete();
        DB::table('role_has_permissions')->delete();
        DB::table('permissions')->delete();
        DB::table('roles')->delete();
        echo 'Done';

    }
}
