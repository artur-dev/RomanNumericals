<?php
//namespace CodeKata\Supermarket\Tests\Models;
include 'RomanNumericals.class.php';
use kahlan\plugin\Stub;
//    CodeKata\Supermarket\Models\UnitPrice;

describe("Roman Numericals", function() {
    beforeEach(function() {
        $romman_number = new RomanNumericals();
        $roman_number_result = $roman_number->getRoman(5);
    });

    it("returns romman number < 10", function() {
        expect($roman_number_result)->toBe('V');
    });

    it("returns romman number < 100", function() {
        expect($roman_number_result\)->toBe('');
    });

    it("returns romman number < 1000", function() {
        expect($roman_number_result\)->toBe('');
    });
});
