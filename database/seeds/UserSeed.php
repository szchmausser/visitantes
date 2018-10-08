<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$LNh027m9UY.KLmzD/G/9t.g67X0MEOQthm5obag0fB9aZ113YzL2a', 'role_id' => 1, 'remember_token' => '',],
            ['id' => 2, 'name' => 'User', 'email' => 'user@user.com', 'password' => '$2y$10$wjdDpWUgsCz0iFj2bCNehOKylaeaHpjTCiuB2mdt/8eXhzUtpxYVm', 'role_id' => 2, 'remember_token' => null,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
