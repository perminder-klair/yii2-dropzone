<?php

namespace kato;

use yii\helpers\Html;
use yii\helpers\Json;
use kato\assets\DropZoneAsset;

/**
 * Usage: \kato\dropzonejs\DropZone::widget();
 * Class DropZone
 * @package kato
 */
class DropZone extends \yii\base\widget
{
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

        \Yii::setAlias('@dropzone', dirname(__FILE__));
        $this->registerAssets();
    }

    public function run()
    {
        return Html::tag('div', $this->renderDropzone(), ['id' => $this->dropzoneContainer]);
        //return '<div id="myId"><div id="previews" class="dropzone-previews"></div><button id="selectBtn">Click me to select files</button></div>';
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

        /*$params = [
            'url' => $this->uploadUrl,
            'previewsContainer' => '#' . $this->previewsContainer,
            'clickable' => '#' . $this->selectBtn
        ];

        $js = 'new Dropzone("div#' . $this->dropzoneContainer . '", JSON.stringify(' . Json::encode($params) . '));';*/

        $js = 'new Dropzone("div#' . $this->dropzoneContainer . '", {';
        $js .= 'url: "/upload/url",'; // Set the url
        $js .= 'previewsContainer: "#'  . $this->previewsContainer . '",'; // Define the container to display the previews
        $js .= 'clickable: "#'  . $this->selectBtn . '"'; // Define the element that should be used as click trigger to select files.
        $js .= '});';
        $view->registerJs($js);
    }
}
