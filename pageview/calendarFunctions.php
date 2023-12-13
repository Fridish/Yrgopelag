<?php
class Calendar extends DateTime
{
    protected $year;
    protected $month;
    protected $week = [];
    public function getYear()
    {
        return $this->year;
    }
    public function setYear($year)
    {
        $this->year = $year;
    }
    public function getMonth()
    {
        return $this->month;
    }
    public function setMonth($month)
    {
        $this->month = $month;
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

        $days = array_fill(0, $startDay - 1, "");

        for ($i = 1; $i <= $monthDays; $i++) {
            $days[] = $i;
        }
        $this->week = array_chunk($days, 7);
    }
}
