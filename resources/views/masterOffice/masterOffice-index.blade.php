@extends('layouts.master')
@section('title', 'Master Kantor')
@section('content')
<div class="container">
    <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="card card-dark">
                <div class="card-header">
                    <div class="card-title">List Kantor</div>
                    <div class="card-tools">
                        <button id="addOffice" type="button" class="btn btn-success" data-toggle="modal" data-target="#addMasterOffice" style="float:right">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="datatable-bordered nowrap display" id="officeTable">
                        <thead>
                            <tr>
                                <th style="text-align:center"></th>
                                <th style="text-align:center">Status</th>
                                <th style="text-align:center">Nama</th>
                                <th style="text-align:center">Inisial</th>
                                <th style="text-align:center">Lokasi</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
      </div>
    </div>
</div>
@include('masterOffice.add-masterOffice')
{{-- @include('master_kantor.edit-master_kantor') --}}
@endsection
@push('custom-js')
@include('masterOffice.masterOffice-js')
@endpush