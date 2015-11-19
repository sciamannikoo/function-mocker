<?php
namespace tests\tad\FunctionMocker; \Patchwork\Interceptor\deployQueue();


use tad\FunctionMocker\FunctionMocker as Sut;

class FunctionMockerStaticMethodConstraintsCheckTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {$__pwClosureName=__NAMESPACE__?__NAMESPACE__."\{closure}":"{closure}";$__pwClass=(__CLASS__&&__FUNCTION__!==$__pwClosureName)?__CLASS__:null;if(!empty(\Patchwork\Interceptor\State::$patches[$__pwClass][__FUNCTION__])){$__pwCalledClass=$__pwClass?\get_called_class():null;$__pwFrame=\count(\debug_backtrace(false));if(\Patchwork\Interceptor\intercept($__pwClass,$__pwCalledClass,__FUNCTION__,$__pwFrame,$__pwResult)){return$__pwResult;}}unset($__pwClass,$__pwCalledClass,$__pwResult,$__pwClosureName,$__pwFrame);
        Sut::setUp();
    }

    public function tearDown()
    {$__pwClosureName=__NAMESPACE__?__NAMESPACE__."\{closure}":"{closure}";$__pwClass=(__CLASS__&&__FUNCTION__!==$__pwClosureName)?__CLASS__:null;if(!empty(\Patchwork\Interceptor\State::$patches[$__pwClass][__FUNCTION__])){$__pwCalledClass=$__pwClass?\get_called_class():null;$__pwFrame=\count(\debug_backtrace(false));if(\Patchwork\Interceptor\intercept($__pwClass,$__pwCalledClass,__FUNCTION__,$__pwFrame,$__pwResult)){return$__pwResult;}}unset($__pwClass,$__pwCalledClass,$__pwResult,$__pwClosureName,$__pwFrame);
        Sut::tearDown();
    }

    public function callsAndPrimitivesCheck()
    {$__pwClosureName=__NAMESPACE__?__NAMESPACE__."\{closure}":"{closure}";$__pwClass=(__CLASS__&&__FUNCTION__!==$__pwClosureName)?__CLASS__:null;if(!empty(\Patchwork\Interceptor\State::$patches[$__pwClass][__FUNCTION__])){$__pwCalledClass=$__pwClass?\get_called_class():null;$__pwFrame=\count(\debug_backtrace(false));if(\Patchwork\Interceptor\intercept($__pwClass,$__pwCalledClass,__FUNCTION__,$__pwFrame,$__pwResult)){return$__pwResult;}}unset($__pwClass,$__pwCalledClass,$__pwResult,$__pwClosureName,$__pwFrame);
        return [
            [['foo', 'foo'], ['foo', 'foo'], true],
            [['foo', 'foo'], ['baz', 'foo'], false],
            [['foo', 'foo'], ['baz', 'baz'], false],
            [['foo', 'foo'], ['foo', 'baz'], false],
            [[1, 2], [1, 2], true],
            [[1, 2], [1, 1], false],
            [[1, 2], [2, 1], false],
            [[1, 2], [2, 2], false],
            [[array(1, 2), array(3, 4)], [array(1, 2), array(3, 4)], true],
            [[array(1, 2), array(3, 4)], [array(5, 6), array(3, 4)], false],
            [[array(1, 2), array(3, 4)], [array(5, 6), array(5, 6)], false],
            [[array(1, 2), array(3, 4)], [array(1, 2), array(5, 6)], false]
        ];
    }

    /**
     * @test
     * it should allow verifying method call expectations on static methods using primitives
     * @dataProvider callsAndPrimitivesCheck
     */
    public function it_should_allow_verifying_method_call_expectations_on_static_methods_using_primitives($in, $exp, $shouldPass)
    {$__pwClosureName=__NAMESPACE__?__NAMESPACE__."\{closure}":"{closure}";$__pwClass=(__CLASS__&&__FUNCTION__!==$__pwClosureName)?__CLASS__:null;if(!empty(\Patchwork\Interceptor\State::$patches[$__pwClass][__FUNCTION__])){$__pwCalledClass=$__pwClass?\get_called_class():null;$__pwFrame=\count(\debug_backtrace(false));if(\Patchwork\Interceptor\intercept($__pwClass,$__pwCalledClass,__FUNCTION__,$__pwFrame,$__pwResult)){return$__pwResult;}}unset($__pwClass,$__pwCalledClass,$__pwResult,$__pwClosureName,$__pwFrame);
        if (!$shouldPass) {
            $this->setExpectedException('\PHPUnit_Framework_AssertionFailedError');
        }

        $sut = Sut::replace(__NAMESPACE__ . '\ConstraintClass::methodOne');

        call_user_func_array([__NAMESPACE__ . '\ConstraintClass', 'methodOne'], $in);

        $sut->wasCalledWithOnce($exp);
    }

    public function callsAndConstraints()
    {$__pwClosureName=__NAMESPACE__?__NAMESPACE__."\{closure}":"{closure}";$__pwClass=(__CLASS__&&__FUNCTION__!==$__pwClosureName)?__CLASS__:null;if(!empty(\Patchwork\Interceptor\State::$patches[$__pwClass][__FUNCTION__])){$__pwCalledClass=$__pwClass?\get_called_class():null;$__pwFrame=\count(\debug_backtrace(false));if(\Patchwork\Interceptor\intercept($__pwClass,$__pwCalledClass,__FUNCTION__,$__pwFrame,$__pwResult)){return$__pwResult;}}unset($__pwClass,$__pwCalledClass,$__pwResult,$__pwClosureName,$__pwFrame);
        return [
            [['foo', 'foo'], [Sut::isType('string'), 'foo'], true],
            [['foo', 'foo'], ['baz', Sut::isType('string')], false],
            [['foo', 'foo'], [Sut::isType('array'), Sut::isType('array')], false],
            [[1, 2], [Sut::isType('int'), Sut::isType('int')], true],
            [[1, 2], [Sut::isType('string'), Sut::isType('int')], false],
            [[1, 2], [Sut::isType('string'), Sut::isType('string')], false],
            [[array(1, 2), array(3, 4)], [Sut::isType('array'), array(3, 4)], true],
            [[array(1, 2), array(3, 4)], [Sut::isType('array'), Sut::isType('array')], true],
            [[new \stdClass(), array(3, 4)], [Sut::isInstanceOf('\stdClass'), Sut::isType('array')], true],
            [[new \stdClass(), array(3, 4)], [Sut::isInstanceOf('\stdClass'), array(3, 4)], true],
            [[new \stdClass(), array(3, 4)], [Sut::anything(), Sut::anything()], true]
        ];
    }

    /**
     * @test
     * it should allow to check method call args using PHPUnit constraints
     * @dataProvider callsAndConstraints
     */
    public function it_should_allow_to_check_method_call_args_using_php_unit_constraints($in, $exp, $shouldPass)
    {$__pwClosureName=__NAMESPACE__?__NAMESPACE__."\{closure}":"{closure}";$__pwClass=(__CLASS__&&__FUNCTION__!==$__pwClosureName)?__CLASS__:null;if(!empty(\Patchwork\Interceptor\State::$patches[$__pwClass][__FUNCTION__])){$__pwCalledClass=$__pwClass?\get_called_class():null;$__pwFrame=\count(\debug_backtrace(false));if(\Patchwork\Interceptor\intercept($__pwClass,$__pwCalledClass,__FUNCTION__,$__pwFrame,$__pwResult)){return$__pwResult;}}unset($__pwClass,$__pwCalledClass,$__pwResult,$__pwClosureName,$__pwFrame);
        if (!$shouldPass) {
            $this->setExpectedException('\PHPUnit_Framework_AssertionFailedError');
        }

        $sut = Sut::replace(__NAMESPACE__ . '\ConstraintClass::methodOne');

        call_user_func_array([__NAMESPACE__ . '\ConstraintClass', 'methodOne'], $in);

        $sut->wasCalledWithOnce($exp);
    }
}\Patchwork\Interceptor\deployQueue();

class ConstraintClass
{
    public static function methodOne($arg1, $arg2)
    {$__pwClosureName=__NAMESPACE__?__NAMESPACE__."\{closure}":"{closure}";$__pwClass=(__CLASS__&&__FUNCTION__!==$__pwClosureName)?__CLASS__:null;if(!empty(\Patchwork\Interceptor\State::$patches[$__pwClass][__FUNCTION__])){$__pwCalledClass=$__pwClass?\get_called_class():null;$__pwFrame=\count(\debug_backtrace(false));if(\Patchwork\Interceptor\intercept($__pwClass,$__pwCalledClass,__FUNCTION__,$__pwFrame,$__pwResult)){return$__pwResult;}}unset($__pwClass,$__pwCalledClass,$__pwResult,$__pwClosureName,$__pwFrame);

    }
}\Patchwork\Interceptor\deployQueue();