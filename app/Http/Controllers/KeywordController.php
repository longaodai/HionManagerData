<?php

namespace App\Http\Controllers;

use App\Services\Category\CategoryServiceInterface;
use App\Services\Keyword\KeywordServiceInterface;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    private $keywordService;

    public function __construct(KeywordServiceInterface $keywordService)
    {
        $this->keywordService = $keywordService;
    }

    public function index()
    {
        $data = $this->keywordService->getList();

        return view('pages.keyword.list', [
            'data' => $data
        ]);
    }

    public function add()
    {
        $categoryService = app(CategoryServiceInterface::class);
        $categories = $categoryService->getList();

        return view('pages.keyword.add', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $data = [
            'keyword' => $request->get('name'),
            'category_id' => $request->get('category'),
        ];

        $this->keywordService->insert($data);

        return redirect()->route('admin.keyword.list')->with('msg', 'Thêm thành công');
    }

    public function edit($id)
    {
        $data = $this->keywordService->find($id);
        $categoryService = app(CategoryServiceInterface::class);
        $categories = $categoryService->getList();

        return view('pages.keyword.update', [
            'data' => $data,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'keyword' => $request->get('name'),
            'category_id' => $request->get('category'),
        ];
        $option = [
            'id' => $id
        ];

        $this->keywordService->update($data, $option);

        return redirect()->back()->with('msg', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $this->keywordService->destroy($id);

        return redirect()->back()->with('msg', 'Xóa thành công');
    }
}
