@extends('layouts.master')

@section('contenue')

    <div class="card mb-3">
        <div class="card-header position-relative min-vh-25 mb-7">
            <div class="bg-holder rounded-lg rounded-bottom-0"
                 style="background-image:url({{ asset('dist/assets/img/generic/4.jpg') }});"></div>
            <!--/.bg-holder-->
            <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm"
                                                               src="{{ asset('dist/assets/img/team/2.jpg') }}"
                                                               width="200" alt=""/></div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mb-1">{{ $user->name }}</h4>
                    <h5 class="fs-0 font-weight-normal"></h5>
                    {{--                <button class="btn btn-falcon-primary btn-sm px-3" type="button">--}}
                    {{--                    Following</button>--}}
                    {{--                <button class="btn btn-falcon-default btn-sm px-3 ml-2" type="button">--}}
                    {{--                    Message--}}
                    {{--                </button>--}}
                    <div class="border-dashed-bottom my-4 d-lg-none"></div>
                </div>

            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <div class="row justify-content-between">
                <div class="col-md-auto">
                    <h5 class="mb-3 mb-md-0">Les reservations de l'utilisateur</h5>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="row gx-card mx-0 bg-200 text-900 fs--1 font-weight-semi-bold">
                <div class="col-9 col-md-8 py-2">Nom du site</div>
                <div class="col-3 col-md-4">
                    <div class="row">
                        <div class="col-md-8 py-2 d-none d-md-block text-center">Nombre de personne</div>
                        <div class="col-12 col-md-4 text-right py-2">Prix</div>
                    </div>
                </div>
            </div>
            @foreach($reservations as $reservation)
                <div class="row gx-card mx-0 align-items-center border-bottom border-200">
                    <div class="col-8 py-3">
                        <div class="d-flex align-items-center"><a href="#">
                                <img
{{--                                    class="img-fluid rounded mr-3 d-none d-md-block" src="{{ asset('dist/assets/img/products/1.jpg') }}"--}}
                                    class="img-fluid rounded mr-3 d-none d-md-block" src="{{ $reservation->imageP_path }}"
                                    alt="" width="60"/></a>
                            <div class="flex-1">
                                <h5 class="fs-0">
                                    <a class="text-900" href="#">
                                        {{ $reservation->title }}
                                    </a>
                                </h5>
                                <div class="fs--2 fs-md--1"><a class="text-danger" href="{{ route('site.show',['site'=>$reservation->site_id]) }}">voir</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 py-3">
                        <div class="row align-items-center">
                            <div
                                class="col-md-8 d-flex justify-content-end justify-content-md-center order-1 order-md-0">
                                <div>
                                    <div class="input-group input-group-sm flex-nowrap" data-quantity="data-quantity">
                                        {{--                                <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="minus">-</button>--}}
                                        <input class="form-control text-center px-2 input-spin-none" type="number"
                                               value="{{ $reservation->nbr_personne }}"
                                               style="width: 50px"/>
                                        {{--                                <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="plus">+</button>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-right pl-0 order-0 order-md-1 mb-2 mb-md-0 text-600">{{ number_format($reservation->prix, 2, ',', ' ')  }} XAF</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
