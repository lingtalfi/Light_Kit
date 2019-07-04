[Back to the Ling/Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md)



The LazyReferenceResolver class
================
2019-04-25 --> 2019-07-04






Introduction
============

The LazyReferenceResolver class.



Class synopsis
==============


class <span class="pl-k">LazyReferenceResolver</span> implements [PageConfigurationTransformerInterface](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/PageConfigurationTransformerInterface.md) {

- Properties
    - protected array [$resolvers](#property-resolvers) ;
    - protected bool [$strictMode](#property-strictMode) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/__construct.md)() : void
    - public [setStrictMode](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/setStrictMode.md)(bool $strictMode) : void
    - public [setResolvers](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/setResolvers.md)(array $resolvers) : void
    - public [registerResolver](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/registerResolver.md)(string $token, callable $resolver) : void
    - public [transform](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/transform.md)(array &$pageConfiguration) : void

}




Properties
=============

- <span id="property-resolvers"><b>resolvers</b></span>

    This property holds the resolvers for this instance.
    Each resolver is a callable.
    
    

- <span id="property-strictMode"><b>strictMode</b></span>

    This property holds the strictMde for this instance.
    See the resolve method for more details.
    
    



Methods
==============

- [LazyReferenceResolver::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/__construct.md) &ndash; Builds the LazyReferenceResolver instance.
- [LazyReferenceResolver::setStrictMode](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/setStrictMode.md) &ndash; Sets the strictMde.
- [LazyReferenceResolver::setResolvers](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/setResolvers.md) &ndash; Sets the resolvers.
- [LazyReferenceResolver::registerResolver](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/registerResolver.md) &ndash; Registers the resolver and assigns it to the given token.
- [LazyReferenceResolver::transform](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/transform.md) &ndash; 





Location
=============
Ling\Light_Kit\PageConfigurationTransformer\LazyReferenceResolver


SeeAlso
==============
Previous class: [MethodCallResolver](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/MethodCallResolver.md)<br>Next class: [PageConfigurationTransformerInterface](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/PageConfigurationTransformerInterface.md)<br>
