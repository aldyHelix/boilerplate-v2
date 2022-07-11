<?php

namespace Modules\Ladmin\Databases\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Ladmin\Models\LadminRole;
use App\Models\UserInfo;
use Faker\Generator;
use Hexters\Ladmin\Helpers\Ladmin;
use Modules\Ladmin\Models\Admin;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {

        /**
         * Create role
         */
        $role = LadminRole::first();

        if (!$role) {
            $role = LadminRole::create([
                'name' => 'Super Admin',
                'gates' => ladmin()->menu()->allGates()
            ]);
        }

        $admin_role = LadminRole::find('Administrator');

        if (!$admin_role) {
            $admin_role = LadminRole::create([
                'name' => 'Administrator',
                'gates' => ladmin()->menu()->allGates()
            ]);
        }

        $employee_role = LadminRole::find('Employee');

        if (!$employee_role) {
            $employee_role = LadminRole::create([
                'name' => 'Employee',
                'gates' => ladmin()->menu()->allGates()
            ]);
        }


        $this->command->line('');
        $this->command->info('# Login Accounts');
        $this->command->line('');
        $this->command->line('View complete account in `' . ladmin()->getAdminTable() . '` table in your database.');
        $this->command->line('');

        /**
         * Create dummy ladmin account
         */

        $system_user = Admin::create([
            'first_name' => 'Super Admin',
            'last_name' => 'System',
            'email' => 'super-system@demo.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
        ])->each(function ($super) use ($role, $admin_role,  $faker) {
            if ($super->last_name === 'System') {
                $super->roles()->sync([$role->id]);
            } else {
                $super->roles()->sync([$admin_role->id]);
            }

            $this->addDummyInfo($faker, $super);

            $this->command->line('--------------------------------------------');
            $this->command->info('email     : ' . $super->email);
            $this->command->info('password  : password');
        });

        $admin_user = Admin::create([
            'first_name' => 'Administrator',
            'last_name' => 'Management',
            'email' => 'administrator@demo.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
        ])->each(function ($super) use ($role, $admin_role,  $faker) {
            if ($super->last_name === 'System') {
                $super->roles()->sync([$role->id]);
            } else {
                $super->roles()->sync([$admin_role->id]);
            }

            $this->addDummyInfo($faker, $super);

            $this->command->line('--------------------------------------------');
            $this->command->info('email     : ' . $super->email);
            $this->command->info('password  : password');
        });

        Admin::factory(3)->create()
            ->each(function ($employee) use ($employee_role, $faker) {
                $employee->roles()->sync([$employee_role->id]);

                $this->addDummyInfo($faker, $employee);

                $this->command->line('-------------------Employee-------------------------');
                $this->command->info('email     : ' . $employee->email);
                $this->command->info('password  : password');
            });
    }

    private function addDummyInfo(Generator $faker, Admin $user)
    {
        $dummyInfo = [
            'company'  => $faker->company,
            'phone'    => $faker->phoneNumber,
            'website'  => $faker->url,
            'language' => $faker->languageCode,
            'country'  => $faker->countryCode,
        ];

        $info = new UserInfo();
        foreach ($dummyInfo as $key => $value) {
            $info->$key = $value;
        }
        $info->user()->associate($user);
        $info->save();
    }
}
