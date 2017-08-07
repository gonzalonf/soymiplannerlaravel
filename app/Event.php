<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    Protected $guarded = ['id'];

    public function contact()
    {
        return $this->hasMany('App\Contact');
    }
    public static function toDate($day,$month,$year)
    {
        $day=(string)$day;
        $month=(string)$month;
        $year=(string)$year;

        if (strlen($day)==1) {
            $day='0'.$day;
        }
        if (strlen($month)==1) {
            $month='0'.$month;
        }
        $date=$year.'-'.$month.'-'.$day;

        return $date;
    }
    public static function toTime($time)
    {
        if ($time=="Mañana"){
            $time = "10:00:00";
        }
        if ($time=="Tarde"){
            $time = "14:00:00";
        }
        if ($time=="Noche"){
            $time = "22:00:00";
        }
        return $time;
    }
}
