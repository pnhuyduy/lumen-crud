<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Author;

class AuthorController extends Controller
{
  use ApiResponser;
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    //
  }

  /**
  * Return the list of authors
  *
  * @return Illuminate\Http\Response
  */
  public function index()
  {
    $authors = Author::all();
    return $this->successResponse($authors);
  }

  /**
  * Create a new author
  *
  * @return Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $rules = [
      'name' => 'required|max:255',
      'gender' => 'required|max:255|in:male,female',
    ];

    $this->validate($request, $rules);

    $author = Author::create($request->all());

    return $this->successResponse($author, Response::HTTP_CREATED);

  }

  /**
  * Retrieve the author for the given ID.
  *
  * @param  int  $id
  * @return Response
  */
  public function show($id)
  {
    $author = Author::findOrFail($id);
    return $this->successResponse($author);
  }

  /**
  * Update an existing author
  *
  * @return Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
      $rules = [
        'name' => 'required|max:255',
        'gender' => 'required|max:255|in:male,female',
      ];

      $this->validate($request, $rules);

      $author = Author::findOrFail($id);

      $author->fill($request->all());

      if ($author->isClean()) {
        return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
      }

      $author->save();

      return $this->successResponse($author);
  }

  /**
  * Remove an existing author
  *
  * @return Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $author = Author::findOrFail($id);

    $author->delete();

    return $this->successResponse($author);
  }
}
