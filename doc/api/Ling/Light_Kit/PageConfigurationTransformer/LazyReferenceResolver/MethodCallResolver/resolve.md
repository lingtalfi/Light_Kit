[Back to the Ling/Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md)<br>
[Back to the Ling\Light_Kit\PageConfigurationTransformer\LazyReferenceResolver\MethodCallResolver class](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/MethodCallResolver.md)


MethodCallResolver::resolve
================



MethodCallResolver::resolve — Interprets the given $expr and returns the result.




Description
================


public [MethodCallResolver::resolve](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/MethodCallResolver/resolve.md)(string $expr) : mixed




Interprets the given $expr and returns the result.

The given $expr should have one of the following format:

- $class::$method
- $class::$method ( $args )
- $class->$method
- $class->$method ( $args )

See the [ClassTool::executePhpMethod](https://github.com/lingtalfi/Bat/blob/master/ClassTool.md#executephpmethod-aka-smart-php-method-call) documentation for more details.




Parameters
================


- expr

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [MethodCallResolver::resolve](https://github.com/lingtalfi/Light_Kit/blob/master/PageConfigurationTransformer/LazyReferenceResolver/MethodCallResolver.php#L31-L34)


See Also
================

The [MethodCallResolver](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/MethodCallResolver.md) class.



