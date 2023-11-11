<?php

namespace App\Helpers;

use Carbon\Carbon;

class TimeHelpers
{
    public static function formatTimeDiff($dateTime)
{
    $now = Carbon::now();
    $diff = $now->diff($dateTime);

    if ($diff->s < 60) {
        return 'now';
    } elseif ($diff->i < 60) {
        return static::formatMinutes($diff->i);
    } elseif ($diff->h < 24) {
        return static::formatHours($diff->h);
    } elseif ($diff->d < 7) {
        return static::formatDays($diff->d);
    } elseif ($diff->m < 1) {
        return static::formatWeeks($diff->d);
    } elseif ($diff->y < 1) {
        return static::formatMonths($diff->m);
    } else {
        return static::formatDate($dateTime);
    }
}

public static function formatMinutes($minutes)
{
    return ($minutes == 1) ? '1 phút trước' : $minutes . ' phút trước';
}

public static function formatHours($hours)
{
    return ($hours == 1) ? '1 giờ trước' : $hours . ' giờ trước';
}

public static function formatDays($days)
{
    return ($days == 1) ? '1 ngày trước' : $days . ' ngày trước';
}

public static function formatWeeks($weeks)
{
    return ($weeks == 1) ? '1 tuần trước' : $weeks . ' tuần trước';
}

public static function formatMonths($months)
{
    return ($months == 1) ? '1 tháng trước' : $months . ' tháng trước';
}

public static function formatDate($dateTime)
{
    return $dateTime->format('d/m/Y');
}


}
