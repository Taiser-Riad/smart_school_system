<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Manager;
use App\Models\Headmaster;
use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $t=Teacher::factory(5)->create();
        foreach($t as $teacher) {
            $u=User::create([
            "email"=> $teacher->email,
            "password"=>$teacher->password,
            "role"=> "teacher",
        ]);
        $teacher->user_id = $u->id;
        $teacher->save();
        }

        Classroom::factory(2)->create();
        $s=Student::factory(5)->create();
        foreach($s as $student) {
            $u=User::create([
                "email"=> $student->email,
                "password"=>$student->password,
                "role"=> "student",
            ]);
            $student->user_id = $u->id;
            $student->save();
            }
        $m=Manager::factory(5)->create();
        foreach($m as $manager) {
            $u=User::create([
                "email"=> $manager->email,
                "password"=>$manager->password,
                "role"=> "manager",
            ]);
            $manager->user_id = $u->id;
            $manager->save();
            }
        $h=Headmaster::factory(5)->create();
        foreach($h as $headmaster) {
            $u=User::create([
                "email"=> $headmaster->email,
                "password"=>$headmaster->password,
                "role"=> "headmaster",
            ]);
            $headmaster->user_id = $u->id;
            $headmaster->save();
        }
    }
}
