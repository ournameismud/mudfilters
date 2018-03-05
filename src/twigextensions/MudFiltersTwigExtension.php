<?php
/**
 * Mud Filters plugin for Craft CMS 3.x
 *
 * Plugin for custom Mud filters
 *
 * @link      http://ournameismud.co.uk/
 * @copyright Copyright (c) 2018 @cole007
 */

namespace ournameismud\mudfilters\twigextensions;

use ournameismud\mudfilters\MudFilters;

use Craft;

/**
 * @author    @cole007
 * @package   MudFilters
 * @since     1.0.0
 */
class MudFiltersTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'MudFilters';
    }

    /**
     * @inheritdoc
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('with', [$this, 'with']),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('with', [$this, 'witha `with` w']),
        ];
    }

    /**
     * @param null $text
     *
     * @return string
     */
    public function with($src, $filter)
    {
        $filterKey = key($filter);
        $filterValue = $filter[$filterKey];
        foreach ($src AS $key => $value) {
            if ($value[$filterKey] != $filterValue) unset($src[$key]);            
        }
        return $src;
    }
}
