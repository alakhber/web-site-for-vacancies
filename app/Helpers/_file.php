<?php
function _setName($file,$path,$fileName=null){
    if(is_null($file)){
        return response()->json(['operation' => true, 'name' => null], 200);
    }else{
        $fileExtension  = $file->getClientOriginalExtension();
        $newName        = $fileName==null ?  substr(md5(uniqid()), 0, 10) : $fileName;
        $fileNameWitdhExtension = $newName.'.'.$fileExtension;
        return _upload($file,$fileNameWitdhExtension,$path);
    }
}

function _readFile($file){
    $buffer = array();
    if(!file_exists($file)){
        $buffer[] = 'Fayl Mövcud Deyil !';  // use a buffer of 4KB
    }
    $source_file = fopen($file, "r+" ) ;
    while (!feof($source_file)) {
        // $buffer[] = preg_split('/\n|\r\n?/',trim(fread($source_file, 4096)));
        $buffer[] = trim(fread($source_file, 4096));  // use a buffer of 4KB
    }
    return $buffer[0];
}
function _writeFile($file,$text){
    unlink($file);
    $file = fopen($file,'a+');
    fwrite($file,$text);
    fclose($file);
}

function _upload($file,$fileName,$path){
    
    try {
        $filePath = 'public/'. $path ;
        $file->storeAs($filePath, $fileName);
        return response()->json(['operation' => true, 'name' => $path.'/'.$fileName], 200);
    } catch (Exception $e) {
        return response()->json(['operation' => false, 'msg' =>'Xəta !'.$e->getMessage()], 400);
    }

}