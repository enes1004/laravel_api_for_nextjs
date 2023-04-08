<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OauthClientsStaticDef extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table_name='oauth_clients';
        $data=[
            [1,NULL,'static','u7eHH8Cx3EWRPSLdWfcFh6MERNyWaaaqGEwPlKZj',NULL,env('NEXT_DOMAIN','http://localhost'),0,0,0,'2023-04-07 11:13:20','2023-04-07 11:13:20'],
            [2,NULL,'Laravel Password Grant Client','6NbMEzwWeWO4lxl4S5mebH8A0yk65aiQ1fs5Cg8a','users',env('NEXT_DOMAIN','http://localhost:3000').'/api/auth/callback/laravel',0,0,0,'2023-04-07 11:13:20','2023-04-07 11:13:20']
        ];
       
        $columns=DB::table("information_schema.columns")->where([
            ["table_schema","=", env('RDS_DB_NAME',env('DB_DATABASE'))],
            ["table_name" ,"=", $table_name]
        ])
        ->orderByRaw("ordinal_position")
        ->pluck('COLUMN_NAME')->toArray();
        foreach($data as $row){
            DB::table($table_name)->upsert(
                collect($columns)
                    ->combine($row)->toArray(),
                    ["id"],
                    collect($columns)->except('id')->toArray()
        );
    }
}
}
