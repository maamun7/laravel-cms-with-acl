<?php
/**
 * Created by PhpStorm.
 * user: MAMUN AHMED
 * Date: 25-Aug-15
 * Time: 12:50 AM
 */

//To create new auto load file must be register to composer.json file
//And then RUN THIS COMMAND From Command prompt : composer dump-autoload

if (!function_exists('get_logged_user_id')) {
    /**
     * Helper to return the current login user id
     *
     * @return mixed
     */
    function get_logged_user_id()
    {
        if (Auth::user()) {
            $user_session = Auth::user();
            return $user_session->id;
        }
    }
}

if (!function_exists('get_logged_user_name')) {
    /**
     * Helper to return the current login user id
     *
     * @return mixed
     */
    function get_logged_user_name()
    {
        if (Auth::user()) {
            $user_session = Auth::user();
            return $user_session->first_name." ".$user_session->last_name;
        }
    }
}

if (!function_exists('get_logged_user_email')) {
    /**
     * Helper to return the current login user id
     *
     * @return mixed
     */
    function get_logged_user_email()
    {
        if (Auth::user()) {
            $user_session = Auth::user();
            return $user_session->email;
        }
    }
}

/**
 * Backend menu active
 * @param $path
 * @param string $active
 * @return string
 */
if (!function_exists('setActive')) {
    function setActive($path, $active = 'active')
    {

        if (is_array($path)) {

            foreach ($path as $k => $v) {
                $path[$k] = $v;
            }
        } else {
            $path = $path;
        }

        return call_user_func_array('Request::is', (array)$path) ? $active : '';
    }
}

if (!function_exists('get_ck_finder')) {
    function get_ck_finder($name)
    {

        $path = asset('/') . 'backend/plugins/ckfinder/';
        return
            '<script type="text/javascript">' .
            'var editor = CKEDITOR.replace( \'' . $name . '\', {' .
            'filebrowserBrowseUrl : \'' . $path . 'ckfinder.html\',' .
            'filebrowserBrowseUrl : \'' . $path . 'ckfinder.html\',' .
            'filebrowserImageBrowseUrl : \'' . $path . 'ckfinder.html?type=Images\',' .
            'filebrowserFlashBrowseUrl : \'' . $path . 'ckfinder.html?type=Flash\',' .
            'filebrowserUploadUrl : \'' . $path . 'core/connector/php/connector.php?command=QuickUpload&type=Files\',' .
            'filebrowserImageUploadUrl : \'' . $path . 'core/connector/php/connector.php?command=QuickUpload&type=Images\',' .
            'filebrowserFlashUploadUrl : \'' . $path . 'core/connector/php/connector.php?command=QuickUpload&type=Flash\'' .
            '});' .
            'CKFinder.setupCKEditor( editor, \'../\' );' .
            '</script>';
    }
}


if (!function_exists('getVideoPlayingDuration')) {
    function getVideoPlayingDuration($file_with_path)
    {
        if (file_exists($file_with_path)){
            $getID3 = new getID3;
            $file = $getID3->analyze($file_with_path);
            $duration = $file['playtime_string']."Min";;
            return $duration;
        }
        else {
            return false;
        }
    }
}


if (!function_exists('getVideoResolution')) {
    function getVideoResolution($file_with_path)
    {
        if (file_exists($file_with_path)){
            $getID3 = new getID3;
            $file = $getID3->analyze($file_with_path);
            $resolution = $file['video']['resolution_x']."x".$file['video']['resolution_y'];
            return $resolution;
        }
        else {
            return false;
        }
    }
}


if (!function_exists('getVideoFileSize')) {
    function getVideoFileSize($file_with_path)
    {
        if (file_exists($file_with_path)){
            $getID3 = new getID3;
            $file = $getID3->analyze($file_with_path);
            $filesize_byte = $file['filesize']; //Byte
            $filesize_kb = $filesize_byte/1024;//Kilobyte
            $filesize_mb = $filesize_kb/1024;//Megabyte
            if ($filesize_mb >= 1024) {
                return round($filesize_mb/1024,2)." GB"; //Gigabyte
            }
            return round($filesize_mb,2)." MB";
        } else {
            return false;
        }
    }
}
