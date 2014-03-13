<?php

namespace kato;

//use yii\helpers\Html;
use kato\DropZoneAsset;

/**
 * Usage: \kato\DropZone::widget();
 * Class DropZone
 * @package kato
 */
class DropZone extends \yii\base\widget
{
    /**
     * Initializes the widget
     * @throw InvalidConfigException
     */
    public function init()
    {
        parent::init();

        $this->registerAssets();
        //echo Html::tag('div', $this->renderInput(), $this->containerOptions);
    }

    public function run()
    {
        return "Hello!";
    }

    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        DropZoneAsset::register($view);
    }
}
