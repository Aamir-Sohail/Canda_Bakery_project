@extends('layouts.master_baker')
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
                        <li class="breadcrumb-item"><a href="javascript:;">Assigned Bread to Resturants</a>
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
                        @php $sheet = DB::table('sheets')->where('id',Request::segment(2))->first(); @endphp
                        Assigned Bread to Resturants ( <strong>{{ $sheet->name }}</strong> )
                    </h5>
                    <div class="card-header-right">
                    </div>
                </div>
                <div class="card-block">
                    <table class="table table-condensed table-hover table-striped">
                        <thead>
                            <th style="width: 1%">#</th>
                            <th style="width: 10%">Resturant</th>
                            <th style="width: 35%">Bread Type</th>
                            <th style="width: 20%">Qty</th>
                            <th style="width: 20%">Status</th>
                            <th style="width: 10%">Action</th>

                        </thead>
                        <tbody>
                            @php $id=1; @endphp
                            @foreach ($resturants as $res)
                                @php
                                    $assignedBreadsData = DB::table('assigned_breads')
                                        ->where('resturant_id', $res->id)
                                        ->where('sheet', Request::segment('2'))
                                        ->get();
                                    $assignedTypes = DB::table('assigned_breads_type')
                                        ->where('resturant_id', $res->id)
                                        ->where('sheet', Request::segment('2'))
                                        ->get();
                                @endphp
                                @if (count($assignedBreadsData) > 0)
                                    <tr>
                                        {{-- <Updation Form> --}}
                                        <form action="{{ route('assigned.breads.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="sheet" value="{{ Request::segment('2') }}">
                                            <input type="hidden" name="id" value="{{ $assignedBreadsData[0]->id }}">
                                            <td>{{ $id++ }}</td>
                                            <td>
                                                {{ $res->name }}
                                                <input type="hidden" name="resturant_id" value="{{ $res->id }}">
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="co-lg-12 col-md-12">
                                                        <select name="bread_type[]" multiple style="width: 100%">
                                                            @foreach ($types as $data)
                                                                <option value="{{ $data->id }}">{{ $data->type }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @foreach ($assignedTypes as $assinedTypesData)
                                                            @php
                                                                $names = DB::table('bread_type')
                                                                    ->where('id', $assinedTypesData->type_id)
                                                                    ->get();
                                                            @endphp
                                                            <span class="badge badge-success">
                                                                {{ $names[0]->type }}
                                                                <a href="{{ route('assignedType.delete', ['id' => $assinedTypesData->id]) }}"
                                                                    class="ti-trash text-bold text-white"></a>
                                                            </span>
                                                        @endforeach

                                                    </div>
                                                </div>




                                            </td>
                                            <td>
                                                <input style="width: 100% !important" type="number"
                                                    value="{{ $assignedBreadsData[0]->qty }}" name="quantity"
                                                    class="form-control form-control-sm" placeholder="Qty">
                                            </td>
                                            <td>
                                                @if (@isset($assignedBreadsData[0]->status))
                                                    <span
                                                        class="badge {{ $assignedBreadsData[0]->status == 0 ? 'badge-primary' : 'badge-success' }}  ">
                                                        {{ $assignedBreadsData[0]->status == 0 ? 'Pending' : 'Done' }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-info ">
                                                        Pending
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-sm btn-inverse btn-block">
                                                    Change
                                                </button>
                                            </td>
                                        </form>
                                        {{-- End Updattion Form --}}
                                    </tr>
                                @else
                                    <tr>
                                        {{-- <Insertion Form> --}}
                                        <form action="{{ route('assigned.breads.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="sheet" value="{{ Request::segment('2') }}">
                                            <td>{{ $id++ }}</td>
                                            <td>
                                                {{ $res->name }}
                                                <input type="hidden" name="resturant_id" value="{{ $res->id }}">
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="co-lg-12 col-md-12">
                                                        <select name="bread_type[]" multiple style="width: 100%">
                                                            @foreach ($types as $data)
                                                                <option value="{{ $data->id }}">{{ $data->type }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>




                                            </td>
                                            <td>
                                                <input type="number" name="quantity" class="form-control form-control-sm"
                                                    placeholder="Qty">
                                            </td>
                                            <td>
                                                <span class="badge badge-info ">
                                                    Pending
                                                </span>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-sm btn-success btn-block">
                                                    Submit
                                                </button>
                                            </td>
                                        </form>
                                        {{-- End insertion Form --}}
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @include('resturants.create')
@endsection
