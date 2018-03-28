<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Подключение моделей для работы с бд
use App\Page;
use App\Service;
use App\Portfolio;
use App\People;

class IndexController extends Controller
{
    public function execute(Request $request) {

        $pages= Page::all(); // Выбираем все записи таблицы Page и аналогично у других, но для разнообразия..
        $portfolios = Portfolio::get(array('name', 'filter', 'images'));// Выводим следующее поля
        $services=Service::where('id','<', 20)->get(); // Условия, по которым будем показывать информацию
        $peoples=Page::take(3)->get(); // Выводим 3 сотрудников

        $menu = array();
        foreach ($pages as $page){
            $item = array('title' =>$page->name,'alias'=>$page->alias); // alias - id в html коде
            array_push($menu, $item); // Добавление в массив $menu значение $item
        }

        $item = array('title'=>'Services', 'alias'=>'service');
        array_push($menu, $item);

        $item = array('title'=>'Portfolio', 'alias'=>'Portfolio');
        array_push($menu, $item);

        $item = array('title'=>'Team', 'alias'=>'team');
        array_push($menu, $item);

        $item = array('title'=>'Contact', 'alias'=>'contact');
        array_push($menu, $item);

        return view('site.index', array(
            'menu' => $menu,
            'pages' => $pages,
            'services' => $services,
            'portfolios' => $portfolios,
            'peoples' => $peoples
        ));
    }
}
