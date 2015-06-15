<?php
//namespace CodeKata\Supermarket\Tests\Models;
include 'RomanNumericals.php';
use kahlan\plugin\Stub;
//    CodeKata\Supermarket\Models\UnitPrice;

describe("Roman Numericals", function() {
    beforeEach(function() {
        $this->roman_number = new RomanNumericals();
    });

    it("returns romman number < 10", function() {
        $roman_number_result = $this->roman_number->getRoman(1);
        expect($roman_number_result)->toBe('I');
    });

    it("returns romman number < 100", function() {
        $roman_number_result = $this->roman_number->getRoman(2);
        expect($roman_number_result)->toBe('II');
    });

    it("returns romman number < 1000", function() {
        $roman_number_result = $this->roman_number->getRoman(3);
        expect($roman_number_result)->toBe('III');
    });
});
