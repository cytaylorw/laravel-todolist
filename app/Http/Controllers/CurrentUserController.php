<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CurrentUserController extends Controller
{
    
    /**
     * Show current User.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return Auth::user();
    }

    /**
     * Show current User.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTodos()
    {
        return Auth::user()->todos;
    }
}
