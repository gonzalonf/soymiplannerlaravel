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
    public function user()
    {
        return $this->belongsTo('App\User');
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
    public static function toHumanTime($time)
    {
        if ($time=="10:00:00"){
            $time = "Mañana";
        }
        if ($time=="14:00:00"){
            $time = "Tarde";
        }
        if ($time=="22:00:00"){
            $time = "Noche";
        }
        return $time;
    }
    public static function toHumanDate($date)
    {
        $dateArray = explode('-',$date);

        $day = $dateArray[2];
        $month = $dateArray[1];
        $year = $dateArray[0];

        if ($day[0]=='0'){
            $day = substr($day,1,1);
        }
        if ($month[0]=='0'){
            $month = substr($month,1,1);
        }
        $date=$day.'/'.$month.'/'.$year;

        return $date;
    }

}