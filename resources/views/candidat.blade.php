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

    <div class="py-12" style="background-image: url('') ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
   <a href="{{ route('espace_admin') }}" style="background: green; color:bisque">ACCUEIL</a>

   <form action="{{route('nouveau/candidat')}}" class="contact-form" method="POST" enctype="multipart/form-data">
    <div class="section-tittle mb-10">
        <span style="font-size: 25px">{{ "Enregistrement des Nouveaux Partis politiques" }} </span>
    </div>
    @csrf
        <div class=" row ">
            <div class=" col-lg-12 col-md-12">

                <div class="col-lg-6 col-md-6">
                    <div class="input-form">
                        <label for="nomcand" class="form-label alert-danger">NOM COMPLET<span class="text-danger">*</span></label>
                        <input type="text" placeholder="Nom complet..." id="nomcand" name="nomcand" class="form-control form-control-lg" required="required">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="input-form">
                        <label for="province" class="form-label alert-danger">Province<span class="text-danger">*</span></label>
                        <input type="text" placeholder="Province..." id="province" name="province" class="form-control form-control-lg" required="required">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="input-form">
                        <label for="age" class="form-label alert-danger">Age<span class="text-danger">*</span></label>
                        <input type="number" placeholder="Age..." id="age" name="age" class="form-control form-control-lg" required="required">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="input-form">
                        <label for="adresse" class="form-label alert-danger">Adresse<span class="text-danger">*</span></label>
                        <input type="text" placeholder="Adresse..." id="adresse" name="adresse" class="form-control form-control-lg" required="required">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="input-form">
                        <label for="document" class="form-label alert-danger">Document<span class="text-danger">*</span></label>
                        <input type="file" placeholder="Document..." id="document" name="document" class="form-control form-control-lg" required="required">
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="col-lg-8 col-md-4">
                        <div class="select-items">
                            <label for="election_id" class="form-label">{{ "NIVEAU D'ELECTION" }}<span
                                    class="text-danger">*</span></label>
                            <select name="election_id" id="election_id" class="form-select form-select-lg mb-4">
                                @foreach ($election as $item)
                                    <option value="{{ $item->id }}">{{ $item->niveau }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="col-lg-8 col-md-4">
                        <div class="select-items">
                            <label for="parti_id" class="form-label">PARTI POLITIQUE<span
                                    class="text-danger">*</span></label>
                            <select name="parti_id" id="parti_id" class="form-select form-select-lg mb-4">
                                @foreach ($parti as $item)
                                    <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                div class="col-lg-6 col-md-6">
                <div class="input-form">
                    <label for="photo" class="form-label">Photo<span class="text-danger">*</span></label>
                    <input type="file" id="photo" name="photo" placeholder="Photo" class="form-control form-control-lg" required="required" />
                </div>

                <div class="col-lg-4">
                    <button type="submit" name="enregistrer" class="btn btn-success" style="background-color: rgb(5, 56, 5); color: white"><i class="fas fa-save"></i>Enregistrer</button>
                </div>
            </div>
        </div>
</form>
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

