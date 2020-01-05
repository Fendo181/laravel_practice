<?php


namespace App\Service;

use App\Exceptions\PreConditionException;


class CalculatePointService
{
    public static function calcPoint(int $amount)
    {
        if($amount <0 ){
            throw new PreConditionException();
        }

        if($amount < 1000 ){
            return 0;
        }

        if($amount < 1000) {
            $basePoint = 1;
        }else {
            $basePoint = 2;
        }

        return intval($amount / 100) * $basePoint;

    }
}
