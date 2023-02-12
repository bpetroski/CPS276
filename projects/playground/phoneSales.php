<?php
class Phone {
    public $color;
    public $manufacturer;
    static public $numberSold = 13;
    }
Phone::$numberSold+=5;
echo Phone::$numberSold;
