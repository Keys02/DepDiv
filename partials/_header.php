<?php
/*
    Partial: Will be included in other views before they are rendered, not directly rendered.
*/
    $header = 
                "
                    <!DOCTYPE html>
                    <html lang='en-US'>
                        <head>
                            <meta charset='UTF-8'>
                            <meta name='description' content='Blog site'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0 shrink-to-fit=no'>
                            <title>{$page->getTitle()}</title>
                            <link rel='stylesheet' type='text/css' href='css/blog.css'>
                            {$page->getStylesheet()}
                        </head>
                        <body>
                "
?>