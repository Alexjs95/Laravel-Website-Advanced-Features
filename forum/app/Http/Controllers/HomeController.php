<?php

namespace App\Http\Controllers;

use App\User;
use App\Topic;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Khill\Lavacharts\Lavacharts;
use Khill\Lavacharts\Charts\BarChart;
use Carbon\Carbon;

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

        $topics = Topic::find($user_id);

//        foreach($topics as $item) {
//            return $item->body;
//        }
//        return $topics;
        $date = Carbon::now();
        $firstDateOfMonth = $date->startOfMonth();      // gets first date of current month
        if ($firstDateOfMonth->isMonday()) {
            $firstMonday = $date->startOfMonth();
        } elseif ($firstDateOfMonth->isTuesday()) {
            $firstMonday = $date->addDays(6);
        } elseif ($firstDateOfMonth->isWednesday()) {
            $firstMonday = $date->addDays(5);
        } elseif ($firstDateOfMonth->isThursday()) {
            $firstMonday = $date->addDays(4);
        } elseif ($firstDateOfMonth->isFriday()) {
            $firstMonday = $date->addDays(3);
        } elseif ($firstDateOfMonth->isSaturday()) {
            $firstMonday = $date->addDays(2);
        } elseif ($firstDateOfMonth->isSunday()) {
            $firstMonday = $date->addDays(1);
        }

//        return $firstMonday;
        $secondMonday = $firstMonday->addDays(7);
        $thirdMonday = $secondMonday->addDays(7);
        $fourthMonday = $thirdMonday->addDays(7);



         $date->startOfMonth();


        //weekOfMonth == 3
        $lava = new Lavacharts;

        $topics = \Lava::DataTable();
        $topics->addStringColumn('Reasons')
            ->addNumberColumn('Percent')
            ->addRow(array('Check Reviews', 5))
            ->addRow(array('Watch Trailers', 2))
            ->addRow(array('See Actors Other Work', 4))
            ->addRow(array('Settle Argument', 89));


        $barchart = \Lava::BarChart('Topics', $topics, [
            'title' => 'Number of Topics posted'
        ]);

        Mapper::location('Huddersfield')->map(['zoom' => 18, 'center' => true, 'eventAfterLoad' => 'onMapLoad(maps[0].map);']);
        return view('home')->with('topics', $user->topics);
    }
}
