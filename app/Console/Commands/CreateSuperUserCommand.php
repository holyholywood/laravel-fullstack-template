<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateSuperUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:createsuperuser
                            {name : The name of the user}
                            {email : The email address of the user}
                            {password : The password for the user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new Super User';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);
            $role = Role::where(['name' => env('DEFAULT_SUPERADMIN_ROLE_NAME', 'TECHNOLOGY')])->first();
            $user->assignRole($role);

            DB::commit();
            $this->info('Super User created successfully!');
            $this->line('ID: ' . $user->id);
            $this->line('Name: ' . $user->name);
            $this->line('Email: ' . $user->email);
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Failed to create user: ' . $e->getMessage());
        }
    }
}
