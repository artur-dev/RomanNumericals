# Change Log

## Last changes

## 1.1.4 (2015-06-04)

  * **Bugfix:** makes report backtrace more accurate on exceptions.

## 1.1.3 (2015-03-21)

  * **Add:** remove composer minimum stability requirement.

## 1.1.2 (2015-03-20)

  * **Add:** adds the command line --cc option to clear the cache.
  * **Add:** auto clear cache on "composer update".
  * **Add:** adds the command line --version option.
  * **Add:** adds `toMatchEcho` matcher.
  * **Bugfix:** fixes report duplication of some skip exceptions.
  * **Bugfix:** resets `not` to false after any matcher call.

## 1.1.1 (2015-03-17)

  * **Bugfix:** fixes a double open tag issue with the `Layer` patcher.
  * **Bugfix:** fixes missing pointcut patching in the `Layer` patcher.

## 1.1.0 (2015-02-25)

  * **Add:** allows Stubs to override all public method of their parent class by setting the `'layer'` option to `true`.
  * **Add:** introduces the `Layer` proxy to be able to stub methods inherited from PHP core method.
  * **Change:** the look & feel of reporters has been modified.
  * **Bugfix:** adds a default value for stubbed function parameters only when exists.
  * **Bugfix:** returns absolute namespace for typehint
  * **Bugfix:** generalizes method overriding with stubs.
  * **BC break:** the Stubs `'params'` option now identifies each values to pass to `__construct()`.
  * **BC break:** reporter's hooks has been renamed and now receive a report instance as parameter instead of an array.

## 1.0.6 (2015-02-11)

  * **Add:** implements missing Jasmine `expect(string)->toContain(substring)` behavior.
  * **Change:** Allows arguments to also be set in kahlan config files.
  * **Bugfix:** fixes Monkey patcher when some patchable code are outside namespaces/classes or functions.

## 1.0.5 (2015-02-10)

  * **Bugfix:** resolves default cache path (based on`sys_get_temp_dir()`) to be a real dir on OS X.

## 1.0.4 (2015-02-03)

  * **Deprecate:** deprecates ddescribe/ccontext/iit in flavor of fdescribe/fcontext/fit (Jasmine 2.x naming)

## 1.0.3 (2015-02-02)

  * **Bugfix:** fixes `use` statement patching for partial namespace

## 1.0.2 (2015-02-01)

  * **Change:** the terminal reporter displaying has been modified
  * **Bugfix:** fixes code coverage driver to make it work with HHVM
  * **BC break:** the `'autoloader'` filter entry point has been renamed to `'interceptor'`

## 1.0.1 (2015-01-28)

  * **Add:** new reporter `--reporter=verbose`

## 1.0.0 (2015-01-24)

  * Initial Stable Release
