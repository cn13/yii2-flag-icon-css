<?php
/**
 * @author Harry Tang <harry@modernkernel.com>
 * @link https://modernkernel.com
 * @copyright Copyright (c) 2016 Modern Kernel
 */

namespace modernkernel\flagiconcss;


use yii\base\Widget;
use yii\bootstrap\Html;

/**
 * Class Flag
 * @package modernkernel\flagiconcss
 */
class Flag extends Widget
{

    public $tag = 'span';

    public $country; // the ISO 3166-1-alpha-2 code of a country,
    public $squared = false; // set to true if you want to have a squared version flag

    public $options = [];


    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub
        if (!empty($this->country)) {
            $class = 'flag-icon flag-icon-' . $this->country;
            Html::addCssClass($this->options, $class);
            if ($this->squared) {
                Html::addCssClass($this->options, 'flag-icon-squared');
            }

            $this->register();
            echo Html::beginTag('span', $this->options);
            echo Html::endTag('span');

        }
    }

    /**
     * register assets
     */
    protected function register()
    {
        $view = $this->getView();
        FlagiconcssAsset::register($view);
    }
}