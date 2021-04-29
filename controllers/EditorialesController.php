<?php
  // file: controllers/ProfessorController.php

  require_once('editorial.php');

  class EditorialesController extends Controller {

    public function index() {  
      $editorial = DB::table('publisher')->get();  
      return view('editorial/index',
       ['editorial'=>$editorial,
        'title'=>'editorial List']);
    }

    public function show($id) {
      $editorial = DB::table('publisher')->find($id);
       
      return view('editorial/show',
        ['editorial'=>$editorial,
         'title'=>'editorial Detail', 'show'=>true,'create'=>false,'edit'=>false]);
    }
    public function create() {
      $item = ['publisher'=>'','country'=>'',
      'founded'=>'','genere'=>''
      ,'books__book_id'=> '','books__title'=>''
      ];
      return view('editorial/create',
        ['title'=>'editorial Create', 'editorial'=>$item,'show'=>false,'create'=>true,'edit'=>false]);
    }  
    
    public function store() {
      $publisher = Input::get('publisher');
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');
      $books__book_id = Input::get('books__book_id');
      $books__title = Input::get('books__title');
     // $books__title_id = Input::get('books__title_id');
      $item = ['publisher'=>$publisher,'country'=>$country,
      'founded'=>$founded,'genere'=>$genere
      ,'books__book_id'=>$books__book_id,'books__title'=>$books__title
      ];
      DB::table('publisher')->create($item);
      return redirect('/editorial');
    }  
    
    public function edit($id) {  
      $bk =  DB::table('publisher')->find($id);
      return view('editorial/edit',
       ['editorial'=>$bk,
       'title'=>'editorial Edit', 'show'=>false,'create'=>false,'edit'=>true]);
    }  
    
    public function update($id) {
      $publisher = Input::get('publisher');
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');
      $books__book_id = Input::get('books__book_id');
      $books__title = Input::get('books__title');
     // $books__title_id = Input::get('books__title_id');
      $item = ['publisher'=>$publisher,'country'=>$country,
      'founded'=>$founded,'genere'=>$genere
      ,'books__book_id'=>$books__book_id,'books__title'=>$books__title
      ];

      DB::table('publisher')->update($id,$item);
      return redirect('/editorial');
    }
    
    public function destroy($id) {  
      DB::table('publisher')->destroy($id);
      return redirect('/editorial');
    }
  
  }
?>