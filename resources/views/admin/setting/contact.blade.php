@extends('layouts.admin')
@section('_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Əlaqə</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="{{ route('back.home') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active">Əlaqə</li>
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
                                <form action="{{ route('back.setting.contact.update') }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="phone" class="col-lg-12">Əlaqə Nömrəsi</label>
                                            <div class="col-md-12">
                                                <input type="text" name="phone" value="{{ $contact->phone }}" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="012XXXXXXX ">
                                                @error('phone')
                                                    <span id="phone" class="error invalid-feedback" style="">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="mobil" class="col-lg-12">Mobil Nömrə</label>
                                            <div class="col-md-12">
                                                <input type="text" name="mobil" value="{{ $contact->mobil }}" class="form-control @error('mobil') is-invalid @enderror" id="mobil" placeholder="994XXXXXXXXX  ">
                                                @error('mobil')
                                                    <span id="mobil" class="error invalid-feedback" style="">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="email" class="col-lg-12">E-Poçt</label>
                                            <div class="col-md-12">
                                                <input type="text" name="email" value="{{ $contact->email }}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="E-Poçt ">
                                                @error('email')
                                                    <span id="email" class="error invalid-feedback" style="">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="form-group col-lg-12">
                                            <label for="address" class="col-lg-12">Ünvan</label>
                                            <div class="col-md-12">
                                                <input type="text" name="address" value="{{ $contact->address }}" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Ünvan ">
                                                @error('address')
                                                    <span id="address" class="error invalid-feedback" style="">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="location" class="col-lg-12">Xəritə</label>
                                            <div class="col-md-12">
                                                <input type="text" name="location" value="{{ $contact->location }}" class="form-control @error('location') is-invalid @enderror" id="location" placeholder="Xəritə ">
                                                @error('location')
                                                    <span id="location" class="error invalid-feedback" style="">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-lg-12" id="mapArea">
                                            <iframe src="{{ $contact->map }}" id="map" style="border:0;width:100%;height:300px" allowfullscreen="" loading="lazy"></iframe>
                                        </div> --}}
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save mr-2"></i>Yadda Saxla</button>
                                        {{-- <a href="jacvascript:void(0)" class="btn btn-primary float-right mr-3 showMap"></a> --}}
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
@section('_script')
    <script src="{{ _file('project/admin/dist/js/phonemask.min.js') }}"></script>
    <script>
        $(function() {
            let showMap = false;
            if(!showMap){
                $('#mapArea').hide();
                $('.showMap').html(`Xəritəni Göstər <i class="fas fa-eye"></i>`);
            }else{
                $('#mapArea').show();
                $('.showMap').html('Xəritəni Gizlət <i class="fas fa-eye-slash"></i>');
            }
            $('.showMap').on('click',function(){
                if(showMap){
                    showMap = false;
                    $('#mapArea').hide(800);
                $('.showMap').html(`Xəritəni Göstər <i class="fas fa-eye"></i>`);

                }else{
                    showMap = true;
                    $('#mapArea').show(800);
                $('.showMap').html('Xəritəni Gizlət <i class="fas fa-eye-slash"></i>');

                }
            });

            $.mask.definitions['~'] = "[+-]";
            $("#phone").mask("012xxxxxxx", {
                autoclear: false
            });
            $("#mobil").mask("994xxxxxxxxx", {
                autoclear: false
            });

            // $("#phoneAutoclearFalse").mask("(999) 999-9999", {
            //     autoclear: false,
            //     completed: function() {
            //         alert("completed autoclear!");
            //     }
            // });
            // $("#phoneExtAutoclearFalse").mask("(999) 999-9999? x99999", {
            //     autoclear: false
            // });

            // $("input").blur(function() {
            //     $("#info").html("Unmasked value: " + $(this).mask());
            // }).dblclick(function() {
            //     $(this).unmask();
            // });
        });
    </script>
    <script>
        const loca = document.getElementById('location');
        loca.addEventListener('keyup', function(e) {
            if (typeof e.target.value.match(/src="(.*?)"/)[1] == undefined) {
                document.getElementById('map').setAttribute('src', '{{ $contact->map }}');
            } else {
                document.getElementById('map').setAttribute('src', e.target.value.match(/src="(.*?)"/)[1])
            }
        });
    </script>
@endsection
