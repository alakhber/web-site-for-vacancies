@extends('layouts.admin')
@section('_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">İstifadəçi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="{{ route('back.home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active">İstifadəçilər</li>
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
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="width: 1%">#</th>
                                            <th>Ad Soyad</th>
                                            <th>E-Poçt</th>
                                            <th>İstifadəçi Adı</th>
                                            <th style="width: 1%">Əməliyyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $user->fullname }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('back.user.edit', $user->id) }}" class="text-success">
                                                        <i class="fas fa-edit mr-2"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="text-danger userDelete">
                                                        
                                                        <i class="fas fa-trash"></i>
                                                        <form action="{{ route('back.user.delete', $user->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
@section('_script')
    <script>
        $('.userDelete').on('click',function(){
            console.log($(this).find('form').submit());
        })
    </script>
@endsection