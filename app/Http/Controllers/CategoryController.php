<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;


class CategoryController extends Controller {

    public function index() {
        $categories = Category::all();
        return view( 'admin.fetchCategory', compact( 'categories' ) );
    }

    public function create( Request $request ) {
        $categoryExists = $this->categoryExists( $request->catname );
        if ( $categoryExists ) {
            return redirect()->route( 'catpage' )->with( 'danger', Session::get( 'category_exists' ) );

        }

        try {
            $category = new Category;
            $category->catname = $request->catname;
            $saveToDb = $category->save();

            if ( $saveToDb ) {
                return redirect()->route( 'catpage' )->with( 'success', 'Category created successfully.' );
            }

            return redirect()->route( 'catpage' )->with( 'danger', 'Unable to complete the request.' );
        } catch ( PDOException $e ) {
            // Log the error or handle it as desired
            return redirect()->route( 'catpage' )->with( 'danger', 'An error occurred while creating the category.'. $e->getMessage() );
        }
        finally {
            unset( $category );
        }
    }

    public function categoryExists( $catname ) {

        $category = Category::where( 'catname', $catname )->first();

        if ( $category ) {
            Session::flash( 'category_exists', 'Category already exists' );
            return true;
        }

        return false;
    }

    public function edit( Category $category ) {

        $catid =  request('id');
        $category = Category::find($catid);
        return view( 'admin.updateCategory', compact( 'category' ) );
    }

    public function update(Request $request, Category $category)
    {
        try {

            $category = Category::find($request->id);
            if (!$category) {
              return redirect()->route('catpage')->with('danger', 'Category does not exists');
            }

            $category->catname = $request->catname;

        if ($category->save()) {
            return redirect()->route('catpage')->with('success', 'Record updated successfully');
        }
           
        } catch (QueryException $e) {
            // Log the error or handle it as desired
            return redirect()->route('catpage')->with('danger', 'An error occurred while updating the category: ' . $e->getMessage());
        }
    }

   
    public function delete( Category $category ) {
      
        $catid = request('id');
        $category = Category::find($catid);
        if (!$category) {
            return redirect()->route('catpage')->with('danger', 'Category does not exists');
        }
    
        $deleteCategory  = $category->delete();
        if ($deleteCategory) {
          return redirect()->route('fetchCategory')->with('success', 'Deleted sucessfully.');
        }
    
        return redirect()->route('fetchCategory')->with('danger', 'Failed to delete category,try again later.');

    }
}
