<?php
/**
 * @link https://github.com/brussens/yii2-datetimepicker-widget
 * @copyright Copyright © since 2017 Brusensky Dmitry. All rights reserved
 * @licence http://opensource.org/licenses/MIT MIT
 */

namespace brussens\datetimepicker\assets;

use yii\web\AssetBundle;

/**
 * Moment.js Asset Bundle class.
 * @package brussens\datetimepicker
 * @author Brusensky Dmitry <brussens@nativeweb.ru>
 */
class DateTimePickerAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/eonasdan-bootstrap-datetimepicker/build';
    /**
     * @inheritdoc
     */
    public $css = [
        'css/bootstrap-datetimepicker' . (YII_ENV_DEV ? '' : '.min') . '.css'
    ];
    /**
     * @inheritdoc
     */
    public $js = [
        'js/bootstrap-datetimepicker.min.js'
    ];
    /**
     * @var array
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'brussens\datetimepicker\assets\MomentAsset'
    ];
} 