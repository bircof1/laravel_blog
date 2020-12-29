<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministrationsController extends Controller
{
    public function index(){
        return 'Bienvenu chez vous';
    }
}
