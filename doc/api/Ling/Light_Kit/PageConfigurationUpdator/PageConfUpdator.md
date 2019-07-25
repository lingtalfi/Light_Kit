[Back to the Ling/Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md)



The PageConfUpdator class
================
2019-04-25 --> 2019-07-25






Introduction
============

The PageConfUpdator class.



Class synopsis
==============


class <span class="pl-k">PageConfUpdator</span>  {

- Properties
    - protected array [$mergeArray](#property-mergeArray) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/__construct.md)() : void
    - public static [create](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/create.md)() : [PageConfUpdator](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator.md)
    - public [update](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/update.md)(array &$pageConf) : void

}




Properties
=============

- <span id="property-mergeArray"><b>mergeArray</b></span>

    This property holds the mergeArray for this instance.
    It's an array to merge with the page configuration array, using the [arrayMergeReplaceRecursive technique](https://github.com/lingtalfi/Bat/blob/master/ArrayTool.md#arraymergereplacerecursive).
    
    



Methods
==============

- [PageConfUpdator::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/__construct.md) &ndash; Builds the PageConfUpdator instance.
- [PageConfUpdator::create](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/create.md) &ndash; Builds and returns a PageConfUpdator instance.
- [PageConfUpdator::update](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationUpdator/PageConfUpdator/update.md) &ndash; Updates the given $pageConf array.





Location
=============
Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator<br>
See the source code of [Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator](https://github.com/lingtalfi/Light_Kit/blob/master/PageConfigurationUpdator/PageConfUpdator.php)



SeeAlso
==============
Previous class: [PageConfigurationTransformerInterface](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/PageConfigurationTransformerInterface.md)<br>Next class: [LightKitPageRenderer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer.md)<br>
