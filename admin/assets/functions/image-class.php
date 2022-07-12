<?php
    // Class for storing image types
    class Image {
        public $path;
        public $description; // For when alt text is implemented
        function __construct($path)
        {
            $this->path = $path;
        }
    };
?>