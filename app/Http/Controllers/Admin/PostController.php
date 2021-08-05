<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    private $postValidationArray = [
        'title' => 'required|max:255',
        'content' => 'required',
        'category_id' => 'nullable|exists:categories,id', //puo' essere campo vuoto | verifica che la category selezionato esiste nel DB
        'tags'=> 'exists:tags,id', //verifica che il tag selezionato esiste nel DB
        'cover'=>'nullable|image|max:2048' //verifica che il file che carichiamo pue' non esistere, ha il formato di images e le dimensioni massime sono 2mb (le dimensioni vanno sempre indicati in kb)
    ];
    private function generateSlug($data) {
        $slug = Str::slug($data["title"], '-'); // titolo-articolo-3

        $existingPost = Post::where('slug', $slug)->first();
        // dd($existingPost);

        $slugBase = $slug;
        $counter = 1;

        while($existingPost) {
            // blocco di istruzioni
            $slug = $slugBase . "-" . $counter;

            // istruzioni per terminare il ciclo
            $existingPost = Post::where('slug', $slug)->first(); // titolo-articolo-3-2
            $counter++;
        }

        return $slug;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $request->validate($this->postValidationArray); //Faccio la validazione dei dati

        $newPost = new Post();

        $slug = $this->generateSlug($data);
        $data['slug'] = $slug;

        //Devo assegnare la cover al post che sto creando
        if(array_key_exists('cover', $data)) {
            $data['cover'] = Storage::put('post_covers', $data['cover']); // Se la cover esiste nell'array $data, salvo l'img caricata
        }

        $newPost->fill($data); // aggiungiamo $fillable nel Model (Post)

        $newPost->save();

        //Devo assegnare i tags al post che ho creato
        if(array_key_exists('tags', $data)){ 
            $newPost->tags()->attach($data['tags']); //Se la chiave 'tags' esiste nell'array $data, assegna ('attach') al post i tags
        }

        return redirect()->route('admin.posts.show', $newPost->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        
        // validazione
        $request->validate($this->postValidationArray);

        if($post->title != $data["title"]) {
            $slug = $this->generateSlug($data);
            $data["slug"] = $slug;
        }
        //Devo assegnare la cover al post che sto creando
        if(array_key_exists('cover', $data)) {
            if($post->cover) {
                Storage::delete($post->cover); //Gestisce la cancellazione del file dal server
            }
            $data['cover'] = Storage::put('post_covers', $data['cover']); // Se la cover esiste nell'array $data, salvo l'img caricata
        }

        $post->update($data);

        //Gestisco la modifica/aggiornamento dei tags
        if(array_key_exists('tags', $data)){
            $post->tags()->sync($data['tags']); // Se al post sono gia' associati i tag, sincronizza (SYNC) con quelli nuovi/modificati
        } else {
            $post->tags()->detach(); //Se ho aggiornato il post togliendo tutti i tag, togli (DETACH) i tags
        }

        return redirect()->route('admin.posts.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        if($post->cover) {
            Storage::delete($post->cover);
        }
        $post->delete();
        return redirect()->route('admin.posts.index')->with('deleted', $post->title.' has been deleted succesfully');
    }
}
