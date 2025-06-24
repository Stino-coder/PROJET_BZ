@extends('layouts.app1')
@section('content')
<x-app-layout>
    <x-slot name="header">
        <div>
            {{ Auth::user()->usertype }}
        </div>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="background-color:rgb(4, 4, 109); color: white; font-size: 45px; width: 100%">
            {{ __(' TABLEAU DE BORD POUR ADMINISTRATEUR') }}
        </h2>
    </x-slot>
    <a href="{{ route('espace_admin') }}" style="background: green; color:bisque">ACCUEIL</a>
    <br>
   <div class="tab-content" style="width:100%; justify-content: center;border: 5px solid red;">
    <div>
        <h2 style="background-color: blue; color: white">NIVEAU ELECTION</h2>
    </div>
     <div id="election" class="tab-pane fade in active" style="width:100%;border: 5px solid blue;">
     <table id="datatables-basic1" class="table table-striped">
       <thead>
           <tr>
             <th>#</th>
             <th>Niveau</th>
             <th>Année</th>
             <th></th>
           </tr>
         </thead>
         <tbody>
           @foreach($election as $items)
           <tr>
             <td>{{$items->id}}</td>
             <td>{{$items->niveau}}</td>
             <td>{{$items->annee}}</td>

             <td><button type="button" class="btn btn-info"><i class="fas faedit"></i></button></td>
             <td><button type="button" class="btn btn-danger"><i class="fas fa-trashalt"></i></button></td>
           </tr>
           @endforeach
         </tbody>
       </table>
     </div>
    </br>


     <br>
     <div class="tab-content" style="width:100%;border: 5px solid blue">
        <div>
            <h2 style="background-color: blue; color: white">LES PARTIS POLITIQUE</h2>
        </div>
      <div id="parti" class="tab-pane fade" style="width:100%">
       <table id="datatables-basic2" class="table table-striped">
          <thead>
              <tr>
                <th>#</th>
                <th>Non du Partie politique</th>
                <th>LOGO</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($parti as $items)
              <tr>
                <td>{{$items->id}}</td>
                <td>{{$items->nom}}</td>
                <td>
                  <a rel="noreferrer" href="{{Storage::url($items->logo)}}" target="_blank">
                      <img src="{{Storage::url($items->logo)}}" width="50px" height="50px" style="border-radius: 5px;" alt="Logo" />
                  </a>
                </td>

                <td><button type="button" class="btn btn-info"><i class="fas faedit"></i></button></td>
                <td><button type="button" class="btn btn-danger"><i class="fas fa-trashalt"></i></button></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </br>

      <br>
        <div class="tab-content" style="width:100%;border: 5px solid blue">
        <div>
            <h2 style="background-color: blue; color: white">LES CANDIDATURES</h2>
        </div>
      <div id="candidat" class="tab-pane fade" style="width:100%">
       <table id="datatables-basic3" class="table table-striped" style="width:100%">
         <thead>
           <tr>
             <th>#</th>
             <th>Nom</th>
             <th>Photo</th>
             <th>Age</th>
             <th>Province</th>
             <th>Adresse</th>
             <th>Bordereau</th>
             <th>Niveau Election</th>
             <th>Parti</th>
             <th>LOGO</th>
             <th>Date Soumission</th>
             <th></th>
           </tr>
         </thead>
         <tbody>
          @foreach($candidat as $items)
          <tr>
              <td>{{$items->id}}</td>
              <td>{{$items->nomcand}}</td>
              <td>
                  <a rel="noreferrer" href="{{Storage::url($items->photo)}}" target="_blank">
                      <img src="{{Storage::url($items->photo)}}" width="50px" height="50px" style="border-radius: 5px;" alt="Logo" />
                  </a>
              </td>
              <td>{{$items->age}}</td>
              <td>{{$items->province}}</td>
              <td>{{$items->adresse}}</td>
              <td>{{$items->document}}</td>
              <td>{{$items->niveau}}</td>
              <td>{{$items->nom}}</td>
              <td>
                  <a rel="noreferrer" href="{{Storage::url($items->logo)}}" target="_blank">
                      <img src="{{Storage::url($items->logo)}}" width="50px" height="50px" style="border-radius: 5px;" alt="Logo" />
                  </a>
              </td>
              <td>{{date('d-F-Y', strtotime($items->created_at))}}</td>
              <td>
                  <button type="button" class="btn btn-info"><i class="fas fa-edit"></i></button>
                  <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
              </td>
          </tr>
          @endforeach
         </tbody>
       </table>
     </di
   </div>
  </br>

</div>
</div>
</div>
</div>
</x-app-layout>

@endsection
@if (Session::has('fails'))
<div class="alert alert-danger text-right">
    <button type="button" class="btn btn-close" data-dismiss="alert">
        <i class="fa fa-times"></i>
    </button>
    {{Session::get('fails')}}
</div>
@endif
    @if(Session::has('success'))
<div class="alert alert-success text-right">
    <button type="button" class="btn btn-close" data-dismiss="alert">
        <i class="fa fa-times"></i>
    </button>
    {{Session::get('success')}}
</div>
@endif

