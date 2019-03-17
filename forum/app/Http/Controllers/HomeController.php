<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Cornford\Googlmapper\Models\Location as Location;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        Mapper::location('Huddersfield')->map(['zoom' => 18, 'center' => true, 'eventAfterLoad' => 'onMapLoad(maps[0].map);']);
        return view('home')->with('topics', $user->topics);
    }
}
