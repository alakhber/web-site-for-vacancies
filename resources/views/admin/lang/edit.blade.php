@extends('layouts.admin')
@section('_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dil</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="{{ route('back.home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active">Dil</li>
                            <li class="breadcrumb-item active">{{ $lang->country }}</li>
                            <li class="breadcrumb-item active">Redaktə</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <form action="{{ route('back.lang.update',$lang->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                   <div class="row">
                                    <div class="form-group col-lg-6">
                                        <div class="col-md-12">
                                            <input type="text" name="locale" value="{{ $lang->locale }}" class="form-control @error('locale') is-invalid @enderror" id="locale" placeholder="Məsələn: en ">
                                            @error('locale')
                                                <span id="locale" class="error invalid-feedback" style="">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <div class="col-md-12">
                                            <input type="text" name="country" value="{{ $lang->country }}" class="form-control @error('country') is-invalid @enderror" id="country" placeholder="Məsələn: Azərbaycan ">
                                            @error('country')
                                                <span id="country" class="error invalid-feedback" style="">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                   </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-edit mr-2"></i>Redaktə Et</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
