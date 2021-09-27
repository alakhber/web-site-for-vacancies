<?php
function _img($image)
{
    if (file_exists($image) && is_file($image)) {
        $ext = pathinfo($image)['extension'];

        return "data:image/" . $ext . ";base64," . base64_encode(file_get_contents($image));
    } else {
        $image = 'img/default.png';
        $ext = pathinfo($image)['extension'];

        return "data:image/" . $ext . ";base64," . base64_encode(file_get_contents($image));
    }
}

function  _file($file)
{
    return _asset($file);
}

function _linkCheck($route, $class = 'active')
{
    return  request()->is('admin/' . $route) ? $class : null;
}

function _alert($message = null, $errorType = null, $show = false)
{
    if (!$show) {
        if (session()->has('success')) {
            return "
                <script type='text/javascript'>
                $(function(){
                        Swal.fire(
                        'Ugurlu Emeliyat!',
                        '" . session()->get('success') . "',
                        'success'
                        )    
                    });
                </script>";
        }
        if (session()->has('error')) {
            return "
                <script type='text/javascript'>
                $(function(){
                        Swal.fire(
                        'Ugursuz Emeliyat!',
                        '" . session()->get('error') . "',
                        'error'
                        )    
                    });
                </script>";
        }
    } else {
        return "
            <script type='text/javascript'>
            $(function(){
                    Swal.fire(
                    'Xəta !',
                    '" . $message . "',
                    '" . $errorType . "'
                    )    
                });
            </script>";
    }
}
function _swalAlert($message , $errorType )
{
    return "
    Swal.fire(
        'Xəta !',
        '" . $message . "',
        '" . $errorType . "'
        )
    ";
}


function _stsCheck($operation, $url = null)
{
    if (is_null($url)) {
        return $operation->getData()->operation ? redirect()->back()->with('success', $operation->getData()->msg)
            : redirect()->back()->with('error', $operation->getData()->msg);
    } else {
        return $operation->getData()->operation ? redirect()->route($url)->with('success', $operation->getData()->msg)
            : redirect()->route($url)->with('error', $operation->getData()->msg);
    }
}
