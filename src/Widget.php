<?php
/**
 * @link https://github.com/brussens/yii2-datetimepicker-widget
 * @copyright Copyright © since 2017 Brusensky Dmitry. All rights reserved
 * @licence http://opensource.org/licenses/MIT MIT
 */

namespace brussens\datetimepicker;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use brussens\datetimepicker\assets\DateTimePickerAsset;

/**
 * DateTimePicker widget class.
 * @package brussens\datetimepicker
 * @author Brusensky Dmitry <brussens@nativeweb.ru>
 */
class Widget extends \yii\widgets\InputWidget
{
    /**
     * Plugin settings
     * @see http://eonasdan.github.io/bootstrap-datetimepicker/#options
     * @var array
     */
    public $clientOptions = [];
    /**
     * DateTime format string
     * @var null
     */
    public $format = null;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->configure();
    }

    /**
     * @return string
     */
    public function run()
    {
        $this->configure();
        $this->registerClientScript();
        return $this->renderResult();
    }

    /**
     * Registering Client Scripts.
     */
    protected function registerClientScript()
    {
        $view = $this->getView();
        DateTimePickerAsset::register($view);
        $options = Json::encode($this->clientOptions);
        $view->registerJs('jQuery("#' . $this->options['id'] . '").datetimepicker(' . $options . ');');
    }

    /**
     * Configure widget
     */
    protected function configure()
    {
        Html::addCssClass($this->options, 'form-control');
        if($this->format) {
            $this->options['data-date-format'] = $this->format;
        }
        if(!isset($this->clientOptions['locale'])) {
            $this->clientOptions['locale'] = $this->detectLocale();
        }
    }

    /**
     * @param $options
     * @param string $type
     * @return string
     */
    protected function renderInput($type = 'text')
    {
        $type = ArrayHelper::remove($this->options, 'type', $type);
        if ($this->hasModel()) {
            return Html::activeInput($type, $this->model, $this->attribute, $this->options);
        }
        return Html::input($type, $this->name, $this->value, $this->options);
    }

    /**
     * @return string
     */
    protected function renderResult()
    {
        return $this->renderInput($this->options);
    }

    /**
     * Normalize language code.
     * @return string
     */
    protected function detectLocale()
    {
        $language = strtolower(Yii::$app->language);
        $except = ['ar-dz','ar-kw','ar-ly','ar-ma','ar-sa','ar-tn','de-at','de-ch','en-au','en-ca', 'en-gb', 'en-ie',
            'en-il', 'en-nz', 'es-do', 'es-us', 'fr-ca', 'fr-ch', 'gom-latn', 'hy-am', 'ms-my', 'nl-be', 'pa-in',
            'pt-br', 'sr-cyrl', 'tl-ph', 'tzm-latn', 'ug-cn', 'uz-latn', 'x-pseudo', 'zh-cn', 'zh-hk', 'zh-tw'];
        if(!in_array($language, $except) && preg_match('/[a-z]+?\-[a-z0-9]+/', $language)) {
            $language = explode('-', $language)[0];
        }
        return $language;
    }
}