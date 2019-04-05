<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\User;
use App\Topic;

class HomeController extends Controller
{
    use GoogleMapTrait;
    use ChartTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // requires user to be logged in.
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

        // get topics related to user
        $topics = Topic::where('user_id', $user_id)->paginate(5);

        // get purchases related to user
        $purchases = Purchase::where('user_id', $user_id)->get();

        $chart = new HomeController();
        $chart->Chart();

        $map = new HomeController();
        $map->map();

        return view('home')->with(compact('topics', 'purchases', 'invoices'));
    }
}
