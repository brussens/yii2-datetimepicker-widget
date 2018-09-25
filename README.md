# Bootstrap 3 DateTime Picker widget for Yii2

[![Latest Stable Version](https://poser.pugx.org/brussens/yii2-datetimepicker-widget/v/stable)](https://packagist.org/packages/brussens/yii2-datetimepicker-widget)
[![Total Downloads](https://poser.pugx.org/brussens/yii2-datetimepicker-widget/downloads)](https://packagist.org/packages/brussens/yii2-datetimepicker-widget)
[![License](https://poser.pugx.org/brussens/yii2-datetimepicker-widget/license)](https://packagist.org/packages/brussens/yii2-datetimepicker-widget)

## Install
Either run
```
php composer.phar require --prefer-dist brussens/yii2-datetimepicker-widget "*"
```

or add

```
"brussens/yii2-datetimepicker-widget": "*"
```

to the require section of your `composer.json` file.

## Options
* **format** - datetime format
* **clientOptions** - options of plugin. See http://eonasdan.github.io/bootstrap-datetimepicker/#options

## Base usage:
```php
use brussens\datetimepicker\Widget as DateTimePicker;

echo $form->field($model, 'attribute')->widget(DateTimePicker::className());
```

## Advanced usage
```php
use brussens\datetimepicker\Widget as DateTimePicker;

echo $form->field($model, 'attribute')->widget(DateTimePicker::className(), [
    'format'=>'DD-MM-YYYY HH:mm:ss',
    'clientOptions' => [
        'locale' => 'ru', //If you do not want to use auto-detection
        'icons' => [
            'time' => 'el-icon-time',
            'date' => 'el-icon-calendar',
            'up' => 'el-icon-chevron-up',
            'down' => 'el-icon-chevron-down',
        ],
        'useSeconds' => true,
        'useCurrent' => true,
        'sideBySide' => true
    ],
]);
```

## Range usage (experimentally)
```php
use yii\grid\GridView;
use brussens\datetimepicker\RangeWidget;

GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $model,
    'columns' => [
        //... some columns
        [
            'filter' => RangeWidget::widget([
                'model' => $model,
                'attribute' => 'date_from',
                'attributeTo' => 'date_to'
            ]),
            'attribute' => 'created_at',
            'format' => 'datetime',
        ],
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);
```

## Profit