<?php
include 'RomanNumericals.php';
use kahlan\plugin\Stub;

describe("Roman Numericals", function() {
    beforeEach(function() {
        $this->roman_number = new RomanNumericals();
    });

    it("returns romman number < 5", function() {
        $roman_number_result = $this->roman_number->getRoman(1);
        expect($roman_number_result)->toBe('I');
    });

    it("returns romman number < 5", function() {
        $roman_number_result = $this->roman_number->getRoman(2);
        expect($roman_number_result)->toBe('II');
    });

    it("returns romman number < 5", function() {
        $roman_number_result = $this->roman_number->getRoman(3);
        expect($roman_number_result)->toBe('III');
    });

    it("returns romman number < 5", function() {
        $roman_number_result = $this->roman_number->getRoman(4);
        expect($roman_number_result)->toBe('IV');
    });
    it("returns romman number < 5", function() {
        $roman_number_result = $this->roman_number->getRoman(5);
        expect($roman_number_result)->toBe('V');
    });

    it("returns romman number < 5", function() {
        $roman_number_result = $this->roman_number->getRoman(6);
        expect($roman_number_result)->toBe('VI');
    });

    it("returns romman number < 5", function() {
        $roman_number_result = $this->roman_number->getRoman(7);
        expect($roman_number_result)->toBe('VII');
    });

    it("returns romman number < 5", function() {
        $roman_number_result = $this->roman_number->getRoman(8);
        expect($roman_number_result)->toBe('VIII');
    });
    it("returns romman number 9", function() {
        $roman_number_result = $this->roman_number->getRoman(9);
        expect($roman_number_result)->toBe('IX');
    });
});
