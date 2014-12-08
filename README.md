#Bootstrap 3 DateTime Picker widget for Yii2

##Install
Either run
```
php composer.phar require --prefer-dist brussens/yii2-datetimepicker-widget "*"
```

or add

```
"brussens/yii2-datetimepicker-widget": "*"
```

to the require section of your `composer.json` file.

##Options

* **selector** - HTML selector for widget
* **format** - datetime format
* **clientOptions** - options of plugin. See http://eonasdan.github.io/bootstrap-datetimepicker/#options

##Base usage:
```php
echo $form->field($model, 'attribute')->widget(brussens\datetimepicker\Widget::className());
```
##Advanced usage
```php
echo $form->field($model, 'attribute')->widget(brussens\datetimepicker\Widget::className(), [
        'format'=>'DD-MM-YYYY HH:mm:ss',
        'clientOptions'=>[
            'language'=>'ru',
            'icons'=>[
                'time'=>'el-icon-time',
                'date'=>'el-icon-calendar',
                'up'=>'el-icon-chevron-up',
                'down'=>'el-icon-chevron-down',
            ],
            'useSeconds'=>true,
            'useCurrent'=>true,
            'sideBySide'=>true
        ]
    ]);
```
##Profit