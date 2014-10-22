<?php

namespace kato\assets;

use yii\web\AssetBundle;

/**
 * Asset bundle for DropZone Widget
 */
class DropZoneAsset extends AssetBundle
{

    public $sourcePath = '@dropzone/bower_components';

    public $js = [
        "dropzone/downloads/dropzone.js"
    ];

    public $css = [
        "dropzone/downloads/css/dropzone.css"
    ];

    /**
     * @var array
     */
    public $publishOptions = [
        'forceCopy' => true
    ];

}