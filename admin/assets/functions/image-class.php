<?php
    // Class for storing image types
    class Image {
        public $name;
        public $description; // For when alt text is implemented
        function __construct($name)
        {
            $this->name = $name;
        }
    };
?>