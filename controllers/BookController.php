<?php
  // file: controllers/ProfessorController.php

  require_once('book.php');

  class BookController extends Controller {

    public function index() {
      $books = DB::table('book')->get();  
      return view('book/index',
       ['books'=>$books,
        'titles'=>'Book List']);
    }

    public function show($id) {
      $book = DB::table('book')->find($id);
      
      return view('book/show',
        ['book'=>$book,
         'titles'=>'Book Detail', 'show'=>true,'create'=>false,'edit'=>false]);
    }
    public function create() {
      $item = ['title'=>'','edition'=>'',
      'copyright'=>'','language'=>''
      ,'pages'=>'','author'=>''
      ,'author_id'=>'','publisher'=>''
      ,'publisher_id'=>''];
      
      return view('book/show',
        ['titles'=>'Book Create', 'book'=>$item,'show'=>false,'create'=>true,'edit'=>false]);
    }  
    
    public function store() {
      $title = Input::get('title');
      $edition = Input::get('edition');
      $copyright = Input::get('copyright');
      $language = Input::get('language');
      $pages = Input::get('pages');
      $author = Input::get('author');
      $author_id = Input::get('author_id');
      $publisher = Input::get('publisher');
      $publisher_id = Input::get('publisher_id');
      $item = ['title'=>$title,'edition'=>$edition,
      'copyright'=>$copyright,'language'=>$language
      ,'pages'=>$pages,'author'=>$author
      ,'author_id'=>$author_id,'publisher'=>$publisher
      ,'publisher_id'=>$publisher_id];

      DB::table('book')->create($item);
      return redirect('/book');
    }  
    
    public function edit($id) {  
      
      $bk = DB::table('book')->find($id);
      return view('book/show',
       ['book'=>$bk,
       'titles'=>'Book Edit', 'show'=>false,'create'=>false,'edit'=>true]);
    }  
    
    public function update($id) {
      $title = Input::get('title');
      $edition = Input::get('edition');
      $copyright = Input::get('copyright');
      $language = Input::get('language');
      $pages = Input::get('pages');
      $author = Input::get('author');
      $author_id = Input::get('author_id');
      $publisher = Input::get('publisher');
      $publisher_id = Input::get('publisher_id');
      $item = ['title'=>$title,'edition'=>$edition,
      'copyright'=>$copyright,'language'=>$language
      ,'pages'=>$pages,'author'=>$author
      ,'author_id'=>$author_id,'publisher'=>$publisher
      ,'publisher_id'=>$publisher_id];
      
      DB::table('book')->update($id,$item);
      return redirect('/book');
    }
    
    public function destroy($id) {  
    
      DB::table('book')->destroy($id);
      return redirect('/book');
    }
  }
?>