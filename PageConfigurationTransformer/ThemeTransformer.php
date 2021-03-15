<?php


namespace Ling\Light_Kit\PageConfigurationTransformer;


/**
 * The ThemeTransformer class.
 *
 *
 */
class ThemeTransformer implements PageConfigurationTransformerInterface
{

    /**
     * This property holds the theme for this instance.
     * @var string | null
     */
    protected ?string $theme;

    /**
     * Builds the ThemeTransformer instance.
     */
    public function __construct()
    {
        $this->theme = null;
    }

    /**
     * Sets the theme.
     *
     * @param string $theme
     */
    public function setTheme(string $theme)
    {
        $this->theme = $theme;
    }



    //--------------------------------------------
    // PageConfigurationTransformerInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function transform(array &$pageConfiguration)
    {
        if (array_key_exists("layout", $pageConfiguration)) {
            $pageConfiguration["layout"] = str_replace('$t', $this->theme, $pageConfiguration["layout"]);
        }
    }


}