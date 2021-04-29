<?php
  // file: controllers/ProfessorController.php

  require_once('autores.php');

  class AutoresController extends Controller {

    public function index() {  

      return view('autor/index',
        ['autores'=> DB::table('author')->get() ,
        'title'=>'autors list']);
    }
   
    public function show($id) {
      
     return view('autor/show',
       ['autores'=>DB::table('author')->find($id),
       'title'=>'autor Details', 'show'=>true,'create'=>false,'edit'=>false]);
   }
   public function create() {
    $item = ['author'=>'','nationality'=>'',
    'birth_year'=>'','fields'=>''
    ,'books__book_id'=>'','books__title'=>''
    ];
     return view('autor/create',
       ['title'=>'autor Create', 'autores'=>$item,'show'=>false,'create'=>true,'edit'=>false]);
   }  
   
   public function store() {
     $author = Input::get('author');
     $nationality = Input::get('nationality');
     $birth_year = Input::get('birth_year');
     $fields = Input::get('fields');
     $books__book_id = Input::get('books__book_id');
     $books__title = Input::get('books__title');
    // $books__title_id = Input::get('books__title_id');
     $item = ['author'=>$author,'nationality'=>$nationality,
     'birth_year'=>$birth_year,'fields'=>$fields
     ,'books__book_id'=>$books__book_id,'books__title'=>$books__title
     ];

     DB::table('author')->create($item);
     autores::create($item);
     return redirect('/author');
   }  
   
   public function edit($id) {  
    $bk = DB::table('author')->find($id);
     return view('autor/edit',
      ['autores'=>$bk,
      'title'=>'autor Edit', 'show'=>false,'create'=>false,'edit'=>true]);
   }  
   
   public function update($id) {
    $author = Input::get('author');
    $nationality = Input::get('nationality');
    $birth_year = Input::get('birth_year');
    $fields = Input::get('fields');
    $books__book_id = Input::get('books__book_id');
    $books__title = Input::get('books__title');
   // $books__title_id = Input::get('books__title_id');
    $item = ['author'=>$author,'nationality'=>$nationality,
    'birth_year'=>$birth_year,'fields'=>$fields
    ,'books__book_id'=>$books__book_id,'books__title'=>$books__title
    ];
    DB::table('author')->update($id,$item);
     return redirect('/author');
   }
   
   public function destroy($id) {  
    DB::table('author')->destroy($id);
    return redirect('/author');
  }
  }
?>