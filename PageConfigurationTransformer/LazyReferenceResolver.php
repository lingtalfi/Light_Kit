<?php


namespace Ling\Light_Kit\PageConfigurationTransformer;


use Ling\Bat\BDotTool;

/**
 * The LazyReferenceResolver class.
 */
class LazyReferenceResolver implements PageConfigurationTransformerInterface
{

    /**
     * This property holds the resolvers for this instance.
     * Each resolver is a callable.
     *
     *
     * @var array
     */
    protected $resolvers;

    /**
     * This property holds the strictMde for this instance.
     * See the resolve method for more details.
     * @var bool = false
     */
    protected $strictMode;


    /**
     * Builds the LazyReferenceResolver instance.
     */
    public function __construct()
    {
        $this->resolvers = [];
        $this->strictMode = false;
    }

    /**
     * Sets the strictMde.
     *
     * @param bool $strictMode
     */
    public function setStrictMode(bool $strictMode)
    {
        $this->strictMode = $strictMode;
    }

    /**
     * Sets the resolvers.
     *
     * @param array $resolvers
     */
    public function setResolvers(array $resolvers)
    {
        $this->resolvers = $resolvers;
    }


    /**
     * Registers the resolver and assigns it to the given token.
     * Note: only one resolver max can be assigned to a given token.
     *
     * @param string $token
     * @param callable $resolver
     */
    public function registerResolver(string $token, callable $resolver)
    {
        $this->resolvers[$token] = $resolver;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    public function transform(array &$pageConfiguration)
    {


        if ($this->resolvers) {


            // example: (::METHOD_CALL::)whatever
            $regex = '!\(::([^:]*)::\)(.*)!';

            BDotTool::walk($pageConfiguration, function (&$v, $key, $dotPath) use (&$array, $regex) {

                if (is_string($v)) {
                    if (0 === strpos($v, '(::')) {
                        if (preg_match($regex, $v, $match)) {

                            $token = $match[1];
                            $whatever = $match[2];

                            if (array_key_exists($token, $this->resolvers)) {
                                $resolver = $this->resolvers[$token];
                                $replace = call_user_func($resolver, $whatever);
                                BDotTool::setDotValue($dotPath, $replace, $array);
                            }
                        }
                    }
                }
            });
        }
    }
}