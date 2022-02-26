<?php

namespace App\Http\Controllers;

use App\Services\Category\CategoryServiceInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $data = $this->categoryService->getList(collect(['paginate' => 20]));

        return view('pages.category.list', ['data' => $data]);
    }

    public function add()
    {
        return view('pages.category.add');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
        ];
        $this->categoryService->store($data);
        
        return redirect()->route('admin.category.list')->with('msg', 'Thêm thành công');
    }

    public function edit($id)
    {
        $data = $this->categoryService->find($id);

        return view('pages.category.update', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->get('name'),
        ];
        $option = [
            'id' => $id
        ];

        $this->categoryService->update($data, $option);

        return redirect()->back()->with('msg', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $this->categoryService->destroy($id);

        return redirect()->back()->with('msg', 'Xóa thành công');
    }
}
