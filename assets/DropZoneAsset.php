<?php

namespace kato\assets;

use yii\web\AssetBundle;

/**
 * Asset bundle for DropZone Widget
 */
class DropZoneAsset extends AssetBundle
{

    public $sourcePath = '@dropzone/dist';
    public $css = [
        'yii2-sirtrevorjs-0.0.2.min.css',
    ];
    public $js = [
        "yii2-sirtrevorjs-0.0.2.min.js"
    ];

    /*public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset'
    ];*/

    /**
     * @var array
     */
    /*public $publishOptions = [
        'forceCopy' => true
    ];*/

}