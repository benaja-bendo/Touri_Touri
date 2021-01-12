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
                        </div>
                    </div>
                </div>
                <div class="card-body overflow-hidden">
                    <div class="row mx-n1">
                        @foreach($galeries as $galerie)
                            <div class="col-6 p-1">
                                <a href="{{ asset('dist/assets/img/generic/4.jpg') }}" data-gallery="gallery-1">
                                    <img
                                        class="img-fluid rounded" src="{{ asset('dist/assets/img/generic/4.jpg') }}"
                                        alt=""/>
                                </a>
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
                            <button class="btn btn-falcon-default btn-sm" type="button">
                                <span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span>
                                <span class="d-none d-sm-inline-block ml-1">Ajouter</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body fs--1">
                    @foreach($restaurants as $restaurant)
                        <div class="d-flex btn-reveal-trigger">
                            <div class="calendar">
                                <img class="img-fluid rounded mr-3 d-none d-md-block"
                                     src="{{ $restaurant->image_path }}" alt="" width="80">
                            </div>
                            <div class="flex-1 position-relative pl-3">
                                <h6 class="fs-0 mb-0">
                                    <a href="#">{{ $restaurant->title }}</a>
                                </h6>
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
                            <button class="btn btn-falcon-default btn-sm" type="button">
                                <span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span>
                                <span class="d-none d-sm-inline-block ml-1">Ajouter</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body fs--1">
                    @foreach($shops as $shop)
                        <div class="d-flex btn-reveal-trigger">
                            <div class="calendar">
                                <img class="img-fluid rounded mr-3 d-none d-md-block"
                                     src="{{ $shop->image_path }}" alt="" width="80">
                            </div>
                            <div class="flex-1 position-relative pl-3">
                                <h6 class="fs-0 mb-0">
                                    <a href="#">{{ $shop->title }}</a>
                                </h6>
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
                            <h5 class="mb-0">Les déplacements de ce site</h5>
                        </div>
                        <div class="col-8 col-sm-auto text-right pl-2">
                            <button class="btn btn-falcon-default btn-sm" type="button">
                                <span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span>
                                <span class="d-none d-sm-inline-block ml-1">Ajouter</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body fs--1">
                    @foreach($deplacements as $deplacement)
                        <div class="d-flex btn-reveal-trigger">
                            <div class="calendar">
                                <img class="img-fluid rounded mr-3 d-none d-md-block"
                                     src="{{ $deplacement->image_path }}" alt="" width="80">
                            </div>
                            <div class="flex-1 position-relative pl-3">
                                <h6 class="fs-0 mb-0">
                                    <a href="#">{{ $deplacement->title }}</a>
                                </h6>
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
                            <button class="btn btn-falcon-default btn-block mb-2">
                                <span class="far fa-edit text-primary mr-1"></span>
                                <span class="font-weight-medium ml-2 text-primary">Modifier</span>
                            </button>
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
                            <a href="#">Modifier le departement</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
