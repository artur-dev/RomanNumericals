<?php

/**
 * Class used for conversion decimal numbers to roman numbers
 */
class RomanNumericals {
    private $number;

    private $conversion_chart = [
        ['I', 'V', 'X'],
        ['X', 'L', 'C'],
        ['C', 'D', 'M'],
        ['M']
    ];

    public function __construct()
    {
    }

    public function getRoman($number)
    {
        if ($number < 1 || $number > 3999) {
            throw new Exception("Number out of bounds " . $number .".");
        }
        return $this->convert($number);
    }

    private function convertStep($number, $chart)
    {
        $s = '';

        switch ($number % 10) {
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
            case 5 :
            case 6 :
            case 7 :
            case 8 :
                $s = $chart[1];
                for ($i = 6; $i <= $number; $i++) {
                    $s .= $chart[0];
                }
                break;
            case 9 :
                $s = $chart[0] . $chart[2];
                break;
            default :
                throw new Exception('convertStep() didn\'t expect number other than 0-9');
        }

        return $s;
    }

    private function convert($number)
    {
        return $this->convertStep(floor(($number % 10000) / 1000), $this->conversion_chart[3])
            . $this->convertStep(floor(($number % 1000) / 100), $this->conversion_chart[2])
            . $this->convertStep(floor(($number % 100) / 10), $this->conversion_chart[1])
            . $this->convertStep($number % 10, $this->conversion_chart[0]);

    }
}