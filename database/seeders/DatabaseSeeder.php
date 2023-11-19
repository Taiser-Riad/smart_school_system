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
        $tt=Teacher::create([
            'firstName'=>'Jacob',
            'lastName'=> 'jj',
            'img'=> NULL,
            'age'=> 24,
            'gender'=> 'male',
            'email'=> 'teacher@example.com',
            'password'=> bcrypt('teacher123'),
            'phone'=> '0945316874',
            'about'=> 'hgipobigbjiotejgiobsjitopbjsouboutbhtuo[bheuo hrguobhubhsrtuobhoberuoghetuoghouhuothuipobtubhtob',
            'salary'=> 564560,
            ]);
            $u=User::create([
                'email'=> $tt->email,
                'password'=> $tt->password,
                'role'=> 'teacher',
            ]);
            $tt->user_id=$u->id;
            $tt->save();
    
            $ss=Student::create([
                'firstName'=>'Amy',
                'lastName'=> 'Miles',
                'fatherName'=> 'Garp',
                'motherFirstName'=> 'Lisa',
                'motherLastName'=> 'ALkadi',
                'fatherPhone'=> '0978543216',
                'motherPhone'=> '0945316874',
                'img'=> NULL,
                'age'=> 12,
                'classroom_id'=> '2',
                'gender'=> 'female',
                'dateOfBirth'=> date('2011-5-3'),
                'schoolYear'=> '3',
                'group'=> '1',
                'email'=> 'student@example.com',
                'password'=> bcrypt('student123'),
                'about'=> 'hgipobigbjiotejgiobsjitopbjsouboutbhtuo[bheuo hrguobhubhsrtuobhoberuoghetuoghouhuothuipobtubhtob',
                ]);
                $u=User::create([
                    'email'=> $ss->email,
                    'password'=> $ss->password,
                    'role'=> 'student',
                ]);
                $ss->user_id=$u->id;
                $ss->save();

                $mm=Manager::create([
                    'firstName'=>'Abd-Alrahman',
                    'lastName'=> 'Alhafar',
                    'img'=> NULL,
                    'age'=> 24,
                    'gender'=> 'male',
                    'email'=> 'manager@example.com',
                    'password'=> bcrypt('manager123'),
                    ]);
                    $u=User::create([
                        'email'=> $mm->email,
                        'password'=> $mm->password,
                        'role'=> 'manager',
                    ]);
                    $mm->user_id=$u->id;
                    $mm->save();

                    $hh=Headmaster::create([
                        'firstName'=>'Oudai',
                        'lastName'=> 'Helaleh',
                        'img'=> NULL,
                        'age'=> 24,
                        'gender'=> 'male',
                        'email'=> 'headmaster@example.com',
                        'password'=> bcrypt('headmaster123'),
                        ]);
                        $u=User::create([
                            'email'=> $hh->email,
                            'password'=> $hh->password,
                            'role'=> 'headmaster',
                        ]);
                        $hh->user_id=$u->id;
                        $hh->save();
    }
}
