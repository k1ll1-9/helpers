<?php
declare(strict_types=1);

namespace K11\Classes;


/**
 * Class FileSystem
 * @package K1ll1\Lib\Classes
 */
class FileSystem
{
    /**
     * @param string $path
     * @return bool|null
     */
    public static function deleteDirRecursively(string $path): ?bool
    {
        if (empty($path)) {
            return false;
        }
        return \is_file($path) ?
            @\unlink($path) :
            \array_map(__METHOD__, \glob($path . '/*')) == @rmdir($path);
    }
}