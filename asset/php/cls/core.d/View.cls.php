<?php
class View {
    private $baseDir;
    private $cntFile;
    private $cntFilePath;
    
    public function __construct($baseDir=null, $cntFile=null) {
        $this->baseDir = $baseDir ?? dirname(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0]['file']);
        $this->cntFile = $cntFile ?? 'content.php';
    }
    
    // Get the path of the content.php file in the current directory
    public function getCntPath() {
        $this->cntFilePath = $this->baseDir . '/' . $this->cntFile;
        if (file_exists($this->cntFilePath)) {
            return $this->cntFilePath;
        } else {
            throw new Exception("Content file not found: $this->cntFilePath");
        }
    }

    public function getCnt() {
        $this->cntFilePath = $this->baseDir . '/' . $this->cntFile;
        if (file_exists($this->cntFilePath)) {
            return readfile($this->cntFilePath);
        } else {
            throw new Exception("Content file not found: $this->cntFilePath");
        }
    }
    
    // Function to handle _tmpls, navigation, etc.
    public function getTmpl($_tmpl = null, $_page = null) {
        global $FILE, $page, $cntPath;

        $tmpl = $_tmpl ?? 'page';
        $page = $_page ?? $page;
        $cntPath = $this->cntFilePath;
    
        // Check if the template exists in the $FILE['TMPL'] array
        if (isset($FILE['TMPL'][$tmpl])) {
            include_once($FILE['TMPL'][$tmpl]);

        } else {
            throw new Exception("Template file not found: $tmpl");
        }
    }
    
}
?>
