<?php
namespace Furesz\TypeChecker;

use DateTime;
use InvalidArgumentException;
use PHPUnit_Framework_TestCase;
use stdClass;

/**
 * Test for TypeChecker.
 *
 * @package TypeChecker
 *
 * @license Proprietary
 */
class TypeCheckerTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider validInstanceProvider
     *
     * @param mixed $variable
     * @param string $expectedType
     */
    public function testAssertInstanceOfPositive($variable, $expectedType)
    {
        TypeChecker::assertInstanceOf($variable, $expectedType);
    }

    /**
     * @dataProvider invalidInstanceProvider
     *
     * @expectedException \InvalidArgumentException
     *
     * @param mixed $variable
     * @param string $expectedType
     */
    public function testAssertInstanceOfThrowsException($variable, $expectedType)
    {
        TypeChecker::assertInstanceOf($variable, $expectedType);
    }

    /**
     * @return array
     */
    public function validInstanceProvider()
    {
        return [
            [new DateTime(), DateTime::class],
            [new stdClass(), stdClass::class],
        ];
    }

    /**
     * @return array
     */
    public function invalidInstanceProvider()
    {
        return [
            ['this is not an object', stdClass::class],
            [new DateTime(), stdClass::class],
            [new DateTime(), 1],
        ];
    }
}

