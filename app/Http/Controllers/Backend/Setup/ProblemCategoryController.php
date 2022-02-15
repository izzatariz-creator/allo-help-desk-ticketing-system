<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProblemCategory;

class ProblemCategoryController extends Controller
{
    public function ProblemCategoryView()
    {
        $data['allData'] = ProblemCategory::all();
        return view('backend.setup.problem_category.view_problem_category', $data);
    }

    public function ProblemCategoryAdd()
    {
        return view('backend.setup.problem_category.add_problem_category');
    }

    public function ProblemCategoryStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:problem_categories,name',
        ]);

        $data = new ProblemCategory();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'New Problem Category Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('problem.category.view')->with($notification);
    }

    public function ProblemCategoryEdit($id)
    {
        $editData = ProblemCategory::find($id);
        return view('backend.setup.problem_category.edit_problem_category', compact('editData'));
    }

    public function ProblemCategoryStoreUpdate(Request $request, $id)
    {
        $data = ProblemCategory::find($id);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Problem Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('problem.category.view')->with($notification);
    }

    public function ProblemCategoryDelete($id)
    {
        $user = ProblemCategory::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Problem Category Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('problem.category.view')->with($notification);
    }
}
