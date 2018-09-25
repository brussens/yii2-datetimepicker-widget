<?php
/**
 * @link https://github.com/brussens/yii2-datetimepicker-widget
 * @copyright Copyright © since 2017 Brusensky Dmitry. All rights reserved
 * @licence http://opensource.org/licenses/MIT MIT
 */

namespace brussens\datetimepicker;

use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

/**
 * Range values widget
 *
 * @package brussens\datetimepicker
 * @author Brusensky Dmitry <brussens@nativeweb.ru>
 */
class RangeWidget extends Widget
{
    /**
     * @var string|null
     */
    public $attributeTo;
    /**
     * @var string|null
     */
    public $nameTo;
    /**
     * @var array
     */
    public $optionsTo = [];
    /**
     * @var array
     */
    public $parts = [];
    /**
     * @var string
     */
    public $template = '<div class="input-group">{inputFrom}<div class="input-group-addon">-</div>{inputTo}</div>';

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->nameTo === null && $this->attributeTo === null) {
            throw new InvalidConfigException("Either 'nameTo', or 'attributeTo' properties must be specified.");
        }
        parent::init();
    }

    /**
     * @return string
     */
    protected function renderResult()
    {
        $this->parts['{inputFrom}'] = $this->renderInput();
        $this->parts['{inputTo}'] = $this->renderInputTo();
        return strtr($this->template, $this->parts);
    }

    /**
     * @param string $type
     * @return string
     */
    protected function renderInputTo($type = 'text')
    {
        $type = ArrayHelper::remove($this->optionsTo, 'type', $type);
        if ($this->hasModel()) {
            return Html::activeInput($type, $this->model, $this->attribute, $this->optionsTo);
        }
        return Html::input($type, $this->name, $this->value, $this->optionsTo);
    }

    /**
     * Configure widget
     */
    protected function configure()
    {
        parent::configure();

        $this->optionsTo['id'] = $this->hasModel()
            ? Html::getInputId($this->model, $this->attributeTo)
            : $this->getId() . '-' . $this->nameTo;

        Html::addCssClass($this->optionsTo, 'form-control');
        if($this->format) {
            $this->optionsTo['data-date-format'] = $this->format;
        }
    }

    /**
     * Registering Client Scripts.
     */
    protected function registerClientScript()
    {
        parent::registerClientScript();

        $view = $this->getView();
        $optionsTo = Json::encode(array_merge($this->clientOptions, [
            'useCurrent' => false
        ]));
        $view->registerJs('jQuery("#' . $this->optionsTo['id'] . '").datetimepicker(' . $optionsTo . ');');
        $view->registerJs('$("#' . $this->options['id'] . '").on("dp.change", function (e) {'
            . 'jQuery("#' . $this->optionsTo['id'] . '").data("DateTimePicker").minDate(e.date);});');
        $view->registerJs('$("#' . $this->optionsTo['id'] . '").on("dp.change", function (e) {'
            . 'jQuery("#' . $this->options['id'] . '").data("DateTimePicker").maxDate(e.date);});');
    }
}