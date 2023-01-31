<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\CategoryRequest;

use Illuminate\Support\Facades\Storage;


use Yajra\DataTables\Facades\DataTables;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if(request()->ajax())
        {
            $query = Category::query();
            
            return Datatables::of($query)
            ->addColumn('action',function($item){
                return '
                <div class="btn-group">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown">Action</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="'.route('category.edit',$item->id).'">Edit</a>
                           
                                <button type="submit" class="dropdown-item text-danger">
                                    Delete
                                </button>
                           div class="dropdown-menu">
                           <a class="dropdown-item" href="'.route('category.edit',$item->id).'">Edit</a>

                               <form action="'.route('category.destroy',$item->id).'" method="POST">
                                   '.method_field('delete').csrf_field().'
                                   <button type="submit" class="dropdown-item text-danger">
                                       Delete
                                   </button>
                                 </form>
                        </div>
                    </div>
                </div>
                ';
            })
            -> editColumn('photo', function($item){
                return $item->photo ? '<img src="'.Storage::url($item->photo).'" style="max-height:40px;"/>' : '';
            })
            ->rawColumns(['action','photo'])
            ->make();

        }
    return view('pages.admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
