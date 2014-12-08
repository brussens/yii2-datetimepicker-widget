<?php

namespace brussens\datetimepicker;

/**
 * Bootstrap 3 DateTime Picker assets file.
 *
 * @package brussens\datetimepicker
 * @author Dmitry Brusenskiy <brussens07@nativeweb.ru>
 *
 * @version 1.0.0
 *
 * @link https://github.com/brussens/yii2-datetimepicker-widget
 * @link http://eonasdan.github.io/bootstrap-datetimepicker/
 * @license https://github.com/brussens/yii2-datetimepicker-widget/blob/master/LICENSE.md
 */

use yii\web\AssetBundle;

/**
 * Class Asset
 * @package brussens\datetimepicker
 */
class Asset extends AssetBundle
{

    /**
     * @var string
     */
    public $sourcePath = '@vendor';

    /**
     * @var array
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    /**
     * @var array
     */
    public $css = [
        'eonasdan/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'
    ];

    /**
     * @var array
     */
    public $js = [
        'moment/moment/min/moment-with-locales.min.js',
        'eonasdan/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'
    ];

} 