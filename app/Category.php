<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{

	// Inserting category
    public function insertquery($request){
    	$check = DB::table('categories')->insert([
    		'name' => $request['category_name'],
    		'description' => $request['description'],
    		'url' => $request['url']
    	]);
    	// print_r($check);
    	// die();
    	return $check;
    }

    // Fetching Category
    public function fetchCategory(){
    	$check = DB::table('categories')->get();
    	$check = json_decode(json_encode($check));
    	// print_r($check);
    	// die();
    	return $check;

    }

    // Displaying Category in edit-categories
    public function showCategory($request,$id) {
        $check = DB::table('categories')->where('id', $id)->first();
        // print_r($check);
        // die;
        // $check = json_decode(json_encode($check));
        // print_r($check);
        // die;
        return $check;
    }

    // update Category
    public function update_Category($request,$id) {
        // echo $request['category_name'];
        //     die;
        $check = DB::table('categories')->where('id', $id)->update([
            'name' => $request['category_name'],
            'description' => $request['description'],
            'url' => $request['url']
        ]);

        // print_r($check);
        // die();
        return $check;
    } 

    // Delete Category
    public function delete_Category($request,$id) {
        $check = DB::table('categories')->where('id', $id)->delete();

        return $check;
    }
}
