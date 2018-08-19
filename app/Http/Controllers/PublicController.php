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
        $post = $this->postRepository->getAll();

        return view('welcome', ['posts' => $post]);
    }

    public function contact()
    {
        return view('contact');
    }

    /**
     * @param Request $request Http request
     * @Loggable
     */
    public function contactPost(Request $request)
    {
        if($request->hasFile('attachment'))
        {
            $file = $request->file('attachment');
            $file->move('images', $file->getClientOriginalName());
        }

        var_dump($request['email']);
    }

    /**
     * 由參數夾帶資料取得字串
     * @param string $userId
     * @param string $userName
     * @return string
     */
    public function userInfo($userId, $userName)
    {
        return 'UserId : ' . $userId . ' UserName : ' . $userName;
    }

    /**
     * 顯示資料庫中 posts 資料表所有資料的 title
     * @Loggable
     */
    public function displayPosts()
    {
        $posts = $this->postRepository->getAll();

        foreach ($posts as $post)
        {
            print($post->title) . '<br>';
        }
    }

    /**
     * @Loggable
     */
    public function displayProductName()
    {
        $products = $this->productRepository->getAll();

        foreach ($products as $product)
        {
            print($product->product_name) . '<br>';
        }
    }

    /**
     * @param string $productName
     * @UseTransaction(connection="pgsql")
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function addProduct($productName)
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

    /**
     * @UseTransaction(connection="pgsql")
     * @return string
     * @throws \Exception
     */
    public function gracefulTransaction()
    {
        foreach (range(1, 5) as $i)
        {
            $product = new Product();
            $product->product_name = strval($i);
            $product->created_at = Carbon::now();

            $this->productRepository->add($product);

            if ($i == 4)
            {
                throw new \Exception('Rollback!!!');
            }
        }

        return 'done';
    }

    /**
     * @Loggable
     * @param $productId
     */
    public function getProduct($productId)
    {
        $product = $this->productRepository->get((int)$productId);

        print($product->product_name);
    }
}