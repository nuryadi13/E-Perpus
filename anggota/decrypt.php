<?php
$key = "kopi";
function decrypt($src, $key, $is_encode)
{
    $key = strtoupper($key);
    $src = strtoupper($src);
    $dest = '';

    /* strip out non-letters */
    for($i = 0; $i <= strlen($src); $i++) {
        $char = substr($src, $i, 1);
        if(ctype_upper($char)) {
            $dest .= $char;
        }
    }

    for($i = 0; $i <= strlen($dest); $i++) {
        $char = substr($dest, $i, 1);
        if(!ctype_upper($char)) {
            continue;
        }
        $dest = substr_replace($dest,
            chr (
                ord('A') +
                ($is_encode
                ? ord($char) - ord('A') + ord($key[$i % strlen($key)]) - ord('A')
                : ord($char) - ord($key[$i % strlen($key)]) + 26
                ) % 26
            )
        , $i, 1);
    }

    return $dest;
}


// $no_induk = $_POST['no_induk'];
// $nama = $_POST['nama'];
// $username = $_POST['username'];
// $password = $_POST['password'];
// $jk = $_POST['jk'];
// $kelas = $_POST['kelas'];
// $alamat = $_POST['alamat'];
// ?>
