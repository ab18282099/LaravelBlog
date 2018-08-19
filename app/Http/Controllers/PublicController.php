<?php

namespace App\Http\Controllers;

use App\Aspects\Annotations\Loggable;

/**
 * Class PublicController
 * @package App\Http\Controllers
 */
class PublicController extends Controller
{
    /**
     * PublicController constructor. 建構子
     */
    public function __construct()
    {
    }

    /**
     * 首頁
     * @Loggable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * 貼文頁面
     * @Loggable
     * @param $id string|integer 貼文編號
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function singlePost($id)
    {
        return view('singlePost');
    }

    /**
     * 關於
     * @Loggable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        return view('about');
    }

    /**
     * 聯絡資訊
     * @Loggable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        return view('contact');
    }
}