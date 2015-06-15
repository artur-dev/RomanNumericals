<?php
use kahlan\Suite;
use kahlan\Spec;

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
error_reporting(E_ALL);

if (!defined('KAHLAN_DISABLE_FUNCTIONS') || !KAHLAN_DISABLE_FUNCTIONS) {

    function before($closure) {
        return Suite::current()->before($closure);
    }

    function after($closure) {
        return Suite::current()->after($closure);
    }

    function beforeEach($closure) {
        return Suite::current()->beforeEach($closure);
    }

    function afterEach($closure) {
        return Suite::current()->afterEach($closure);
    }

    function describe($message, $closure, $scope = 'normal') {
        if (!Suite::current()) {
            $suite = box('kahlan')->get('suite.global');
            return $suite->describe($message, $closure, $scope);
        }
        return Suite::current()->describe($message, $closure, $scope);
    }

    function context($message, $closure, $scope = 'normal') {
        return Suite::current()->context($message, $closure, $scope);
    }

    function it($message, $closure = null, $scope = 'normal') {
        return Suite::current()->it($message, $closure, $scope);
    }

    function fdescribe($message, $closure) {
        return describe($message, $closure, 'focus');
    }

    function fcontext($message, $closure) {
        return context($message, $closure, 'focus');
    }

    function fit($message, $closure = null) {
        return it($message, $closure, 'focus');
    }

    function xdescribe($message, $closure) {
    }

    function xcontext($message, $closure) {
    }

    function xit($message, $closure = null) {
    }

    /**
     * Deprecated method use `fdescribe`.
     */
    function ddescribe($message, $closure) {
        return fdescribe($message, $closure);
    }

    /**
     * Deprecated method use `fcontext`.
     */
    function ccontext($message, $closure) {
        return fcontext($message, $closure);
    }

    /**
     * Deprecated method use `fit`.
     */
    function iit($message, $closure = null) {
        return fit($message, $closure);
    }

    /**
     * @param $actual
     *
     * @return kahlan\Matcher
     */
    function expect($actual) {
        return Spec::current()->expect($actual);
    }

    function skipIf($condition) {
        $current = Spec::current() ?: Suite::current();
        return $current->skipIf($condition);
    }
}
