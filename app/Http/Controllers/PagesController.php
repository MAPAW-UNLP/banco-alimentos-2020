<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function inicio(){
        return view('home');
    }

    public function iniciar_sesion(){
        return view('auth.main-login');
    }

    public function recover_password(){
        return view('auth.main-recover-password');
    }

    public function add_user(){
        return view('main-add-user');
    }

    public function change_password(){
        return view('auth.main-change-password');
    }

    public function manage_social_area(){
        return view('main-manage-social-area');
    }

    public function manage_social_area_organization_data(){
        return view('main-manage-social-area-organization-data');
    }

    public function combo(){
        return view('main-combo');
    }

    public function calendar(){
        return view('main-calendar');
    }

    public function notificaciones(){
        return view('main-notificaciones');
    }

    public function encuesta_organizacion(){
        return view('main-encuesta-organizacion');
    }
}
