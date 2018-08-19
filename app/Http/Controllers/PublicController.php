<?php

namespace App\Http\Controllers;

use App\Aspects\Annotations\Loggable;
use App\Aspects\Annotations\UseTransaction;
use App\Models\Product;
use App\Repositories\PostRepository;
use App\Repositories\ProductRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class PublicController
 * @package App\Http\Controllers
 */
class PublicController extends Controller
{
    /**
     * @var PostRepository  Post 資料儲存庫
     */
    private $postRepository;

    private $productRepository;

    /**
     * PublicController constructor. 建構子
     * @param PostRepository $postRepository Post 資料儲存庫
     * @param ProductRepository $productRepository 商品資料儲存庫
     */
    public function __construct(
        PostRepository $postRepository,
        ProductRepository $productRepository)
    {
        $this->postRepository = $postRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * 首頁
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * 貼文頁面
     * @param $id string|integer 貼文編號
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function singlePost($id)
    {
        return view('singlePost');
    }

    /**
     * 關於
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        return view('about');
    }

    /**
     * 聯絡資訊
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        return view('contact');
    }
}