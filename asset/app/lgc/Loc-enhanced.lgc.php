<?php

namespace xet;

use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use FilesystemIterator;

class Loc {
    private static $BASE = null, $DIR = null, $DIRx = null,
                   $PATH = null, $PATHx = null, $FILE = null, $FILEx = null;

    private static $cacheFile = null;
    private static $cacheDuration = 4;

    private static function init() {
        if (self::$BASE !== null) {
            return;
        }

        self::$cacheFile = storage_path('framework/cache/data/loc.cache.php');

        if (file_exists(self::$cacheFile) && (time() - filemtime(self::$cacheFile)) < self::$cacheDuration) {
            \Log::info('--loc-cache-used');
            self::loadCache();
        } else {
            self::genArrays();
            self::saveCache();
        }
    }

    private static function loadCache() {
        $data = include self::$cacheFile;
        self::$BASE = $data['BASE'];
        self::$DIR = $data['DIR'];
        self::$DIRx = $data['DIRx'];
        self::$PATH = $data['PATH'];
        self::$PATHx = $data['PATHx'];
        self::$FILE = $data['FILE'];
        self::$FILEx = $data['FILEx'];
    }

    private static function saveCache() {
        $cacheData = [
            'BASE' => self::$BASE,
            'DIR' => self::$DIR,
            'DIRx' => self::$DIRx,
            'PATH' => self::$PATH,
            'PATHx' => self::$PATHx,
            'FILE' => self::$FILE,
            'FILEx' => self::$FILEx,
        ];
        file_put_contents(self::$cacheFile, '<?php return ' . var_export($cacheData, true) . ';');
    }

    private static function genArrays() {
        \Log::info('--loc-regen');

        self::$BASE = [
            'domain' => 'xetindustries.com',
            'root' => base_path(),
            'public' => public_path(),
        ];

        self::$DIR = [
            'lgc'  => '/asset/app/lgc',
            'cntr' => '/asset/app/cntr',
            'inc'  => '/asset/app/inc',
            'modl' => '/asset/app/modl',
            'page' => '/asset/res/page',
            'prtl' => '/asset/res/partial',
            'tmpl' => '/asset/res/tmpl',
            'views'=> '/resources/views',
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

        self::$PATH = array_merge(
            self::$BASE,
            array_map(fn($dir) => self::$BASE['root'] . $dir, self::$DIR),
            array_map(fn($dirx) => self::$BASE['public'] . $dirx, self::$DIRx)
        );

        self::$PATHx = array_merge(
            self::$BASE,
            array_map(fn($dirx) => self::$BASE['public'] . $dirx, self::$DIRx)
        );

        self::$FILE = self::generateFilePaths(self::$DIR, 'blade.php');
        self::$FILEx = self::generateFilePaths(self::$DIRx, 'blade.php');
    }

    private static function generateFilePaths($dirs, $extension) {
        $files = [];
        foreach ($dirs as $key => $dir) {
            $fullPath = self::$BASE['root'] . $dir;
            if (is_dir($fullPath)) {
                $files[$key] = glob("$fullPath/*.$extension");
            }
        }
        return $files;
    }

    public static function path(...$keys) {
        return self::getArray('PATH', $keys);
    }

    public static function file(...$keys) {
        return self::getArray('FILE', $keys);
    }

    private static function getArray($type, $keys) {
        self::init();
        return $keys ? self::arrayGet(self::$$type, $keys) : self::$$type;
    }

    private static function arrayGet($array, $keys) {
        foreach ($keys as $key) {
            if (!isset($array[$key])) return null;
            $array = $array[$key];
        }
        return $array;
    }
}
