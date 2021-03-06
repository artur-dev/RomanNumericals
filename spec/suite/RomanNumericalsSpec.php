<?php
include 'RomanNumericals.php';
use kahlan\plugin\Stub;

describe("Roman Numericals", function() {
    beforeEach(function() {
        $this->roman_number = new RomanNumericals();
    });

    context("Testing numbers between 1 - 9", function() {
        $numbers = [1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V',
        6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX'];
        foreach ($numbers as $key => $value) {
            it("returns romman $value when the number is $key ", function() use($key, $value) {
                $roman_number_result = $this->roman_number->getRoman($key);
                expect($roman_number_result)->toBe($value);
            });
        }
    });

    context("Testing numbers between 10 - 99", function() {
        $numbers = [10 => 'X', 26 => 'XXVI', 33 => 'XXXIII', 41 => 'XLI', 58 => 'LVIII',
        66 => 'LXVI', 74 => 'LXXIV', 87 => 'LXXXVII', 99 => 'XCIX'];
        foreach ($numbers as $key => $value) {
            it("returns romman $value when the number is $key ", function() use($key, $value) {
                $roman_number_result = $this->roman_number->getRoman($key);
                expect($roman_number_result)->toBe($value);
            });
        }
    });

    context("Testing numbers between 100 - 999", function() {
        $numbers = [100 => 'C', 268 => 'CCLXVIII', 330 => 'CCCXXX'];
        foreach ($numbers as $key => $value) {
            it("returns romman $value when the number is $key ", function() use($key, $value) {
                $roman_number_result = $this->roman_number->getRoman($key);
                expect($roman_number_result)->toBe($value);
            });
        }
    });
    it("returns romman for 3999 ", function() {
                $roman_number_result = $this->roman_number->getRoman(3999);
                expect($roman_number_result)->toBe('MMMCMXCIX');
    });

    it("throws exception for negative numbers ", function() {
                expect(function() {
                    $roman_number = new RomanNumericals();
                    $roman_number_result = $roman_number->getRoman(-299);
                })->toThrow(new Exception('Number out of bounds -299.'));
    });
});
