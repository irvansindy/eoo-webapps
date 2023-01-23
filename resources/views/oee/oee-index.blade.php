@extends('layouts.master')
@section('title', 'OEE')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card collapsed-card">
                <div class="card-header bg-danger">
                    <h3 class="card-title">Filter</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 mt-1">
                            <input type="date" id="from" class="form-control" onchange="getOee()" value="{{date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) )}}">
                        </div>
                        <div class="col-3 mt-1">
                            <input type="date" class="form-control" id="to" onchange="getOee()" value="{{date('Y-m-d')}}">
                        </div>
                        <div class="col-4">
                            <select name="officeFilter" id="officeFilter" class="select2" style="width:100%">
                                <option value=""> * - All Office</option>
                            </select>
                        </div>
                    </div>
                </div>
                
            </div>
    </div>
  </div>
    <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card card-dark">
                <div class="card-header bg-danger">
                    <div class="card-title">OEE</div>
                    <div class="card-tools">
                        <button id="addOeeHeader" type="button" class="btn btn-success" data-toggle="modal" data-target="#addOeeHeaderModal" style="float:right">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="datatable-bordered nowrap display" id="oeeTable">
                        <thead>
                            <tr>
                                <th style="text-align:center"></th>
                                <th style="text-align:center">Tgl Buat</th>
                                <th style="text-align:center">No Mesin</th>
                                <th style="text-align:center">Extruder</th>
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

@include('oee.add-oee')
@include('oee.log-oeeDetail')
@include('oee.edit-oeeDetail')
@include('oee.add-oee_detail')
@include('oee.filter-reportOeeDetail')
@include('oee.setting-oeeMasterSetting')
@endsection
@push('custom-js')
@include('oee.oee-js')
@endpush