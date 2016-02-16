<?php
namespace Insight\Validation;

use InvalidArgumentException;

/**
 * Check variable type.
 *
 * @package TypeChecker
 *
 * @license Proprietary
 */
class TypeChecker
{
    const T_ARRAY = 'array';
    const T_BOOLEAN = 'boolean';
    const T_DOUBLE = 'double';
    const T_INTEGER = 'integer';
    const T_NULL = 'NULL';
    const T_OBJECT = 'object';
    const T_STRING = 'string';
    const T_UNKNOWN = 'unknown type';

    /**
     * @param mixed $variable
     * @param string $name
     *
     * @throws \InvalidArgumentException If variable is boolean.
     *
     * @return void
     */
    public static function assertBoolean($variable, $name)
    {
        static::assertType($variable, static::T_BOOLEAN, $name);
    }

    /**
     * @param mixed $variable
     * @param string $name
     *
     * @throws \InvalidArgumentException If variable is not double / (float).
     *
     * @return void
     */
    public static function assertDouble($variable, $name)
    {
        static::assertType($variable, static::T_DOUBLE, $name);
    }

    /**
     * @param mixed $variable
     * @param string $name
     *
     * @throws \InvalidArgumentException If variable is not integer.
     *
     * @return void
     */
    public static function assertInteger($variable, $name)
    {
        static::assertType($variable, static::T_INTEGER, $name);
    }

    /**
     * @param mixed $variable
     * @param string $name
     *
     * @throws \InvalidArgumentException If variable is not null.
     *
     * @return void
     */
    public static function assertNull($variable, $name)
    {
        static::assertType($variable, static::T_NULL, $name);
    }

    /**
     * @param mixed $variable
     * @param string $name
     *
     * @throws \InvalidArgumentException If variable is not an object.
     *
     * @return void
     */
    public static function assertObject($variable, $name)
    {
        static::assertType($variable, static::T_OBJECT, $name);
    }

    /**
     * @param mixed $variable
     * @param string $name
     *
     * @throws \InvalidArgumentException If variable is not a string.
     *
     * @return void
     */
    public static function assertString($variable, $name)
    {
        static::assertType($variable, static::T_STRING, $name);
    }

    /**
     * @param mixed $variable
     * @param string $name
     *
     * @throws \InvalidArgumentException If variable is not array.
     *
     * @return void
     */
    public function assertArray($variable, $name)
    {
        static::assertType($variable, static::T_ARRAY, $name);
    }

    /**
     * @param mixed $variable
     * @param string|object $expectedInstanceOf
     *
     * @throws \InvalidArgumentException If variable is not the expected type.
     * @throws \InvalidArgumentException If expectedInstanceOf not string or object.
     *
     * @return void
     */
    public static function assertInstanceOf($variable, $expectedInstanceOf)
    {
        if (!is_string($expectedInstanceOf) && !is_object($expectedInstanceOf)) {
            throw new InvalidArgumentException(
                sprintf(
                    '$expectedInstanceOf should be a string or object, got %s',
                    gettype($expectedInstanceOf)
                )
            );
        }

        if (! $variable instanceof $expectedInstanceOf) {
            throw new InvalidArgumentException(
                sprintf(
                    'The variable is not hold the expected type of instance. [Expected: %s, Given: %s]',
                    $expectedInstanceOf,
                    is_object($variable) ? get_class($variable) : gettype($variable)
                )
            );
        }
    }

    /**
     * @param mixed $variable
     * @param string $expectedType
     * @param string $name
     *
     * @throws \InvalidArgumentException If variable is not match with the expected.
     *
     * @return void
     */
    public static function assertType($variable, $expectedType, $name)
    {
        if (gettype($variable) !== $expectedType) {
            throw new InvalidArgumentException(
                sprintf(
                    '%s should be a %s, received %s',
                    $name,
                    $expectedType,
                    gettype($variable)
                )
            );
        }
    }
}
