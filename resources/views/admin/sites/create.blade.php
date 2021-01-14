@extends('layouts.master')

@section('title')
    cree un site
@endsection

@section('contenue')
    <form action="{{ route('site.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card mb-3">
            <div class="card-body">
                <div class="row flex-between-center">
                    <div class="col-md">
                        <h5 class="mb-2 mb-md-0">Crée un site tourristique</h5>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-falcon-default btn-sm mr-2" role="button">Sauvegarder
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-0">
            {{--        droite--}}
            <div class="col-lg-8 pr-lg-2">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Les details du site</h5>
                    </div>
                    <div class="card-body bg-light">
                        <div class="row gx-2">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">Le nom du site</label>
                                <input name="title" class="form-control" id="event-name" type="text"
                                       placeholder="Event Title"/>
                            </div>

                            <div class="row gx-2">
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label" for="field-name">Prix du site</label>
                                    <input name="prix" class="form-control form-control-sm" id="field-name" type="number"
                                           placeholder="">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label" for="field-name">Image du site</label>
                                    <div class="form-file form-file-sm mb-3">
                                        <input name="imageP_path" class="form-file-input" id="customFileLg" type="file" />
                                        <label class="form-file-label" for="customFileLg">
                                            <span class="form-file-text">Choisir un fichier...</span>
                                            <span class="form-file-button">Dossier</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label"
                                       for="event-description">Description</label>
                                <textarea name="description" class="form-control" id="event-description" rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Autres détail</h5>
                    </div>
                    <div class="card-body bg-light">
                        <div class="row gx-2">
                            <div class="col-12">
                                <label class="form-label"
                                       for="event-description">Sécurité et santé</label>
                                <textarea name="santer_securite" class="form-control" id="event-description" rows="6"></textarea>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{--        gauche--}}
            <div class="col-lg-4 pl-lg-2">
                <div class="sticky-sidebar">
                    <div class="card mb-3 mb-lg-0">
                        <div class="card-header">
                            <h5 class="mb-0">Lier à un departement</h5>
                        </div>
                        <div class="card-body bg-light">
                            <div class="mb-3">
                                <label class="form-label" for="event-topic">Selectionne un departement</label>
                                <select
                                    class="form-select" id="event-topic" name="departement_id">
                                    <option value="" selected="selected">Select de departement</option>
                                    @foreach($departements as $departement)
                                        <option value="{{ $departement->id }}">{{ $departement->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
