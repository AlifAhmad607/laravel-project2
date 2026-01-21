<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Student::factory(15)->create();
        $this->call([
            ClassroomSeeder::class,
            GuardianSeeder::class,
            TeacherSeeder::class,
            SubjectSeeder::class,
        ]);
         User::factory(1)->create();
    }
}
