@extends('layouts.master')
@section('page_header')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                        <p class="m-b-0">Welcome to Canada Bakery</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:;">Resturants</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>
                        Bread Types
                    </h5>


                    <div class="card-header-right">

                        <button type="button" data-toggle="modal" data-target="#exampleModal"
                            class="btn waves-effect btn-sm waves-light btn-inverse btn-outline-inverse"
                            style="margin-top: -10% !important">
                            <i class="ti-plus text-bold text-black"
                                style="font-weight: bold !important; font-size:12px !important"></i>Add Bread Type
                        </button>
                    </div>
                </div>
                <div class="card-block">
                    <table class="table table-condensed table-hover table-striped">
                        <thead>
                            <th style="width: 5%">#</th>
                            <th style="width: 75%">Type</th>
                            <th style="width: 20%">Action</th>
                        </thead>
                        <tbody>
                            @php $id=1; @endphp
                            @foreach ($types as $data)
                                <tr>
                                    <td>{{ $id++ }}</td>
                                    <td>
                                        {{ $data->type }}
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Are u sure')"
                                            href="{{ route('bread.delete', ['id' => $data->id]) }}"
                                            class="btn btn-sm btn-danger btn-skew btn-mat">
                                            <span class="ti-trash"></span> Delete
                                        </a>
                                        <button type="button" data-toggle="modal"
                                            data-target="#breadModalEdit{{ $data->id }}"
                                            class="btn btn-primary btn-sm btn-skew btn-mat">
                                            <span class="ti-pencil-alt"></span> Edit
                                        </button>
                                        @include('bread_type.edit')
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('bread_type.create')
@endsection
