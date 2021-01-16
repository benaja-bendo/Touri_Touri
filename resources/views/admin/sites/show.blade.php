@extends('layouts.master')

@section('contenue')
    {{--    entete--}}
    <div class="card mb-3"><img class="card-img-top" src="{{ $site->imageP_path }}" alt="" width="1198"
                                height="493.547"/>
        <div class="card-body">
            <div class="row justify-content-between align-items-center">
                <div class="col">
                    <div class="d-flex">

                        <div class="flex-1 fs--1">
                            <h5 class="fs-0">{{ $site->title }}</h5>
                            <p class="mb-0">Crée le
                                <span
                                    class="text-primary">{{ \Carbon\Carbon::parse($site->created_at)->format('d M. Y')  }}</span>
                            </p>
                            <P>
                                Prix de la visite
                                <span class="fs-0 text-warning font-weight-semi-bold">{{ number_format($site->prix, 2, ',', ' ')  }} XAF</span>

                            </P>
                        </div>
                    </div>
                </div>
                <div class="col-md-auto mt-4 mt-md-0">
                    <button class="btn btn-falcon-default btn-sm mr-2" type="button">
                        <span class="far fa-star text-danger mr-1"></span>{{ $star_site }}
                    </button>
                    <button class="btn btn-falcon-danger btn-sm px-4 px-sm-5" type="button">rendre indisponible</button>
                </div>
            </div>
        </div>
    </div>
    {{--    corps--}}
    <div class="row g-0">
        {{--        gauche--}}
        <div class="col-lg-8 pr-lg-2">

            <div class="card mb-3">
                <div class="card-header bg-light">
                    <div class="row justify-content-between">
                        <div class="col">
                            <div class="d-flex">
                                <div class="flex-1 align-self-center ml-2">
                                    <p class="mb-1 lh-1">
                                        <span class="font-weight-semi-bold">
                                            Gallerie d'image
                                        </span>
                                    </p>
                                    <p class="mb-0 fs--1">
                                        l'ensemble des images de ce site
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-falcon-default btn-sm" type="button" data-toggle="modal"
                                    data-target="#ajout-gallerie">
                                <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                                <span class="d-none d-sm-inline-block ml-1">Ajouter</span>
                            </button>
                        </div>
                        {{--                    La modal--}}
                        <div class="modal fade" id="ajout-gallerie" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ajouter une image</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('gallerie.store') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="site_id" value="{{ $site->id }}">
                                        <div class="modal-body">
                                            <div class="p-4 pb-0">
                                                <div class="mb-3">
                                                    <label class="col-form-label"
                                                           for="recipient-name">
                                                        Titre de l'image:
                                                    </label>
                                                    <input name="title" class="form-control" id="recipient-name"
                                                           type="text">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="col-form-label">L'image:</label>
                                                    <div class="form-file">
                                                        <input name="image_path" class="form-file-input" id="customFile"
                                                               type="file"/>
                                                        <label class="form-file-label" for="customFile">
                                                            <span class="form-file-text">Choisir une image...</span>
                                                            <span class="form-file-button">Browse</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                                            </button>
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body overflow-hidden">
                    <div class="row mx-n1">
                        @foreach($galeries as $galerie)
                            <div class="col-6 p-1">
                                <a href="{{ $galerie->image_path }}" data-gallery="gallery-1">
                                    <img
                                        class="img-fluid rounded" src="{{ $galerie->image_path }}"
                                        alt=""/>
                                </a>
                                <form
                                      action="{{ route('gallerie.destroy',['gallerie'=>$galerie->id]) }}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-link btn-sm btn-reveal text-600">
                                        <span class="far fa-trash-alt"></span>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-light">
                    <div class="row flex-between-center">
                        <div class="col-4 col-sm-auto d-flex align-items-center pr-0">
                            <h5 class="mb-0">Les restaurants de ce site</h5>
                        </div>
                        <div class="col-8 col-sm-auto text-right pl-2">
                            <button class="btn btn-falcon-default btn-sm" type="button" data-toggle="modal"
                                    data-target="#ajout-restaurant">
                                <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                                <span class="d-none d-sm-inline-block ml-1">Ajouter</span>
                            </button>
                        </div>
                    </div>
                    {{--                    La modal--}}
                    <div class="modal fade" id="ajout-restaurant" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un restaurant</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <form action="{{ route('restaurant.store') }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="site_id" value="{{ $site->id }}">
                                    <div class="modal-body">
                                        <div class="p-4 pb-0">
                                            <div class="mb-3">
                                                <label class="col-form-label"
                                                       for="recipient-name">
                                                    Nom:
                                                </label>
                                                <input name="title" class="form-control" id="recipient-name"
                                                       type="text">
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label">Image:</label>
                                                <div class="form-file">
                                                    <input name="image_path" class="form-file-input" id="customFile"
                                                           type="file"/>
                                                    <label class="form-file-label" for="customFile">
                                                        <span class="form-file-text">Choisir une image...</span>
                                                        <span class="form-file-button">Browse</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                                        </button>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body fs--1">
                    @foreach($restaurants as $restaurant)
                        <div class="d-flex btn-reveal-trigger">
                            <div class="calendar">
                                <a href="{{ $restaurant->image_path }}">
                                    <img class="img-fluid rounded mr-3 d-none d-md-block"
                                         src="{{ $restaurant->image_path }}" alt="" width="80">
                                </a>
                            </div>
                            <div class="flex-1 position-relative pl-3">
                                <div class="bg-light btn-reveal-trigger d-flex flex-between-center">
                                    <h6 class="mb-0">
                                        <span>{{ $restaurant->title }}</span>
                                    </h6>
                                    <div>
                                        <button class="btn btn-link btn-sm btn-reveal text-600"
                                                type="button" data-toggle="modal"
                                                data-target="#edit-restaurant-{{ $restaurant->id }}">
                                            <span class="fas fa-pencil-alt"></span>
                                        </button>
                                        {{--                                        model edit--}}
                                        <div class="modal fade" id="edit-restaurant-{{ $restaurant->id }}" tabindex="-1"
                                             role="dialog"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modification
                                                            de {{ $restaurant->title }}</h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <form
                                                        action="{{ route('restaurant.update',['restaurant'=>$restaurant->id]) }}"
                                                        method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="site_id" value="{{ $site->id }}">
                                                        <div class="modal-body">
                                                            <div class="p-4 pb-0">
                                                                <div class="mb-3">
                                                                    <label class="col-form-label"
                                                                           for="recipient-name">
                                                                        Nom:
                                                                    </label>
                                                                    <input name="title" class="form-control"
                                                                           id="recipient-name" type="text"
                                                                           value="{{ $restaurant->title }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="col-form-label">Image:</label>
                                                                    <div class="form-file">
                                                                        <input name="image_path"
                                                                               value="{{ $restaurant->image_path }}"
                                                                               class="form-file-input"
                                                                               id="customFile" type="file"/>
                                                                        <label class="form-file-label" for="customFile"><span
                                                                                class="form-file-text">Choisir une image...</span><span
                                                                                class="form-file-button">Browse</span></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Fermer
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">Enregistrer
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <form style="display: inline-block"
                                              action="{{ route('restaurant.destroy',['restaurant'=>$restaurant->id]) }}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link btn-sm btn-reveal text-600">
                                                <span class="far fa-trash-alt"></span>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                                <div class="border-dashed-bottom my-3"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer bg-light p-0 border-top">
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-light">
                    <div class="row flex-between-center">
                        <div class="col-4 col-sm-auto d-flex align-items-center pr-0">
                            <h5 class="mb-0">Les shops de ce site</h5>
                        </div>
                        <div class="col-8 col-sm-auto text-right pl-2">
                            <button class="btn btn-falcon-default btn-sm" type="button" data-toggle="modal"
                                    data-target="#ajout-shops">
                                <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                                <span class="d-none d-sm-inline-block ml-1">Ajouter</span>
                            </button>
                        </div>
                    </div>
                    {{--                    La modal--}}
                    <div class="modal fade" id="ajout-shops" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un shop</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <form action="{{ route('shop.store') }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="site_id" value="{{ $site->id }}">
                                    <div class="modal-body">
                                        <div class="p-4 pb-0">
                                            <div class="mb-3">
                                                <label class="col-form-label"
                                                       for="recipient-name">
                                                    Nom:
                                                </label>
                                                <input name="title" class="form-control" id="recipient-name"
                                                       type="text">
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label">Image:</label>
                                                <div class="form-file">
                                                    <input name="image_path" class="form-file-input" id="customFile"
                                                           type="file"/>
                                                    <label class="form-file-label" for="customFile">
                                                        <span class="form-file-text">Choisir une image...</span>
                                                        <span class="form-file-button">Browse</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                                        </button>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body fs--1">
                    @foreach($shops as $shop)
                        <div class="d-flex btn-reveal-trigger">
                            <div class="calendar">
                                <a href="{{ $shop->image_path }}">
                                    <img class="img-fluid rounded mr-3 d-none d-md-block"
                                         src="{{ $shop->image_path }}" alt="" width="80">
                                </a>
                            </div>
                            <div class="flex-1 position-relative pl-3">
                                <div class="bg-light btn-reveal-trigger d-flex flex-between-center">
                                    <h6 class="mb-0">
                                        <span>{{ $shop->title }}</span>
                                    </h6>
                                    <div>
                                        <button class="btn btn-link btn-sm btn-reveal text-600"
                                                type="button" data-toggle="modal"
                                                data-target="#edit-restaurant-{{ $shop->id }}">
                                            <span class="fas fa-pencil-alt"></span>
                                        </button>
                                        {{--                                        model edit--}}
                                        <div class="modal fade" id="edit-restaurant-{{ $shop->id }}" tabindex="-1"
                                             role="dialog"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modification
                                                            de {{ $shop->title }}</h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <form
                                                        action="{{ route('shop.update',['shop'=>$shop->id]) }}"
                                                        method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="site_id" value="{{ $site->id }}">
                                                        <div class="modal-body">
                                                            <div class="p-4 pb-0">
                                                                <div class="mb-3">
                                                                    <label class="col-form-label"
                                                                           for="recipient-name">
                                                                        Nom:
                                                                    </label>
                                                                    <input name="title" class="form-control"
                                                                           id="recipient-name" type="text"
                                                                           value="{{ $shop->title }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="col-form-label">Image:</label>
                                                                    <div class="form-file">
                                                                        <input name="image_path"
                                                                               value="{{ $shop->image_path }}"
                                                                               class="form-file-input"
                                                                               id="customFile" type="file"/>
                                                                        <label class="form-file-label" for="customFile"><span
                                                                                class="form-file-text">Choisir une image...</span><span
                                                                                class="form-file-button">Browse</span></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Fermer
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">Modifier
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <form style="display: inline-block"
                                              action="{{ route('shop.destroy',['shop'=>$shop->id]) }}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link btn-sm btn-reveal text-600">
                                                <span class="far fa-trash-alt"></span>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                                <div class="border-dashed-bottom my-3"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer bg-light p-0 border-top">
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-light">
                    <div class="row flex-between-center">
                        <div class="col-4 col-sm-auto d-flex align-items-center pr-0">
                            <h5 class="mb-0">Les deplacements de ce site</h5>
                        </div>
                        <div class="col-8 col-sm-auto text-right pl-2">
                            <button class="btn btn-falcon-default btn-sm" type="button" data-toggle="modal"
                                    data-target="#ajout-deplacement">
                                <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                                <span class="d-none d-sm-inline-block ml-1">Ajouter</span>
                            </button>
                        </div>
                    </div>
                    {{--                    La modal--}}
                    <div class="modal fade" id="ajout-deplacement" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un deplacement</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <form action="{{ route('deplacement.store') }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="site_id" value="{{ $site->id }}">
                                    <div class="modal-body">
                                        <div class="p-4 pb-0">
                                            <div class="mb-3">
                                                <label class="col-form-label"
                                                       for="recipient-name">
                                                    Nom:
                                                </label>
                                                <input name="title" class="form-control" id="recipient-name"
                                                       type="text">
                                            </div>
                                            <div class="mb-3">
                                                <label for="type">Type de deplacement</label>
                                                <select class="form-control" name="type" id="type">
                                                    <option value="">choisir une option</option>
                                                    <option value="terrestre">terrestre</option>
                                                    <option value="aerien">aerien</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label">Image:</label>
                                                <div class="form-file">
                                                    <input name="image_path" class="form-file-input" id="customFile"
                                                           type="file"/>
                                                    <label class="form-file-label" for="customFile">
                                                        <span class="form-file-text">Choisir une image...</span>
                                                        <span class="form-file-button">Browse</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="etat">Etat du bien</label>
                                                <select class="form-control" name="etat" id="type">
                                                    <option value="">choisir une option</option>
                                                    <option value="bon">bon</option>
                                                    <option value="en panne">en panne</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                                        </button>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body fs--1">
                    @foreach($deplacements as $deplacement)
                        <div class="d-flex btn-reveal-trigger">
                            <div class="calendar">
                                <a href="{{ $deplacement->image_path }}">
                                    <img class="img-fluid rounded mr-3 d-none d-md-block"
                                         src="{{ $deplacement->image_path }}" alt="" width="80">
                                </a>
                            </div>
                            <div class="flex-1 position-relative pl-3">
                                <div class="bg-light btn-reveal-trigger d-flex flex-between-center">
                                    <h6 class="mb-0">
                                        <span>{{ $deplacement->title }}</span>
                                    </h6>
                                    <strong class="text-primary"> {{ $deplacement->type }} </strong>
                                    <strong class="text-primary"> {{ $deplacement->etat }} </strong>
                                    <div>
                                        <button class="btn btn-link btn-sm btn-reveal text-600"
                                                type="button" data-toggle="modal"
                                                data-target="#edit-restaurant-{{ $deplacement->id }}">
                                            <span class="fas fa-pencil-alt"></span>
                                        </button>
                                        {{--                                        model edit--}}
                                        <div class="modal fade" id="edit-restaurant-{{ $deplacement->id }}"
                                             tabindex="-1"
                                             role="dialog"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modification
                                                            de {{ $deplacement->title }}</h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <form
                                                        action="{{ route('deplacement.update',['deplacement'=>$deplacement->id]) }}"
                                                        method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="site_id" value="{{ $site->id }}">
                                                        <div class="modal-body">
                                                            <div class="p-4 pb-0">
                                                                <div class="mb-3">
                                                                    <label class="col-form-label"
                                                                           for="recipient-name">
                                                                        Nom:
                                                                    </label>
                                                                    <input name="title" class="form-control"
                                                                           id="recipient-name" type="text"
                                                                           value="{{ $deplacement->title }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="type">Type de deplacement</label>
                                                                    <select class="form-control" name="type" id="type">
                                                                        <option value="">choisir une option</option>
                                                                        <option value="terrestre">terrestre</option>
                                                                        <option value="aerien">aerien</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="col-form-label">Image:</label>
                                                                    <div class="form-file">
                                                                        <input name="image_path"
                                                                               value="{{ $deplacement->image_path }}"
                                                                               class="form-file-input"
                                                                               id="customFile" type="file"/>
                                                                        <label class="form-file-label" for="customFile"><span
                                                                                class="form-file-text">Choisir une image...</span><span
                                                                                class="form-file-button">Browse</span></label>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="etat">Etat du bien</label>
                                                                    <select class="form-control" name="etat" id="type">
                                                                        <option value="">choisir une option</option>
                                                                        <option value="bon">bon</option>
                                                                        <option value="en panne">en panne</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Fermer
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">Modifier
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <form style="display: inline-block"
                                              action="{{ route('deplacement.destroy',['deplacement'=>$deplacement->id]) }}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link btn-sm btn-reveal text-600">
                                                <span class="far fa-trash-alt"></span>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                                <div class="border-dashed-bottom my-3"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer bg-light p-0 border-top">
                </div>
            </div>
        </div>
        {{--        droite--}}
        <div class="col-lg-4 pl-lg-2">
            <div class="sticky-sidebar">
                <div class="card mb-3 fs--1">
                    <div class="card-body">
                        <p>
                            <a href="{{ route('site.edit',['site'=>$site->id]) }}" class="btn btn-falcon-default btn-block mb-2">
                                <span class="far fa-edit text-primary mr-1"></span>
                                <span class="font-weight-medium ml-2 text-primary">Modifier</span>
                            </a>
                        </p>

                        <h6>Description</h6>
                        <p class="mb-1">
                            {{ $site->description }}
                        </p>
                        <h6 class="mt-4">Detail sur la sécurité et la santé</h6>
                        <div class="mb-1">
                            {{ $site->santer_securite }}
                        </div>
                        <h6 class="mt-4">Département du site</h6>
                        <div class="fs--1 mb-0">
                            <p class="mb-1">{{ $departement->title }}</p>
                            <p class="mb-1">
                                <img class="mb-1" src="{{ $departement->image_path }}" alt="" width="50%" height="50%">
                            </p>
                            <button type="button" data-toggle="modal"
                                    data-target="#modif-departement-{{ $departement->id }}">Modifier le departement</button>
                            {{--modal de modification--}}
                            <div class="modal fade" id="modif-departement-{{ $departement->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un departement</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('departement.update',['departement'=>$departement->id]) }}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="p-4 pb-0">
                                                    <div class="mb-3">
                                                        <label class="col-form-label"
                                                               for="recipient-name">
                                                            Nom:
                                                        </label>
                                                        <input name="title" value="{{ $departement->title }}" class="form-control" id="recipient-name"
                                                               type="text">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="message-text" class="col-form-label">Description:</label>
                                                        <textarea name="description" class="form-control" id="message-text">value="{{ $departement->description }}"</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Image:</label>
                                                        <div class="form-file">
                                                            <input name="image_path" class="form-file-input" id="customFile"
                                                                   type="file"/>
                                                            <label class="form-file-label" for="customFile">
                                                                <span class="form-file-text">Choisir une image...</span>
                                                                <span class="form-file-button">Browse</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                                                </button>
                                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
