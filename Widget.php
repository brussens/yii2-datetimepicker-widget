<?php

namespace brussens\datetimepicker;

/**
 * Bootstrap 3 DateTime Picker widget for Yii2.
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

use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

/**
 * Class Widget
 * @package brussens\datetimepicker
 */
class Widget extends \yii\widgets\InputWidget
{
    /**
     * Plugin settings
     * @link http://eonasdan.github.io/bootstrap-datetimepicker/#options
     *
     * @var array
     */
    public $clientOptions = [];

    /**
     * DateTime format string
     * @var null
     */
    public $format = null;

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @return string
     */
    public function run()
    {

        $this->registerClientScript();

        $options = ArrayHelper::merge($this->options, ['class'=>'form-control']);

        if($this->format) {
            $options['data-date-format'] = $this->format;
        }

        return ($this->hasModel() ? Html::activeTextInput($this->model, $this->attribute, $options) : Html::textInput($this->name, $this->value, $options));

    }

    /**
     * Registering Client Scripts.
     */
    protected function registerClientScript()
    {

        $view = $this->getView();
        $selector = Json::encode('#' . $this->options['id']);
        $options = !empty($this->clientOptions) ? Json::encode($this->clientOptions) : '';

        Asset::register($view);

        $view->registerJs("jQuery($selector).datetimepicker($options);");

    }

}