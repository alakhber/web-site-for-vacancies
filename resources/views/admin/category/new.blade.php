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
                            <li class="breadcrumb-item active">Yeni Dil</li>
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
                                <form action="{{ route('back.category.store') }}" method="post">
                                    @csrf
                                    <div class="form-group col-lg-12">
                                        <label class="col-lg-12">Kateqorya Adı</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Kateqorya Adı ">
                                            @error('name')
                                                <span id="name" class="error invalid-feedback" style="">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-plus mr-2"></i>Əlavə Et</button>
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
