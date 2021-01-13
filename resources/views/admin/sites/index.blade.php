@extends('layouts.master')

@section('title')

@endsection

@section('contenue')
    <div class="card mb-3" id="customersTable"
         data-list='{"valueNames":["name","email","phone","address","joined"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pr-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Tous les sites</h5>
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
                    <div id="table-customers-replace-element">
                        <a href="{{ route('site.create') }}" class="btn btn-falcon-default btn-sm">
                            <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                            <span class="d-none d-sm-inline-block ml-1">Cree un site</span>
                        </a>
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
                        <th class="sort pr-1 align-middle white-space-nowrap" data-sort="name">Nom du site</th>
                        <th class="sort pr-1 align-middle white-space-nowrap" data-sort="email">Prix de la visite</th>
                        <th class="sort pr-1 align-middle white-space-nowrap" data-sort="phone">Disponibilité</th>
                        {{--                        <th class="sort pr-1 align-middle white-space-nowrap pl-5" data-sort="address"--}}
                        {{--                            style="min-width: 200px;">Billing Address--}}
                        {{--                        </th>--}}
                        <th class="sort pr-1 align-middle white-space-nowrap" data-sort="joined">Date de creation</th>
                        <th class="align-middle no-sort"></th>
                    </tr>
                    </thead>
                    <tbody class="list" id="table-customers-body">
                    @foreach($sites as $site)
                        <tr class="btn-reveal-trigger">
                            <td class="align-middle py-2" style="width: 28px;">
                                <div class="form-check fs-0 mb-0 d-flex align-items-center">
                                    <input
                                        class="form-check-input" type="checkbox" id="customer-0"
                                        data-bulk-select-row="data-bulk-select-row"/>
                                </div>
                            </td>
                            <td class="name align-middle white-space-nowrap py-2">
                                <a href="{{ route('site.show',['site'=>$site->id]) }}">
                                    <div class="d-flex d-flex align-items-center">
                                        <div class="avatar avatar-xl mr-2">
                                            <img class="rounded-circle" src="{{ $site->imageP_path }}"
                                                 alt="">
                                        </div>
                                        <div class="flex-1">
                                            <h5 class="mb-0 fs--1">{{ $site->title }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </td>
                            <td class="email align-middle py-2">
                                {{ number_format($site->prix, 2, ',', ' ')  }} XAF
                            </td>
                            <td class="phone align-middle white-space-nowrap py-2">
                                <span class="badge badge rounded-pill badge-soft-success">
                                    Dispo
                                    <span class="ml-1 fas fa-check" data-fa-transform="shrink-2"></span>
                                </span>
                            </td>

                            <td class="joined align-middle py-2">
                                {{ \Carbon\Carbon::parse($site->created_at)->format('d M. Y')  }}
                            </td>

                            <td class="align-middle white-space-nowrap py-2 text-right">
                                <div class="dropdown font-sans-serif">
                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal"
                                            type="button" id="customer-dropdown-0" data-toggle="dropdown"
                                            data-boundary="window" aria-haspopup="true" aria-expanded="false">
                                        <span class="fas fa-ellipsis-h fs--1"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right border py-0"
                                         aria-labelledby="customer-dropdown-0">
                                        <div class="bg-white py-2">
                                            <a class="dropdown-item"
                                               href="{{ route('site.show',['site'=>$site->id]) }}">detail du site</a>
                                            <form action="{{ route('site.destroy',['site'=>$site->id]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="dropdown-item text-danger">
                                                    Supprimer le site
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
