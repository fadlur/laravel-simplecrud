<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array('name'=>'fadlur rohman',//input data ke table users
                            'email'=>'fadloer@gmail.com',
                            'password'=>bcrypt('123456'),
                            'created_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s')));

        Role::create(array('name'=>'admin',
                            'display_name'=>'Admin',
                            'description'=>'Admin simple crud',
                            'created_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s')));

        $admin = Role::where('name','=','admin')->first();//manggil data roles dengan name = admin
        $user = User::where('email','=','fadloer@gmail.com')->first();//manggil data user dengan email = fadloer@gmail.com
        $user->attachRole($admin->id);//memberi hak akses user tersebut dengan hak akses admin
    }
}
