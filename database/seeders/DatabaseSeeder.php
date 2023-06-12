<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
        Company::truncate();
        Review::truncate();
        Company::factory(100)->create();
        foreach (Company::get() as $company) {
            Review::factory(10)->create(['companyId' => $company->id]);
        }
        User::truncate();
        $user = User::create([
            'name' => 'Admin',
            'last_name' => '',
            'email' => config('app.cmsEmail'),
            'password' => Hash::make(config('app.cmsPass')),
            'phone' => '03246845384',
        ]);
        $user->assignRole('admin');
        Schema::enableForeignKeyConstraints();
    }
}
