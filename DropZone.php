<?php

namespace kato\dropzonejs;

//use yii\helpers\Html;
use kato\assets\DropZoneAsset;

/**
 * Usage: \kato\dropzonejs\DropZone::widget();
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

        \Yii::setAlias('@dropzone', dirname(__FILE__));
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
