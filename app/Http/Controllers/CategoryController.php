<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Category;

class CategoryController extends Controller
{
    //Viewing category Page..........
    public function addCategory(){
    	// echo "Hii";
    	// die();
    	return view('admin.addCategory');
    }

    // View Dashboard..........
    public function view_dash(){
    	// echo "Hii";
    	// die();
    	return view('admin.dashboard');
    }

    // Category checking.........
    public function validateCat(Request $request){
    	// echo "Hii";
    	// die();
    	$this->validate($request,
    		[
	    		'category_name'   =>'required',
	    	 	'description'  =>'required',
	    	 	'url' => 'required'
    	 	]);
    	
    		$verify = new Category();
            $query = $verify->insertquery($request);

            if($query == 1){
            	return redirect('/admin/view-categories')->with('flash_message_success','Category added Successfully');
            }
	}

	// View Category
	public function view_category(){
		$verify = new Category();
        $categories = $verify->fetchCategory();
        // print_r($query);
        // die();
		return view('admin.view_categories')->with(compact('categories'));
	}

	// Edit Category
	public function editCategory(Request $request, $id = null) {
		$showObj = new Category();
        $category_details = $showObj->showCategory($request,$id);
        // print_r($category_details);
        // die();
		return view('admin.edit_categories')->with(compact('category_details'));
	}

	// Update Category
	public function updateCategory(Request $request, $id = null) {
		// echo $request['category_name'];
  //           die;
		$updateObj = new Category();
        $updated_details = $updateObj->update_Category($request,$id);

        if($updated_details == 1){
            	return redirect('/admin/view-categories')->with('flash_message_success','Category updated Successfully');
            }
	}

	// Delete Category
	public function deleteCategory(Request $request, $id = null) {
		// echo $id;
		// die();
		// if(confirm("Are you sure you want to delete this..?") === true){
  //       return true;
  //   }else{
  //       return false;
  //  }
  //  die();
		$deleteObj = new Category();
        $delete_details = $deleteObj->delete_Category($request,$id);
        // echo $delete_details;
        // die();
        // alert("Record Deleted");
        // die();
        if($delete_details == 1){
            	return redirect('/admin/view-categories')->with('flash_message_success','Category delete Successfully');
            }
	}

}

