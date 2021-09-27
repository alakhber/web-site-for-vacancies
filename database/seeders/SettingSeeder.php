<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_language'=>'az',
            'logo'=>'logo.png',
            'location'=>'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3040.9067272983875!2d49.84284305059731!3d40.34441506785781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307c18d621a4db%3A0xed939a478934ea15!2sFlag%20square%2C%20Baku%2C%20Azerbaycan!5e0!3m2!1str!2s!4v1632677395215!5m2!1str!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'phone'=>'0125555555',
            'mobil'=>'994555555555',
            'address'=>'Baki',
            'email'=>'admin@admin.com'
        ]);
    }
}
