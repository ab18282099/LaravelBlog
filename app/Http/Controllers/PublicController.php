<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;

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

    /**
     * PublicController constructor. 建構子
     * @param PostRepository $postRepository Post 資料儲存庫
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
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
}