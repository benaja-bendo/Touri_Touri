@extends('layouts.master')

@section('title')
    reservation en attente de validation
@endsection

@section('contenue')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-3" id="customersTable"
         data-list='{"valueNames":["detail","action"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pr-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Les reversations en attente <span
                            class="badge rounded-circle ml-2 bg-200 text-danger">{{ $nbr_reservation }}</span></h5>
                </div>
                <div class="col-8 col-sm-auto text-right pl-2">
                    <div class="d-none" id="table-customers-actions">
                        <div class="d-flex">
                            <select class="form-select form-select-sm" aria-label="Bulk actions">
                                <option selected="">Bulk actions</option>
                                <option value="Refund">Refund</option>
                                <option value="Delete">Delete</option>
                                <option value="Archive">Archive</option>
                            </select>
                            <button class="btn btn-falcon-default btn-sm ml-2" type="button">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-sm table-striped fs--1 mb-0">
                    <thead class="bg-200 text-900">
                    <tr>
                        <th>
                            <div class="form-check fs-0 mb-0 d-flex align-items-center">
                                <input class="form-check-input"
                                       id="checkbox-bulk-customers-select"
                                       type="checkbox"
                                       data-bulk-select='{"body":"table-customers-body","actions":"table-customers-actions","replacedElement":"table-customers-replace-element"}'/>
                            </div>
                        </th>
                        <th class="sort pr-1 align-middle white-space-nowrap" data-sort="detail">Detail de la
                            reservation
                        </th>
                        <th class="sort pr-1 align-middle white-space-nowrap" data-sort="action">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="list" id="table-customers-body">
                    @foreach($reservations as $reservation)
                        <tr class="btn-reveal-trigger">
                            <td class="align-middle py-2" style="width: 28px;">
                                <div class="form-check fs-0 mb-0 d-flex align-items-center">
                                    <input
                                        class="form-check-input" type="checkbox" id="customer-0"
                                        data-bulk-select-row="data-bulk-select-row"/>
                                </div>
                            </td>
                            <th class="pr-1 align-middle white-space-nowrap" data-sort="detail">
                                <div class="flex-1 position-relative pl-3">
                                    <h6 class="fs-0 mb-0 text-primary">
                                        {{ $reservation->title }}
                                    </h6>
                                    <p class="mb-1">
                                        Pour le: <span
                                            class="text-1000">{{ $reservation->date  }}</span>
                                    </p>
                                    <p class="mb-1">
                                        Initier par: <a href="{{ route('user.show',['user'=>$reservation->user_id]) }}"
                                                        class="text-700">{{ $reservation->name }}</a>
                                    </p>
                                    <p class="mb-1">
                                        Pour <span class="text-1000">{{ $reservation->nbr_personne }} personne </span>
                                    </p>
                                    <P>
                                        Prix de la visite
                                        <span class="fs-0 text-warning font-weight-semi-bold">{{ number_format(($reservation->prix)*$reservation->nbr_personne, 2, ',', ' ')  }} XAF</span>
                                    </P>
                                </div>
                            </th>
                            <td class="align-middle white-space-nowrap py-2 text-right" data-sort="action"
                                style="width: 88px;">
                                <form action="{{ route('reservation.accepter',['status'=>1,'id'=>$reservation->reservations_id]) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button class="btn  btn-sm btn-reveal text-600"
                                            type="submit">
                                        <span class="far fa-thumbs-up"></span> accepter
                                    </button>
                                </form>


                                {{--                                <form style="display: inline-block"--}}
                                {{--                                      action="#"--}}
                                {{--                                      method="post">--}}
                                {{--                                    @csrf--}}
                                {{--                                    <button type="submit" class="btn btn-link btn-sm btn-reveal text-600">--}}
                                {{--                                        <span class="far fa-trash-alt"></span>--}}
                                {{--                                    </button>--}}
                                {{--                                </form>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-center">
            <button class="btn btn-sm btn-falcon-default mr-1" type="button" title="Previous"
                    data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
            <ul class="pagination mb-0"></ul>
            <button class="btn btn-sm btn-falcon-default ml-1" type="button" title="Next" data-list-pagination="next">
                <span class="fas fa-chevron-right"></span></button>
        </div>
    </div>
@endsection
