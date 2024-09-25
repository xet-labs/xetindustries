<?php

namespace xet;

class Loc {
    private static $BASE = null, $DIR = null, $DIRx = null, $PATH = null, $PATHx = null, $FILE = null, $FILEx = null;


    // Method to initialize arrays
    private static function init() {
        if (self::$BASE === null) {
            self::$BASE = [
                'domain' => 'xetindustries.com',
                'root'   => realpath(__DIR__ . '/../../..'),
            ];

            self::$BASE['public'] = self::$BASE['root'] . '/public';

            self::$DIR = [
                'cls'  => '/asset/app/cls',
                'cntr' => '/asset/app/cntr',
                'inc'  => '/asset/app/inc',
                'modl' => '/asset/app/modl',
                'page' => '/asset/res/view/page',
                'tmpl' => '/asset/res/view/tmpl',
                'prtl' => '/asset/res/view/partial',
                'css'  => '/asset/res/css',
                'js'   => '/asset/res/js',
            ];

            self::$DIRx = [
                'pagex' => '/page',
                'incx'  => '/res/inc',
                'cssx'  => '/res/css',
                'jsx'   => '/res/js',
                'libx'  => '/res/lib',
                'brand' => '/res/static/brand',
            ];

            // Initialize $PATH and $FILE arrays
            self::$PATH = array_merge(
                self::$BASE,
                array_map(fn($dir) => self::$BASE['root'] . $dir, self::$DIR),
                array_map(fn($DIRx) => self::$BASE['public'] . $DIRx, self::$DIRx)
            );

            self::$PATHx = array_merge(
                self::$BASE,
                array_map(fn($DIRx) => self::$BASE['public'] . $DIRx, self::$DIRx)
            );

            self::$FILE = [
                'CLS'   => self::genFilePath('PATH', self::$PATH['cls'], 'cls.php'),
                'CNTR'  => self::genFilePath('PATH', self::$PATH['cntr'], 'cntr.php'),
                'INC'   => self::genFilePath('PATH', self::$PATH['inc'], 'inc.php'),
                'MODL'  => self::genFilePath('PATH', self::$PATH['modl'], 'modl.php'),
                'PAGE'  => self::genFilePath('PATH', [self::$PATH['page'], self::$PATH['pagex']], 'page.php'),
                'PAGEx' => self::genFilePath('PATH', self::$PATH['pagex'], 'page.php'),
                'TMPL'  => self::genFilePath('PATH', self::$PATH['tmpl'], 'tmpl.php'),
                'PRTL'  => self::genFilePath('PATH', self::$PATH['prtl'], 'prtl.php'),
                'CSS'   => self::genFilePath('PATH', [self::$PATH['css'], self::$PATH['cssx'], self::$PATH['prtl']], 'prtl.css'),
                'CSSx'  => self::genFilePath('PATH', self::$PATH['cssx'], 'prtl.css'),
                'JS'    => self::genFilePath('PATH', [self::$PATH['js'], self::$PATH['jsx']], 'js'),
                'JSx'   => self::genFilePath('PATH', [self::$PATH['js'], self::$PATH['jsx']], 'js'),
                'BRAND' => self::genFilePath('PATH', self::$PATH['brand'], 'svg')
            ];
            self::$FILEx = [
                'PAGE'  => self::genFilePath('PATH', self::$PATH['pagex'], 'page.php'),
                'CSS'   => self::genFilePath('PATH', self::$PATH['cssx'], 'css'),
                'JS'   => self::genFilePath('PATH', self::$PATH['jsx'], 'js'),
                'BRAND' => self::genFilePath('PATH', self::$PATH['brand'], 'svg')
            ];
        }
    }
    public static function get(...$keys) {
        self::init(); // Ensure arrays are initialized

        $rootKey = array_shift($keys); // First key is the root array name (e.g., 'FILE', 'PATH')
        
        if (isset(self::$$rootKey)) {
            return self::arrayGet(self::$$rootKey, $keys); // Traverse the array
        }

        return null; // Root key doesn't exist
    }
    // Dynamic access method for 'path', 'pathx', 'file', 'filex'
    public static function path(...$keys) {
        return self::getArray('PATH', $keys);
    }

    public static function pathx(...$keys) {
        return self::getArray('PATHx', $keys);
    }

    public static function file(...$keys) {
        return self::getArray('FILE', $keys);
    }

    public static function filex(...$keys) {
        return self::getArray('FILEx', $keys);
    }

    // Static method to dynamically access arrays
    private static function getArray($type, $keys) {
        self::init();
        if (empty($keys) || (count($keys) == 1 && $keys[0] === '')) {
            return self::$$type; // Return the entire array if no key is passed
        }
        return self::arrayGet(self::$$type, $keys);
    }

    // Helper method to traverse arrays
    private static function arrayGet($array, $keys) {
        foreach ($keys as $key) {
            if (isset($array[$key])) {
                $array = $array[$key];
            } else {
                return null; // Key doesn't exist
            }
        }
        return $array;
    }

    // Helper for generating file paths
    private static function genFilePath($type, $dirs, $fileExtension) {
        $dirs = (array) $dirs;
        $files = [];

        foreach ($dirs as $dir) {
            if (!is_dir($dir)) continue;
            $files = array_merge($files, glob("$dir/*.$fileExtension"));
            $subdirs = array_merge(
                glob("$dir/*.d", GLOB_ONLYDIR),
                glob("$dir/*/*.d", GLOB_ONLYDIR)
            );
            foreach ($subdirs as $subdir) {
                $files = array_merge($files, glob("$subdir/*.$fileExtension"));
            }
        }

        return self::_genFilePath($files, $fileExtension);
    }

    // Access file directly by filename
    public static function thefile($filename) {
        return self::getFileFromPaths(self::$FILE, $filename);
    }

    public static function filexByName($filename) {
        return self::getFileFromPaths(self::$FILEx, $filename);
    }


    private static function _genFilePath($files, $fileExtension, $isUrl = false) {
        $fileArray = [];
        foreach ($files as $file) {
            $key = basename($file, ".$fileExtension");
            $fileArray[$key] = $isUrl ? '/' . ltrim(str_replace([self::$PATH['public'], self::$BASE['root']], '', $file), '/') : $file;
        }
        return $fileArray;
    }
    private static function getFileFromPaths($array, $filename) {
        foreach ($array as $files) {
            if (isset($files[$filename])) {
                return $files[$filename];
            }
        }
        return null;
    }
}
