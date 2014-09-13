<?php

class LinksController extends \BaseController {

	/**
	 * Display the home page.
	 * GET /
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('links.create');
	}

	/**
	 * Store a new link shortener.
	 * POST /
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Get the hash and redirect to specified url
	 * GET /{hash}
	 *
	 * @param  int  $hash
	 * @return Response
	 */
	public function show($hash)
	{
		//
	}






	/**
	 * Update the specified resource in storage.
	 * PUT /links/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /links/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}