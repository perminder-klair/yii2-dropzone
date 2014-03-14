<?php

namespace kato;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression; //https://github.com/yiisoft/yii2/issues/636
use kato\assets\DropZoneAsset;

/**
 * Usage: \kato\dropzonejs\DropZone::widget();
 * Class DropZone
 * @package kato
 */
class DropZone extends \yii\base\widget
{
    /**
     * @var array An array of options that are supported by Dropzone
     */
    public $options = [];

    //Default Values
    public $uploadUrl = '/file/post';
    public $dropzoneContainer = 'myDropzone';
    public $previewsContainer = 'previews';
    public $selectBtn = 'selectBtn';
    public $selectBtnTxt = 'Select Files';

    /**
     * Initializes the widget
     * @throw InvalidConfigException
     */
    public function init()
    {
        parent::init();

        //set defaults
        if (!isset($this->options['url'])) $this->options['url'] = $this->uploadUrl; // Set the url
        if (!isset($this->options['previewsContainer'])) $this->options['previewsContainer'] = '#' . $this->selectBtn; // Define the element that should be used as click trigger to select files.
        if (!isset($this->options['clickable'])) $this->options['clickable'] = '#' . $this->selectBtn; // Define the element that should be used as click trigger to select files.

        \Yii::setAlias('@dropzone', dirname(__FILE__));
        $this->registerAssets();
    }

    public function run()
    {
        return Html::tag('div', $this->renderDropzone(), ['id' => $this->dropzoneContainer]);
    }

    private function renderDropzone()
    {
        $data = Html::tag('div', '', ['id' => $this->previewsContainer,'class' => 'dropzone-previews']);
        $data .=  Html::tag('button', $this->selectBtnTxt, ['id' => $this->selectBtn]);

        return $data;
    }

    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        DropZoneAsset::register($view);

        $js = 'new Dropzone("div#' . $this->dropzoneContainer . '", ' . Json::encode($this->options) . ');';

        $view->registerJs($js);
    }
}
