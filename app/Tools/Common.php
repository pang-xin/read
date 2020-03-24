<?php
namespace App\Tools;

use App\Category;
use App\Model\Menu;
use App\Model\Cate;

class Common{
    public static function showType(){
        $menuInfo = Menu::get();
        $menuInfo = self::list_level($menuInfo);
        return $menuInfo;
    }

    public static function list_level($menuInfo,$parent_id=0,$level=0){
        static $info =[];
        foreach ($menuInfo as $k => $v) {
            if($v['parent_id']==$parent_id){
                $v['level']=$level;
                // print_r($v);exit;
                $info[]=$v;//将循环的值不断赋值给静态变量
                //再次调用函数，循环使每个下一级的分类加一
                self::list_level($menuInfo,$v->menu_id,$level+1);
            }
        }

        return $info;

    }
}
