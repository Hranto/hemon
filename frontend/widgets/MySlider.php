<?php
/**
 * Created by PhpStorm.
 * @author VOLODYA AVETISYAN <volodya.avetisyan@gmail.com>
 * Date: 04/08/2015
 * Time: 13:47
 */

namespace frontend\widgets;


use common\models\Slider;
use yii\base\Widget;

class MySlider extends Widget{

    const LIMIT = 10;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $slides = Slider::find()->where(['active'=>'1'])->all();
        //var_dump($slides); exit;
        return $this->render('sliderView', [
            'slides' => $slides
        ]);
    }
}