@extends('layouts.admin')

@section('_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dillər</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="{{ route('back.home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active">Dillər</li>
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
                                <table class="table col-12" >
                                    <thead class="thead-dark" >
                                        <tr>
                                            <th style="width: 1%">#</th>
                                            <th>Kod</th>
                                            <th>Ölkə</th>
                                            <th style="width: 1%">Default</th>
                                            <th style="width: 1%">Status</th>
                                            <th style="width: 1%">Emeliyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($langs as $lang)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $lang->locale }}</td>
                                                <td>{{ $lang->country }}</td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-id="{{ $lang->id }}" class="{{ $lang->locale == $defaultLang->site_language ? 'text-success' : 'text-danger setDafault'}} ">
                                                        <i class="fas {{ $lang->locale == $defaultLang->site_language ? 'fa-check-circle' : 'fa-minus-circle'}}"></i>
                                                    </a>
                                                    <form method="POST" id="setDafault_{{ $lang->id }}" action="{{ route('back.lang.default',$lang->id) }}">
                                                        @method('patch')
                                                        @csrf
                                                    </form>
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" data-id="{{ $lang->id }}" class="{{ $lang->status ? 'text-success' : 'text-danger'}} status">
                                                        <i class="fas {{ $lang->status ? 'fa-check-circle' : 'fa-minus-circle'}}"></i>
                                                    </a>
                                                    <form method="POST" id="status_{{ $lang->id }}" action="{{ route('back.lang.status',$lang->id) }}">
                                                        @method('patch')
                                                        @csrf
                                                    </form>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('back.lang.edit', $lang->id) }}" class="text-success">
                                                        <i class="fas fa-edit mr-2"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row justify-content-center mt-3">
                                    {{ $langs->links() }}
                                </div>
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
        
        $('.langDelete').on('click', function() {
            console.log($(this).find('form').submit());
        })
        $('.status').on('click',function(){
            let id = $(this).attr('data-id');
            $(`#status_${id}`).submit();
        });
        $('.setDafault').on('click',function(){
            let id = $(this).attr('data-id');
            $(`#setDafault_${id}`).submit();
        });
        
    </script>
@endsection
