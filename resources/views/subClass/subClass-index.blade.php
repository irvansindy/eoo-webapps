@extends('layouts.master')
@section('title', 'Master Sub Class')
@section('content')
<div class="container">
    <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="card card-dark">
                <div class="card-header">
                    <div class="card-title">List Sub Class</div>
                    <div class="card-tools">
                        <button id="addSubClass" type="button" class="btn btn-success" data-toggle="modal" data-target="#addSubClassModal" style="float:right">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="datatable-bordered nowrap display" id="subClassTable">
                        <thead>
                            <tr>
                                <th style="text-align:center">Nama</th>
                                <th style="text-align:center">Product Class</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
      </div>
    </div>
</div>

@include('subClass.add-subClass')
@include('subClass.edit-subClass')
@endsection
@push('custom-js')
@include('subClass.subClass-js')
@endpush