<?php


namespace Ling\Light_Kit\PageRenderer;


use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Kit\ConfStorage\ConfStorageInterface;
use Ling\Kit\ConfStorage\VariableAwareConfStorageInterface;
use Ling\Kit\PageRenderer\KitPageRenderer;
use Ling\Light\Events\LightEvent;
use Ling\Light\ServiceContainer\LightDummyServiceContainer;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Events\Service\LightEventsService;
use Ling\Light_Kit\Exception\LightKitException;
use Ling\Light_Kit\Helper\WidgetVariablesHelper;
use Ling\Light_Kit\PageConfigurationTransformer\DynamicVariableAwareInterface;
use Ling\Light_Kit\PageConfigurationTransformer\PageConfigurationTransformerInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;


/**
 * The LightKitPageRenderer class.
 *
 *
 */
class LightKitPageRenderer extends KitPageRenderer
{

    /**
     * This property holds the applicationDir for this instance.
     * @var string
     */
    protected $applicationDir;

    /**
     * This property holds the confStorage for this instance.
     * @var ConfStorageInterface
     */
    protected $confStorage;

    /**
     * This property holds the pageName for this instance.
     * @var string
     */
    protected $pageName;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the array of pageConfTransformers for this instance.
     * @var PageConfigurationTransformerInterface[]
     */
    protected $pageConfTransformers;


    /**
     * Builds the LightKitPageRenderer instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->applicationDir = null;
        $this->pageName = null;
        $this->container = null;
        $this->pageConfTransformers = [];
    }

    /**
     * Sets the confStorage.
     *
     * @param ConfStorageInterface $confStorage
     * @return $this
     */
    public function setConfStorage(ConfStorageInterface $confStorage)
    {
        $this->confStorage = $confStorage;
        return $this;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Adds a PageConfigurationTransformerInterface to this instance.
     *
     * @param PageConfigurationTransformerInterface $transformer
     */
    public function addPageConfigurationTransformer(PageConfigurationTransformerInterface $transformer)
    {
        $this->pageConfTransformers[] = $transformer;
    }

    /**
     * Configures thi instance.
     *
     * The settings array contains the following:
     *
     * - application_dir: string. The path to the application directory
     *
     *
     * @param array $settings
     * @throws \Exception
     *
     */
    public function configure(array $settings)
    {
        if (array_key_exists('application_dir', $settings)) {

            $appDir = $settings['application_dir'];
            $this->applicationDir = $appDir;
            $this->setLayoutRootDir($appDir);
        } else {
            throw new LightKitException("configure error: the application_dir setting is missing.");
        }
    }


    /**
     * Renders the given page.
     *
     * Available options are:
     *
     * - widgetVariables: array. An array of @page(widget coordinates) => widgetConf variables. Use this array to override the "vars" entry of widget(s) configuration.
     * - widgetConf: array. An array of @page(widget coordinates) => widgetConf. Use this array to override one or more widget's configuration.
     *
     * - dynamicVariables: array. An array of variables to use to pass to the confStorage object and/or the transformers objects, if they need it.
     * - pageConfUpdator: PageConfUpdator = null. If defined, its transform method will be called first, before the transformer objects.
     *
     *
     * More about [widget coordinates](https://github.com/lingtalfi/Light_Kit/blob/master/doc/pages/conception-notes.md#widget-coordinates).
     *
     *
     *
     *
     * @param string $pageName
     * @param array $options
     * @return string
     * @throws \Exception
     */
    public function renderPage(string $pageName, array $options = []): string
    {


        $widgetVariables = $options['widgetVariables'] ?? [];
        $widgetConf = $options['widgetConf'] ?? [];
        $dynamicVariables = $options['dynamicVariables'] ?? [];
        $pageConfUpdator = $options['pageConfUpdator'] ?? null;


        if (null !== $this->applicationDir) {
            if (null !== $this->confStorage) {


                //--------------------------------------------
                // GET THE PAGE CONF
                //--------------------------------------------
                if ($this->confStorage instanceof VariableAwareConfStorageInterface) {
                    $this->confStorage->setVariables($dynamicVariables);
                }

                $pageConf = $this->confStorage->getPageConf($pageName);

                if (false !== $pageConf) {


                    //--------------------------------------------
                    // UPDATE THE CONF WITH WIDGET VARIABLES & CONF
                    //--------------------------------------------
                    if (count($widgetConf) > 0) {
                        WidgetVariablesHelper::injectWidgetConf($pageConf, $widgetConf);
                    }

                    if (count($widgetVariables) > 0) {
                        WidgetVariablesHelper::injectWidgetVariables($pageConf, $widgetVariables);
                    }


                    //--------------------------------------------
                    // UPDATE THE CONF WITH PAGE CONF UPDATOR
                    //--------------------------------------------
                    if (null !== $pageConfUpdator) {
                        /**
                         * @var $pageConfUpdator PageConfUpdator
                         */
                        $pageConfUpdator->update($pageConf);
                    }


                    //--------------------------------------------
                    // TRANSFORM PAGE CONF
                    //--------------------------------------------
                    foreach ($this->pageConfTransformers as $transformer) {
                        if ($transformer instanceof LightServiceContainerAwareInterface) {
                            $transformer->setContainer($this->getContainer());
                        }

                        if ($transformer instanceof DynamicVariableAwareInterface) {
                            $transformer->setVariables($dynamicVariables);
                        }
                        $transformer->transform($pageConf);
                    }


                    //--------------------------------------------
                    // CONFIGURATION
                    //--------------------------------------------
                    $this->pageName = $pageName;
                    $this->setPageConf($pageConf);


                    /**
                     * @var $events LightEventsService
                     */
                    $events = $this->container->get("events");
                    $event = LightEvent::createByContainer($this->container);
                    $event->setVar("pageConf", $pageConf);
                    $events->dispatch('Ling.Light_Kit.on_page_conf_ready', $event);


                    ob_start();
                    $this->printPage();
                    return ob_get_clean();
                } else {
                    throw new LightKitException("The configuration for page $pageName couldn't be retrieved. The given errors were: " . implode(", ", $this->confStorage->getErrors()));
                }

            } else {
                throw new LightKitException("The configuration storage is not set. Use the setConfStorage method.");
            }

        } else {
            throw new LightKitException("applicationDir not set. Use the configure method.");
        }
    }



    //--------------------------------------------
    // METHODS FOR LAYOUT
    //--------------------------------------------
    /**
     * Returns a light service container instance.
     * If no container is set, a dummy container is created on the fly and returned on subsequent calls.
     *
     * @return LightServiceContainerInterface
     */
    public function getContainer(): LightServiceContainerInterface
    {
        if (null === $this->container) {
            $this->container = new LightDummyServiceContainer();
        }
        return $this->container;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function getHtmlPageCopilot(): HtmlPageCopilot
    {
        if (null === $this->copilot) {
            $this->copilot = $this->getContainer()->get('html_page_copilot');
        }
        return $this->copilot;
    }


}