
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
                        <li class="breadcrumb-item"><a href="javascript:;">Sheets</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
      
          
                    @php $id=1; @endphp
                    @foreach ($sheets as $data)

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block" style="">
                                    <div class="row align-items-center">

                                        <div class="col-8">
                                            <a href="{{ route('assigned.breads.create', ['sheet' => $data->id]) }}">
                                                <h6 style="font-size: 12px !important;" class="text-c-green">
                                                    {{ $data->name }}
                                                </h6>
                                                <h6 class="text-muted m-b-0">
                                                    {{ $data->date }}
                                                </h6>
                                            </a>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-file-text-o f-28"></i>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer bg-inverse">
                                    <div class="row align-items-center">

                                        <div class="col-9">
                                            <p class="text-white m-b-0">
                                                <button type="button" data-toggle="modal"
                                                    data-target="#breadModalEdit{{ $data->id }}"
                                                    class="btn btn-primary btn-sm btn-skew btn-mat">
                                                    <span class="ti-pencil-alt"></span>
                                                </button>
                                                <a href="{{ route('sheets.delete', ['id' => $data->id]) }}"
                                                    class="btn btn-danger btn-sm btn-skew btn-mat">
                                                    <span class="ti-trash"></span>
                                                    &nbsp;
                                                </a>
                                                @include('sheets.edit')
                                            </p>
                                        </div>

                                        <div class="col-3 text-right">
                                            <p class="text text-white">

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
   
    @include('sheets.create')
@endsection
