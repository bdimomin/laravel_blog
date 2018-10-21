<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= App\User::create([
            'name'=>'Mominul Islam',
            'email'=>'imomin126@gmail.com',
            'password'=> bcrypt(123456),
            'admin'=>1
        ]);

        App\Profile::create([
            'user_id'=> $user->id,
            'avatar'=> 'uploads/avatar/avatar.png',
            'bio'=>'It is a long established fact that a reader will be distracted by the readable content of a page when 
                    looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, 
                    as opposed to using \'Content here, content here\', making it look like readable English.',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com'

            ]);
    }
}
