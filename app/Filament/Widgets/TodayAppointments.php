<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class TodayAppointments extends BaseWidget
{
    
    protected function getCards(): array
    {
//        if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
//            $ip = $_SERVER["HTTP_CLIENT_IP"];
//        } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
//            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
//        } else {
//            $ip = $_SERVER["REMOTE_ADDR"];
//        }
        return [
            Card::make('Ваш Ip', \Request::ip()),
//            Card::make('Bounce rate', '21%'),
//            Card::make('Average time on page', '3:12'),
        ];
    }
}
