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
        "dropzone/downloads/dropzone.min.js"
    ];

    /**
     * @var array
     */
    public $publishOptions = [
        'forceCopy' => true
    ];

}