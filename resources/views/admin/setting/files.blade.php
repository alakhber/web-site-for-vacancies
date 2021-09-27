@extends('layouts.admin')
@section('_style')
    <link rel="stylesheet" href="{{ _file('project/admin/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ _file('project/admin/plugins/magnific-popup/user-card.css') }}">
@endsection
@section('_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tənzimləmələr</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="{{ route('back.home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active">Fayllar</li>
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
                                <div class="row">
                                    <div class="col-2">
                                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="vert-tabs-logo-tab" data-toggle="pill" href="#vert-tabs-logo" role="tab" aria-controls="vert-tabs-logo" aria-selected="true">Logo</a>
                                            <a class="nav-link " id="vert-tabs-robot-tab" data-toggle="pill" href="#vert-tabs-robot" role="tab" aria-controls="vert-tabs-robot" aria-selected="true">Robot</a>
                                            <a class="nav-link " id="vert-tabs-sitemap-tab" data-toggle="pill" href="#vert-tabs-sitemap" role="tab" aria-controls="vert-tabs-sitemap" aria-selected="true">Sitemap</a>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="tab-content" id="vert-tabs-tabContent">
                                            <div class="tab-pane text-left fade show active" id="vert-tabs-logo" role="tabpanel" aria-labelledby="vert-tabs-logo-tab">
                                                <form action="{{ route('back.setting.logo') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-4 el-element-overlay">
                                                            <div class="el-card-item p-0" style="width:80%;margin:auto">
                                                                <div class="el-card-avatar el-overlay-1">
                                                                    <img src="{{ _img('storage/'.$logo) }}" id="profilImage" alt="user" style="border-radius: 20px;width:100%" />
                                                                    <div class="el-overlay">
                                                                        <ul class="el-info">
                                                                            <li><a class="btn default btn-outline" href="javascript:void(0);"><label class="d-inline" for="logo"><i class="fas fa-upload"></i></label></a></li>
                                                                            <li><a class="btn default btn-outline reload" href="javascript:void(0);"><i class="fas fa-sync-alt"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="col-lg-12 mb-3">
                                                                <div class="custom-file">
                                                                    <input type="file" name="logo" class="custom-file-input @error('logo') is-invalid @enderror" id="logo">
                                                                    <label class="custom-file-label" for="logo">Şəkil Seç</label>
                                                                    @error('logo')
                                                                        <span id="logo" class="error invalid-feedback" style="">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <button type="submit" class="btn btn-success float-right">Yadda Saxla</button>
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="tab-pane text-left fade show " id="vert-tabs-robot" role="tabpanel" aria-labelledby="vert-tabs-robot-tab">
                                                <form action="{{ route('back.setting.robot') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-lg-12 mb-3">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <textarea id="robot" name='robot' class="form-control" style="height: 150px">{{ $robot }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <button type="submit" class="btn btn-success float-right">Yadda Saxla</button>
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="tab-pane text-left fade show " id="vert-tabs-sitemap" role="tabpanel" aria-labelledby="vert-tabs-sitemap-tab">
                                                <form action="{{ route('back.setting.sitemap') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-lg-12 mb-3">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <textarea id="sitemap" name='sitemap' class="form-control" style="height: 150px">{{ $sitemap }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <button type="submit" class="btn btn-success float-right">Yadda Saxla</button>
                                                    </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
@section('_script')
    <script src="{{ _file('project/admin/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ _file('project/admin/plugins/magnific-popup/jquery.magnific-popup-init.js') }}"></script>
    <script>
        const avatar = document.getElementById('logo');
        avatar.addEventListener('change', function() {
            [...this.files].map(file => {
                if (file.name.match(/\.jp?g|png|gif|webp|svg/)) {
                    const reader = new FileReader();
                    reader.addEventListener('load', function() {
                        let imgSrc = this.result;
                        $('#profilImage').attr('src', imgSrc);
                        // console.log(this);
                    })
                    reader.readAsDataURL(file)
                }
            })
        });
        $('.reload').on('click', function() {
            $('#profilImage').attr('src', '{{ _img('logo.png') }}');
            $('#photo').val('');
        });
    </script>
@endsection
