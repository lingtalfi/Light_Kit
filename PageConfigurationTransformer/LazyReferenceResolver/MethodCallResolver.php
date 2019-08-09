<?php

namespace Ling\Light_Kit\PageConfigurationTransformer\LazyReferenceResolver;


use Ling\Bat\ClassTool;

/**
 * The MethodCallResolver class.
 */
class MethodCallResolver
{
    /**
     * Interprets the given $expr and returns the result.
     *
     * The given $expr should have one of the following format:
     *
     * - $class::$method
     * - $class::$method ( $args )
     * - $class->$method
     * - $class->$method ( $args )
     *
     * See the [ClassTool::executePhpMethod](https://github.com/lingtalfi/Bat/blob/master/ClassTool.md#executephpmethod-aka-smart-php-method-call) documentation for more details.
     *
     *
     *
     * @param string $expr
     * @return mixed
     * @throws \Exception
     */
    public function resolve(string $expr)
    {
        return ClassTool::executePhpMethod($expr);
    }
}