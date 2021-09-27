@extends('layouts.admin')

@section('_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Seo</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="{{ route('back.home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active">Seo</li>
                            <li class="breadcrumb-item active"><a href="{{ route('back.setting.create') }}">Yeni</a></li>

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
                                            <th>Dil</th>
                                            <th>Title</th>
                                            <th>Keyword</th>
                                            <th>Description</th>
                                            <th style="width: 1%">Emeliyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($settings as $setting)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $setting->language->country }}</td>
                                                <td>{{ _shortText($setting->title,10) }}</td>
                                                <td>{{ _shortText($setting->keyword,10) }}</td>
                                                <td>{{ _shortText($setting->description,10) }}</td>
                                                
                                                <td class="text-center">
                                                    <a href="{{ route('back.setting.edit',$setting->id) }}" class="text-success">
                                                        <i class="fas fa-edit mr-2"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="text-danger settingDelete">
                                                        <i class="fas fa-trash"></i>
                                                        <form action="{{ route('back.setting.delete', $setting->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row justify-content-center mt-3">
                                    {{ $settings->links() }}
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
        
        $('.settingDelete').on('click', function() {
            console.log($(this).find('form').submit());
        })

        
    </script>
@endsection
