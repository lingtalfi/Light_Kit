<?php


namespace Ling\Light_Kit\PageConfigurationUpdator;


use Ling\Bat\ArrayTool;

/**
 * The PageConfUpdator class.
 */
class PageConfUpdator
{

    /**
     * This property holds the mergeArray for this instance.
     * It's an array to merge with the page configuration array, using the @page(arrayMergeReplaceRecursive technique).
     *
     *
     * @var array
     */
    protected $mergeArray;


    /**
     * Builds the PageConfUpdator instance.
     */
    public function __construct()
    {
        $this->mergeArray = [];
    }

    /**
     * Builds and returns a PageConfUpdator instance.
     * @return PageConfUpdator
     */
    public static function create(): PageConfUpdator
    {
        return new static();
    }


    /**
     * Updates the given $pageConf array.
     *
     * @param array $pageConf
     */
    public function update(array &$pageConf)
    {
        if ($this->mergeArray) {
            $pageConf = ArrayTool::arrayMergeReplaceRecursive([$pageConf, $this->mergeArray]);
        }
        /**
         * Todo if necessary: implement other update techniques. See my conception notes for more details.
         * https://github.com/lingtalfi/Light_Kit/blob/master/doc/pages/conception-notes.md
         */
    }
}