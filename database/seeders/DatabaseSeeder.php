<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ActivitesTableSeeder::class);
        $this->call(AssociationsTableSeeder::class);
        $this->call(FilemanagerTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(MembresTableSeeder::class);
        $this->call(PaiementsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(ReunionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleTypeUsersTableSeeder::class);
        $this->call(UserTypesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
