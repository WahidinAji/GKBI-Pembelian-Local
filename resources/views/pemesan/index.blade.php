@extends('pemesan.layouts.main')
@section('title','Pemesan Page')
@section('status-user','Pemesan Page')
@section('main')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        @if(session('msg'))
            <div class="alert alert-success alert-dismissible" role="alert" style="z-index: 1">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('msg') }}
            </div>
        @endif
        <div class="card mb-4 mt-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable User pemesan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                   <h1>Dashboard pemesan</h1>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
