<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AirDatepicker extends AssetBundle
{
    public $sourcePath = '@bower/air-datepicker';
    public $css = [
        'dist/css/datepicker.min.css',
    ];
    public $js = [
        'dist/js/datepicker.min.js',
    ];
}
