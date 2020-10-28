<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notificacion;

class NotificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notificacion = Notificacion :: create([
            'id'=>1,
            'notificacion'=>"Esta es una notificación",
            'created_at'=>date('2020-10-05'),
            'updated_at'=>date('2020-10-05')
        ]);    
    }
}
