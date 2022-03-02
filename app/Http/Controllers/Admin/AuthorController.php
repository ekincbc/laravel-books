<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Validation\Rule;


class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::query()
        ->orderBy('name', 'asc')
        ->limit(50)
        ->get();

        // dd($authors);
        return view('authors.index', compact('authors'));
        
    }
        public function create()
        {
            $author = new Author;

            return view('authors.edit', compact('author'));
        }

        public function edit($author_id)
        {   
            
            // $author = Author::find($author_id);
            //           Author::where('id', $author_id)->first();


            $author = Author::findOrFail($author_id);
            
            // SAME AS:
            // $author = Author::find($author_id);
            // if (!$author) {
            //        abort(404);
            // }

            return view('authors.edit', compact('author'));
        }

        public function save(Request $request, $author_id = null)
        {
            // TODO: validate data
            //       before proceeding
            $this->validate($request, [
                'slug' => [
                    'required',
                    Rule::unique('authors')->ignore($author_id)
                ],
                'name' => 'required',
                'bio' => 'nullable|min:10' // there should be atleast 10 characters to submit
            ], [
                'slug.required' => 'Just put in the slug, man.',
                'slug.unique' => 'Trying to insert and existing record, are we?'
            ]);

            if ($author_id) {
                // if we have author_id URL parameter
                // retrive author from database
                $author = Author::findOrFail($author_id);
            } else {
                // else prepare empty author
                $author = new Author;
            }
                


            // fill the Author object with data from the request
            $author->slug = $request->input('slug');
            $author->name = $request->input('name');
            $author->bio  = $request->input('bio');

            // save the object into the database
            $author->save();

            // TODO: flash a success message
            session()->flash('success message', 'Author has been successfully saved!');

            //redirect (to index)
            // TODO: redirect to edit form once we have it
            return redirect()->action('Admin\AuthorController@index');
        }


        // public function update(Request $request, $author_id)
        // {
        //     // TODO: validate data
        //     //       before proceeding
        //     $this->validate($request, [
        //         'slug' => [
        //             'required',
        //             Rule::unique('authors')->ignore($author_id)
        //         ],
        //         'name' => 'required',
        //         'bio' => 'nullable|min:10' // there should be atleast 10 characters to submit
        //     ], [
        //         'slug.required' => 'Just put in the slug, man.',
        //         'slug.unique' => 'Trying to insert and existing record, are we?'
        //     ]);


        //     $author = Author::findOrFail($author_id);

        //     // fill the Author object with data from the request
        //     $author->slug = $request->input('slug');
        //     $author->name = $request->input('name');
        //     $author->bio  = $request->input('bio');

        //     // save the object into the database
        //     $author->save();

        //     // TODO: flash a success message
        //     session()->flash('success message', 'Author has been successfully saved!');

        //     //redirect (to index)
        //     // TODO: redirect to edit form once we have it
        //     return redirect()->action('Admin\AuthorController@index');
        // }
}

