<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_title' =>'Laravel Blog',
            'contact_number'=>'01913966126',
            'email_address'=>'info@email.com',
            'address'=>'Khilkhet, Dhaka, Bangladesh',
            'site_about'=>'Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibham liber tempor cum soluta nobis 
                            eleifend option congue nihil uarta decima et quinta. Ut wisi enim ad minim veniam, quis nostrud 
                            exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat eleifend 
                            option nihil. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius 
                            parum claram.'
        ]);
    }
}
