<?php


namespace srcker\openssl;


class Token
{


    /**
     * decrypt
     * @param string $data
     * @param string $key
     * @param string $iv
     * @return string
     * @author Sinda
     * @email sinda@srcker.com
     * @time 2019-08-23 05:51
     */
    public static function encrypt($data='',$key= 'vs6zjn4biv1ir7p47feo16q23aawv84m',$iv='1234567890987654')
    {
        return base64_encode(openssl_encrypt($data, 'aes-128-cbc', $key, true, $iv));
    }



    /**
     * decrypt
     * @param string $data
     * @param string $key
     * @param string $iv
     * @return string
     * @author Sinda
     * @email sinda@srcker.com
     * @time 2019-08-23 05:51
     */
    public static function decrypt($data='',$key= 'vs6zjn4biv1ir7p47feo16q23aawv84m',$iv='1234567890987654')
    {
        return openssl_decrypt(base64_decode($data), 'aes-128-cbc', $key, true, $iv);
    }


}