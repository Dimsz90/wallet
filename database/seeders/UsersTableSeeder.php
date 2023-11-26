<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Bendahara
        $bendahara = User::factory()->create([

            'name'     => 'Nama Bendahara',
            'email'    => 'bendahara@smkalbahri.com',
            'email_verified_at' => now(),
            'password' => bcrypt('smkalbahri'),
        ]);

if($bendahara->save()){
            $students = Student::create([
                'user_id'   => $bendahara->id,
                'alamat'    => 'Bekasi',
                'kelas'     =>  'XII',
                'phone'     => '1231231231231',
            ]);
        }

        $bendahara->assignRole('Bendahara');

        $this->command->info('>_ Here is your bendahara details to login:');
        $this->command->warn($bendahara->email);
        $this->command->warn('Password is "smkalbahri"');

        // bersihkan cache
        $this->command->call('cache:clear');
    }
}
