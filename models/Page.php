<?php
    class Page {
        public string $title = "";
        public string $style_sheet = "";
        public string $content = "";

        public function __construct(string $title = "") {
            $this->title = $title;
        }

        /*############################
        #           Getters
        ##############################*/
        public function getTitle() : string {
            return $this->title;
        }

        public function getStyleSheet() : string {
            return $this->style_sheet;
        }

        public function getContent() : string {
            return $this->content;
        }

        /*############################
        #           Getters
        ##############################*/
        public function setTitle(string $title) : void {
            $this-> title = $title;
        }

        public function setStyleSheet(string $style_sheet) : void {
            $this->style_sheet = $style_sheet;
        }

        public function setContent(string $content) : void {
            $this->content = $content;
        }

        public function appendContent(string $content) : void {
            if(strpos($content, '<') !== false) {
                $this->content = $content;
            }
        }

    }

?>