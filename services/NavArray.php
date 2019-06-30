<?php
/**
 * Created by PhpStorm.
 * User: maggotik
 * Date: 6/29/19
 * Time: 4:11 PM
 */

namespace app\services;


use app\models\Category;

class NavArray
{
    static function getData()
    {
        $collection = Category::find()->orderBy('lft')->asArray()->all();

        $menu = [];

        if($collection){
            $nsTree = new NestedSetsTreeNav();
            $dataMenu = $nsTree->tree($collection); //создаем дерево в виде массива
            $menu = $dataMenu[0]['items']; //убираем корневой элемент
        }

        return $menu;
    }
}