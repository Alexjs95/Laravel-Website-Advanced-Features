<?php
/**
 * Created by IntelliJ IDEA.
 * User: alexscotson
 * Date: 2019-03-24
 * Time: 10:30
 */

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Topic;

trait ChartTrait
{
    public function Chart() {
        $user_id = auth()->user()->id;

        $date = Carbon::now();
        $firstDateOfMonth = $date->startOfMonth();      // gets first date of current month

        // Finds the first monday of the month from the first date.
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

        $firstMonday->toDateString();

        $week1Start = $firstMonday->toDateString().' 00:00:00';
        $week1End = $firstMonday->addDays(6)->toDateString().' 23:59:59';
        $week1 = $week1Start.' - '.$week1End;
        $week2Start = $firstMonday->addDays(1)->toDateString().' 00:00:00';;
        $week2End = $firstMonday->addDays(6)->toDateString().' 23:59:59';;
        $week2 = $week2Start.' - '.$week2End;
        $week3Start = $firstMonday->addDays(1)->toDateString().' 00:00:00';;
        $week3End = $firstMonday->addDays(6)->toDateString().' 23:59:59';;
        $week3 = $week3Start.' - '.$week3End;
        $week4Start = $firstMonday->addDays(1)->toDateString().' 00:00:00';;
        $week4End = $firstMonday->addDays(6)->toDateString().' 23:59:59';;
        $week4 = $week4Start.' - '.$week4End;

        // Gets number of topics posted for the currently logged in user between the start and end of each week in the current month.
        $week1Topics = Topic::where('user_id', $user_id)->whereBetween('created_at',[$week1Start, $week1End])->count();
        $week2Topics = Topic::where('user_id', $user_id)->whereBetween('created_at',[$week2Start, $week2End])->count();
        $week3Topics = Topic::where('user_id', $user_id)->whereBetween('created_at',[$week3Start, $week3End])->count();
        $week4Topics = Topic::where('user_id', $user_id)->whereBetween('created_at',[$week4Start, $week4End])->count();

        $topicChart = \Lava::DataTable();
        $topicChart->addStringColumn('Topics')
            ->addNumberColumn('Count')
            ->addRow(array($week1, $week1Topics))
            ->addRow(array($week2, $week2Topics))
            ->addRow(array($week3, $week3Topics))
            ->addRow(array($week4, $week4Topics));

        $barchart = \Lava::BarChart('Topics', $topicChart, [
            'title' => 'Number of Topics posted this month'
        ]);

        return $barchart;
    }
}
