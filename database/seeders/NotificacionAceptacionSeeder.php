<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NotificacionAceptacion;

class NotificacionAceptacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notificacion = NotificacionAceptacion :: create([
            'id'=>1,
            'notificacion'=>"Contenido que agrega Lucas.",
            'created_at'=>date('2020-10-05'),
            'updated_at'=>date('2020-10-05')
        ]);    
    }
}
