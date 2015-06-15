<?php

class RomanNumericals {
    private $number;

    private $conversion_chart = [
        ['I', 'V', 'X'],
    ];

    public function __construct()
    {
    }

    public function getRoman($number)
    {
        return $this->convert($number);
    }

    private function convertStep($number, $chart)
    {
        $s = '';

        switch ($number % 9) {
            case 0 :
            case 1 :
            case 2 :
            case 3 :
                for ($i = 1; $i <= $number; $i++) {
                    $s .= $chart[0];
                }
                break;
            case 4 :
                $s = $chart[0] . $chart[1];
                break;
        }

        return $s;
    }

    private function convert($number)
    {
        return
            $this->convertStep($number % 10, $this->conversion_chart[0]);

    }
}