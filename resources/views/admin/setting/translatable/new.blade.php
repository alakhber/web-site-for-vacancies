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
                                <form action="{{ route('back.setting.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label class="col-sm-12" for="locale_id">Dil</label>
                                            <div class="col-sm-12">
                                                <select name="locale_id" class="form-control form-control-line @error('locale_id') is-invalid @enderror" id="locale_id">
                                                    @foreach ($langs as $lang)
                                                        <option value="{{ $lang->id }}">{{ $lang->country }}</option>
                                                    @endforeach
                                                </select>
                                                @error('locale_id')
                                                    <span id="locale_id" class="error invalid-feedback" style="">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-12" for="title">basliq</label>
                                            <div class="col-md-12">
                                                <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Basliq ">
                                                @error('title')
                                                    <span id="title" class="error invalid-feedback" style="">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-12" for="keyword">Keyword</label>
                                            <div class="col-md-12">
                                                <textarea name="keyword" class="form-control @error('keyword') is-invalid @enderror" placeholder="Keyword " id="keyword" style="resize: none;height:180px">{{ old('keyword') }}</textarea>
                                                @error('keyword')
                                                    <span id="keyword" class="error invalid-feedback" style="">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="col-lg-12" for="description">Description</label>
                                            <div class="col-md-12">
                                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description " id="description" style="resize: none;height:180px">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <span id="description" class="error invalid-feedback" style="">{{ $message }}</span>
                                                @enderror
                                            </div>
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
