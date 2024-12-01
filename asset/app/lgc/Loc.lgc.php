<?php

namespace xet;

use \RecursiveIteratorIterator;
use \RecursiveDirectoryIterator;
use \FilesystemIterator;

class Loc {
    private static $BASE = null, $DIR = null, $DIRx = null, 
    $PATH = null, $PATHx = null, $FILE = null, $FILEx = null,
    $cache = 1,
    $cacheDurn = 4,
    $cacheFile = null,
    $cacheLoc = 0;


    // Method to initialize arrays
    private static function init()
    {
        self::$cacheFile = storage_path('framework/cache/data/loc.cache.php');
        
        // if ( (self::$cacheLoc && file_exists(self::$cacheFile)) ||
        if( (self::$cache && file_exists(self::$cacheFile) && (time() - filemtime(self::$cacheFile)) < self::$cacheDurn) ) {
            // \Log::info('--loc-cache-used');
            $data = include self::$cacheFile;
            self::$BASE = $data['BASE'];
            self::$DIR = $data['DIR'];
            self::$DIRx = $data['DIRx'];
            self::$PATH = $data['PATH'];
            self::$PATHx = $data['PATHx'];
            self::$FILE = $data['FILE'];
            self::$FILEx = $data['FILEx'];
            return;
        }

        self::genArrays();

        // Save arrays to the cache file
        $cacheAble = [
            'BASE' => self::$BASE,
            'DIR' => self::$DIR,
            'DIRx' => self::$DIRx,
            'PATH' => self::$PATH,
            'PATHx' => self::$PATHx,
            'FILE' => self::$FILE,
            'FILEx' => self::$FILEx,
        ];
        
        file_put_contents(self::$cacheFile, '<?php return ' . var_export($cacheAble, true) . ';');
    }

    private static function genArrays() {
        \Log::info('--loc-regen');

        self::$BASE = [
            'domain' => 'xetindustries.com',
            'root' => base_path(),
            'public' => public_path(),
        ];
        // self::$BASE['public'] = self::$BASE['root'] . '/public';

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

        // -init arrays - Begin
        self::$PATH = array_merge(
            self::$BASE,
            array_map(fn($dir) => self::$BASE['root'] . $dir, self::$DIR),
            array_map(fn($DIRx) => self::$BASE['public'] . $DIRx, self::$DIRx)
        );

        self::$PATHx = array_merge(
            self::$BASE,
            array_map(fn($DIRx) => self::$BASE['public'] . $DIRx, self::$DIRx)
        );

        self::$FILEx = [
            'PAGE'  => self::genFilePath(self::$PATH['pagex'], 'blade.php', 'URL'),
            'CSS'   => self::genFilePath(self::$PATH['cssx'], 'css', 'URL'),
            'JS'    => self::genFilePath(self::$PATH['jsx'], 'js', 'URL'),
            'BRAND' => self::genFilePath(self::$PATH['brand'], 'svg', 'URL')
        ];
        
        self::$FILE = [
            'LGC'   => self::genFilePath(self::$PATH['lgc'], 'lgc.php'),
            'CNTR'  => self::genFilePath(self::$PATH['cntr'], 'cntr.php'),
            'INC'   => self::genFilePath(self::$PATH['inc'], 'inc.php'),
            'MODL'  => self::genFilePath(self::$PATH['modl'], 'modl.php'),
            'PAGE'  => self::genFilePath([self::$PATH['page'], self::$PATH['views'], self::$PATH['pagex']], 'blade.php'),
            'PAGEx' => self::genFilePath(self::$PATH['pagex'], 'blade.php'),
            'TMPL'  => self::genFilePath(self::$PATH['tmpl'], 'tmpl.php'),
            'PRTL'  => self::genFilePath(self::$PATH['prtl'], 'prtl.php'),
            'CSS'   => self::genFilePath([self::$PATH['css'], self::$PATH['cssx'], self::$PATH['prtl']], 'prtl.css'),
            'CSSx'  => self::genFilePath(self::$PATH['cssx'], 'css'),
            'JS'    => self::genFilePath([self::$PATH['js'], self::$PATH['jsx']], 'js'),
            'JSx'   => self::genFilePath(self::$PATH['jsx'], 'js'),
            'BRAND' => self::genFilePath(self::$PATH['brand'], 'svg')
        ];
    }

    //-functions available 
    public static function path(...$keys) {
        return self::getArray('PATH', $keys);
    }
    public static function pathUrl(...$keys) {
        return self::getArray('PATHx', $keys);
    }
    public static function file(...$keys) {
        return self::getArray('FILE', $keys);
    }
    public static function fileUrl(...$keys) {
        return self::getArray('FILEx', $keys);
    }


    public static function fileo(...$keys) {
        readfile( self::getArray('FILE', $keys));
    }
    public static function filei(...$keys) {
        include self::getArray('FILE', $keys);
    }
    public static function fileio(...$keys) {
        include_once self::getArray('FILE', $keys);
    }
    public static function filer(...$keys) {
        require self::getArray('FILE', $keys);
    }
    public static function filero(...$keys) {
        require_once self::getArray('FILE', $keys);
    }


    // Static method to dynamically access arrays
    private static function getArray($type, $keys)
    {
        if (self::$BASE === null) self::init();
        return $keys ? self::arrayGet(self::$$type, $keys) : self::$$type;
    }

    // Helper method to traverse arrays
    private static function arrayGet($array, $keys) {
        foreach ($keys as $key) {
            if (!isset($array[$key])) return null;
            $array = $array[$key];
        }
        return $array;
    }
    
    
    // -Helper method to generate file paths
    private static function _genFilePath($files, $fileExtension, $isUrl = false) {
        $fileArray = [];
        foreach ($files as $file) {
            $key = basename($file, ".$fileExtension");
            $fileArray[$key] = $isUrl ? '/' . ltrim(str_replace([self::$PATH['public'], self::$PATH['root']], '', $file), '/') : $file;
        }
        return $fileArray;
    }

    private static function genFilePath($dirs, $fileExtension, $type = 'PATH') {
        $dirs = (array) $dirs;
        $files = [];

        foreach ($dirs as $dir) {
            if (!is_dir($dir)) { continue; }
            
            $files = array_merge($files, glob("$dir/*.$fileExtension"));
            $subdirs = array_merge(
                glob("$dir/*", GLOB_ONLYDIR),
                glob("$dir/*/*", GLOB_ONLYDIR)
            );

            foreach ($subdirs as $subdir) {
                if (basename($subdir)[0] === '.' || !is_dir($subdir)) { continue; }
                
                $subdirFiles = glob("$subdir/*.$fileExtension");
                $subdirFiles = array_filter($subdirFiles, function ($file) {
                    return basename($file)[0] !== '.';
                });
                
                // $files = array_merge($files, glob("$subdir/*.$fileExtension"));
                $files = array_merge($files, $subdirFiles);
            }
        }

        return self::_genFilePath($files, $fileExtension, $type === 'URL');
    }


}
