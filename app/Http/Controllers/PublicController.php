<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\PostRepository;
use App\Repositories\ProductRepository;
use Carbon\Carbon;

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
     * 由參數夾帶資料取得字串
     * @param string $userId
     * @param string $userName
     * @return string
     */
    public function userInfo(string $userId, string $userName)
    {
        return 'UserId : ' . $userId . ' UserName : ' . $userName;
    }

    /**
     * 顯示資料庫中 posts 資料表所有資料的 title
     */
    public function displayPosts()
    {
        $posts = $this->postRepository->getAll();

        foreach($posts as $post)
        {
            print($post->title) . '<br>';
        }
    }

    public function displayProductName()
    {
        $products = $this->productRepository->getAll();

        foreach($products as $product)
        {
            print($product->product_name) . '<br>';
        }
    }

    public function addProduct(string $productName)
    {
        $product = new Product();
        $product->product_name = $productName;
        $product->created_at = Carbon::now();

        if ($this->productRepository->add($product))
        {
            return redirect('/products');
        }

        return '新增失敗';
    }

    public function getProduct($productId)
    {
        $product = $this->productRepository->get((int)$productId);

        print($product->product_name);
    }
}