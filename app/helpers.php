<?php
if (! function_exists('select_company')) {
    function select_company($id)
    {
        $company = App\Company::findOrFail($id);
        if (!is_null($company)) {
            config(['database.connections.institucion' => [
                'driver' => 'mysql',
                'url' => null,
                'host' => env('DB_HOST', '127.0.0.1'),
                'port' => env('DB_PORT', '3306'),
                'database' => $company->DatabaseName,
                'username' => $company->DatabaseUser,
                'password' => decrypt($company->DatabasePassword),
                'unix_socket' => env('DB_SOCKET', ''),
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'prefix_indexes' => true,
                'strict' => true,
                'engine' => null,
                'options' => extension_loaded('pdo_mysql') ? array_filter([
                    \PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
                ]) : [],
            ] ]);
        }
    }
}