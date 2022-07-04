<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('view-crud.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('view-crud.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comic = $request->all();

        $request->validate(
            [
                'title' => 'required|max:50|min:3',
                'image' => 'required',
                'type' => 'required|max:50|min:3'
            ],
            [
                'title.required' => 'Inserisci il titolo',
                'title.max'=> 'Il titolo deve avere al massimo :max caratteri',
                'title.min'=> 'Il titolo deve avere almeno :min caratteri',
                'image.required' => 'Inserisci l\'image',
                'image.max'=> 'L\'image deve avere al massimo :max caratteri',
                'image.min'=> 'L\'image deve avere almeno :min caratteri',
                'type.required' => 'Inserisci il tipo',
                'type.max'=> 'Il tipo deve avere al massimo :max caratteri',
                'type.min'=> 'Il tipo deve avere almeno :min caratteri',

            ]
    );

        $new_comic = new Comic();
        // dd($request->all());
        // $new_comic = new Comic();
        // $new_comic->title = $comic['title'];
        // $new_comic->slug = Str::slug($comic['title'], '-');
        // $new_comic->type = $comic['type'];
        // $new_comic->image = $comic['image'];
        $new_comic->fill($comic);
        $new_comic->slug = $this->checkSlug($comic['title']);
        $new_comic->save();

        return redirect()->route('comic.show', $new_comic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $comic = Comic::where('slug', $slug)->first();

        $comic = Comic::find($id);
        if($comic){
            return view('view-crud.show', compact('comic'));
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);
        return view('view-crud.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $new_data = $request->all();

        $request->validate(
            [
                'title' => 'required|max:50|min:3',
                'image' => 'required',
                'type' => 'required|max:50|min:3'
            ],
            [
                'title.required' => 'Inserisci il titolo',
                'title.max'=> 'Il titolo deve avere al massimo :max caratteri',
                'title.min'=> 'Il titolo deve avere almeno :min caratteri',
                'image.required' => 'Inserisci l\'image',
                'image.max'=> 'L\'image deve avere al massimo :max caratteri',
                'image.min'=> 'L\'image deve avere almeno :min caratteri',
                'type.required' => 'Inserisci il tipo',
                'type.max'=> 'Il tipo deve avere al massimo :max caratteri',
                'type.min'=> 'Il tipo deve avere almeno :min caratteri',

            ]
    );

        $comic->slug = $this->checkSlug($comic['title']);

        $comic->update($new_data);

        return redirect()->route('comic.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comic.index')->with('deleted', 'You have removed correctly the comic from your collection!');
    }

    private function checkSlug($string){
        $new_slug = Str::slug($string, '-');
        $findSlug = Comic::where('slug', $new_slug)->first();
        $i = 0;
        while($findSlug){
            $new_slug = Str::slug($string, '-') . $i;
            $i++;
            $findSlug = Comic::where('slug', $new_slug)->first();
        }
        return $new_slug;
    }
}
