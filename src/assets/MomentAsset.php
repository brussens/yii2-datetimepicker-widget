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
class MomentAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/moment/min';
    /**
     * @inheritdoc
     */
    public $js = [
        'moment-with-locales' . (YII_ENV_DEV ? '' : '.min') . '.js',
    ];
}