<?php
namespace kahlan\spec\suite\jit\patcher;

use jit\Interceptor;
use kahlan\IncompleteException;
use kahlan\jit\patcher\DummyClass as DummyClassPatcher;
use kahlan\plugin\DummyClass;
use kahlan\plugin\Stub;

describe("DummyClass", function() {

    /**
     * Warning: with a no namespaces limitation configuration all is_callable will
     * return true which can have some side effects.
     */
    context("when no namespaces limitation is set", function() {
        /**
         * Save current & reinitialize the Interceptor class.
         */
        beforeEach(function() {
            $this->previous = Interceptor::instance();
            Interceptor::unpatch();

            $cachePath = rtrim(sys_get_temp_dir(), DS) . DS . 'kahlan';
            $include = ['kahlan\\spec\\'];
            $interceptor = Interceptor::patch(compact('include', 'cachePath'));
            $interceptor->patchers()->add('substitute', new DummyClassPatcher());

        });

        /**
         * Restore Interceptor class.
         */
        afterEach(function() {
            Interceptor::load($this->previous);
        });

        it("throws an IncompleteException when creating an unexisting class", function() {

            $closure = function() {
                $mock = new Abcd();
                $mock->helloWorld();
            };
            expect($closure)->toThrow(new IncompleteException);

        });

        it("allows magic call static on live mock", function() {

            expect(function(){ Abcd::helloWorld(); })->toThrow(new IncompleteException);

        });

        it("makes `class_exists` to return `true` when enabled", function() {

            $closure = function() {
                return class_exists('KahlanDummyClass1');
            };

            $result = $closure();
            expect($result)->toBe(true);

        });

        it("allows `class_exists` to return `false` when disabled", function() {

            DummyClass::disable();

            $closure = function() {
                return class_exists('KahlanDummyClass2');
            };

            $result = $closure();
            expect($result)->toBe(false);

        });

    });

    context("when limiting to a specific namespace", function() {
        /**
         * Save current & reinitialize the Interceptor class.
         */
        beforeEach(function() {
            $this->previous = Interceptor::instance();
            Interceptor::unpatch();

            $cachePath = rtrim(sys_get_temp_dir(), DS) . DS . 'kahlan';
            $include = ['kahlan\\spec\\'];
            $interceptor = Interceptor::patch(compact('include', 'cachePath'));
            $interceptor->patchers()->add('substitute', new DummyClassPatcher(['namespaces' => ['kahlan\spec\\']]));
        });

        /**
         * Restore Interceptor class.
         */
        afterEach(function() {
            Interceptor::load($this->previous);
        });

        it("throws an IncompleteException when creating an unexisting class", function() {

            $closure = function() {
                $mock = new Abcde();
                $mock->helloWorld();
            };
            expect($closure)->toThrow(new IncompleteException);

        });

        it("allows magic call static on live mock", function() {

            expect(function(){ Abcde::helloWorld(); })->toThrow(new IncompleteException);

        });

    });

    describe("::enable()", function() {

        it("enables dummies", function() {

            DummyClass::disable();
            expect(DummyClass::enabled())->toBe(false);

            DummyClass::enable();
            expect(DummyClass::enabled())->toBe(true);

        });

    });

    describe("::disable()", function() {

        it("disables dummies", function() {

            DummyClass::enable();
            expect(DummyClass::enabled())->toBe(true);

            DummyClass::disable();
            expect(DummyClass::enabled())->toBe(false);

        });

    });

});
