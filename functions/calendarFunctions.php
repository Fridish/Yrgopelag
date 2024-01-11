<?php

declare(strict_types=1);
class Calendar extends DateTime
{
    protected $year = 2024;
    protected $month = 1;
    protected $week = [];
    public function getYear()
    {
        return $this->year;
    }
    public function getMonth()
    {
        return $this->month;
    }
    public function getWeek()
    {
        return $this->week;
    }
    public function create()
    {
        $date = $this->setDate($this->getYear(), $this->getMonth(), 1);
        $monthDays = $date->format('t');
        $startDay = $date->format('N');

        $days = array_fill(0, $startDay - 1, ""); //-1 så veckan börjar på en måndag

        for ($i = 1; $i <= $monthDays; $i++) {
            $days[] = $i;
        }
        $this->week = array_chunk($days, 7);
    }
}
