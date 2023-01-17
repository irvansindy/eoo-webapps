@extends('layouts.master')
@section('title', 'Master DieHead')
@section('content')
<div class="container">
    <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="card card-dark">
                <div class="card-header">
                    <div class="card-title">List DieHead</div>
                    <div class="card-tools">
                        <button id="addDieHead" type="button" class="btn btn-success" data-toggle="modal" data-target="#addDieHeadModal" style="float:right">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="datatable-bordered nowrap display" id="dieHeadTable">
                        <thead>
                            <tr>
                                <th style="text-align:center">Nama</th>
                                <th style="text-align:center">Nama Mesin</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
      </div>
    </div>
</div>

@include('dieHead.add-dieHead')
@include('dieHead.edit-dieHead')
@endsection
@push('custom-js')
@include('dieHead.dieHead-js')
@endpush