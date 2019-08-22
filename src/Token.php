<?php
namespace srcker;


class Token {


    /**
     * encrypt
     * @param string $data 加密数据
     * @param string $key 加密key
     * @param int $expire 过期时间（秒）0为永久
     * @return mixed
     * @author Sinda
     * @email sinda@srcker.com
     * @time 2019-08-23 05:35
     */
    public static function encrypt($data='', $key='', $expire=0) {
        $expire = sprintf('%010d', $expire ? $expire + time():0);
        $key    = md5($key);
        $data   = base64_encode($expire.$data);
        $x      = 0;
        $len    = strlen($data);
        $l      = strlen($key);
        $char   = $str    =   '';

        for ($i = 0; $i < $len; $i++) {
            if ($x == $l) $x = 0;
            $char .= substr($key, $x, 1);
            $x++;
        }

        for ($i = 0; $i < $len; $i++) {
            $str .= chr(ord(substr($data, $i, 1)) + (ord(substr($char, $i, 1)))%256);
        }
        return str_replace(array('+','/','='),array('-','_',''),base64_encode($str));
    }


    /**
     * decrypt
     * @param string $data
     * @param string $key
     * @return bool|mixed|string|string
     * @author Sinda
     * @email sinda@srcker.com
     * @time 2019-08-23 05:36
     */
    public static function decrypt($data='', $key='') {
        $key    = md5($key);
        $data   = str_replace(array('-','_'),array('+','/'),$data);
        $mod4   = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        $data   = base64_decode($data);

        $x      = 0;
        $len    = strlen($data);
        $l      = strlen($key);
        $char   = $str = '';

        for ($i = 0; $i < $len; $i++) {
            if ($x == $l) $x = 0;
            $char .= substr($key, $x, 1);
            $x++;
        }

        for ($i = 0; $i < $len; $i++) {
            if (ord(substr($data, $i, 1))<ord(substr($char, $i, 1))) {
                $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
            }else{
                $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
            }
        }
        $data   = base64_decode($str);
        $expire = substr($data,0,10);
        if($expire > 0 && $expire < time()) {
            return '';
        }
        $data   = substr($data,10);
        return $data;
    }


}