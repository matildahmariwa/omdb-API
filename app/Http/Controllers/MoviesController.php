<?php

namespace App\Http\Controllers;


use App\Movie;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $uri = 'http://www.omdbapi.com/?&s=woman&apiKey=51dea3aa&page=1';
        $header = ['headers' => ['X-Auth-Token' => 'My-Token']];
        $res = $client->get($uri, $header);
        $data = json_decode($res->getBody()->getContents(), true);
  return $data;
    }

    public function fetchMovies(){
        $movies = Movie::orderBy('created_at', 'desc')->get();
        return response()->json($movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movies = $this->index();
//        dd($this->index());

        $movies = collect($movies['Search']);
//        dd($movies);

             foreach($movies as $movie) {
//                dd($movie);
                Movie::create([
                    'title' => $movie['Title'],
                     'year' =>$movie['Year'],
                    'type' =>$movie['Type'],
                    'cover_photo' => $movie['Poster'],
                ]);

            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $movie=Movie::find($id);
    // if($movie){
    // return response()->json(['status'=>true,'movie'=>$movie]);
    // }else{
    // return response()->json(['status'=>false]);
    // }
    return view('details', ['movie' => $movie]);
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
    public function update(Request $request, $id)
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
