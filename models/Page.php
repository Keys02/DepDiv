<?php
    class Page {
        public string $title = "";
        public string $navigation = "";
        public string $stylesheet = "";
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
            return $this->stylesheet;
        }

        public function getContent() : string {
            return $this->content;
        }

        public function getNavigation() : string {
            return $this->navigation;
        }
        /*############################
        #           Setters
        ##############################*/
        public function setTitle(string $title) : void {
            $this-> title = $title;
        }

        public function setStylesheet(string $stylesheet) : void { 
            $this->stylesheet = $stylesheet;
        }

        public function setContent(string $content) : void {
            $this->content = $content;
        }

        public function appendContent($content) : void {
            if(strpos($content, '<') !== false) {
                $this->content .= $content;
            }
        }

        public function setNavigation($content) {
            $this->navigation = $content;
        }

    }

?>