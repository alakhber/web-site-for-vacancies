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
                        <h1 class="m-0">İstifadəçi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="{{ route('back.home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active">{{ $user->fullname }}</li>
                            <li class="breadcrumb-item active"><a href="#">Redaktə</a></li>
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
                        <div class="card card-primary card-outline ">
                            <div class="card-body row el-element-overlay">
                                <div class="col-lg-3  p-4">
                                    <div class="el-card-item p-0" style="width:80%;margin:auto">
                                        <div class="el-card-avatar el-overlay-1">
                                            <img src="{{ _img('storage/'.$user->photo) }}" id="profilImage" alt="user" style="border-radius: 20px" />
                                            <div class="el-overlay">
                                                <ul class="el-info">
                                                    <li><a class="btn default btn-outline" href="javascript:void(0);"><label class="d-inline" for="photo"><i class="fas fa-upload"></i></label></a></li>
                                                    <li><a class="btn default btn-outline reload" href="javascript:void(0);"><i class="fas fa-sync-alt"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 p-4">
                                    <form action="{{ route('back.user.update',$user->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <div class="form-group">
                                            <label class="col-lg-12" for="fullname">Ad Soyad</label>
                                            <div class="col-md-12">
                                                <input type="text" name="fullname" value="{{ $user->fullname }}" class="form-control @error('fullname') is-invalid @enderror" id="fullname" placeholder="Ad Soyad ">
                                                @error('fullname')
                                                    <span id="fullname" class="error invalid-feedback" style="">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-12" for="username">İstifadəçi Adı</label>
                                            <div class="col-md-12">
                                                <input type="text" name="username" value="{{ $user->username }}" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="İstifadəçi Adı ">
                                                @error('username')
                                                    <span id="username" class="error invalid-feedback" style="">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-12" for="email">E-Poçt</label>
                                            <div class="col-md-12">
                                                <input type="text" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="E-Poçt ">
                                                @error('email')
                                                    <span id="email" class="error invalid-feedback" style="">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-12" for="password">Şifrə</label>
                                            <div class="col-md-12">
                                                <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Şifrə ">
                                                @error('password')
                                                    <span id="password" class="error invalid-feedback" style="">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-12" for="password_confirmation">Təkrar Şifrə</label>
                                            <div class="col-md-12">
                                                <input type="password" name="password_confirmation"  class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Təkrar Şifrə ">
                                                @error('password_confirmation')
                                                    <span id="password_confirmation" class="error invalid-feedback" style="">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label for="photo" class="form-label">Şəkil</label>
                                            <div class="custom-file">
                                                <input type="file" name="photo" class="custom-file-input @error('photo') is-invalid @enderror" id="photo">
                                                <label class="custom-file-label" for="photo">Şəkil Seç</label>
                                                @error('photo')
                                                    <span id="photo" class="error invalid-feedback" style="">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-success float-right">
                                                <i class="fas fa-user-edit mr-2"></i>Redaktə Et
                                            </button>
                                        </div>
                                    </form>
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
    <script src="{{ _file('project/admin/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ _file('project/admin/plugins/magnific-popup/jquery.magnific-popup-init.js') }}"></script>
    <script>
        const avatar = document.getElementById('photo');
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
            $('#profilImage').attr('src', '{{ _img('storage/',$user->photo) }}');
            $('#photo').val('');
        });
        $('.deletePhoto').on('click',function(){
            console.log($("#deletePhoto").submit());
        });
    </script>
@endsection
