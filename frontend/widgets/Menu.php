<?php
/**
 * Created by PhpStorm.
 * @author VOLODYA AVETISYAN <volodya.avetisyan@gmail.com>
 * Date: 04/08/2015
 * Time: 13:53
 */

namespace frontend\widgets;

use app\models\Categories;
use yii\base\Widget;

class Menu extends Widget{

    const PARENT_CATEGORY = 0;
    public $active;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $menu = Categories::find(['parent_id' => self::PARENT_CATEGORY])->all();

        return $this->render('menuView', [
            'menu' => $menu
        ]);
    }
}