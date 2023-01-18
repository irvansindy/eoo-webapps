@extends('layouts.master')
@section('title', 'Master Machine')
@section('content')
<div class="container">
    <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="card card-dark">
                <div class="card-header bg-orange">
                    <div class="card-title text-white">List Mesin</div>
                    <div class="card-tools">
                        <button id="addMachine" type="button" class="btn btn-success" data-toggle="modal" data-target="#addMasterMachine" style="float:right">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="datatable-bordered nowrap display" id="machineTable">
                        <thead>
                            <tr>
                                <th style="text-align:center">No Mesin</th>
                                <th style="text-align:center">Nama</th>
                                <th style="text-align:center">Tipe Mesin</th>
                                <th style="text-align:center">Kantor</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
      </div>
    </div>
</div>
@include('masterMachine.add-masterMachine')
@include('masterMachine.edit-masterMachine')
@endsection
@push('custom-js')
@include('masterMachine.masterMachine-js')
@endpush