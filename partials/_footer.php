<?php
/*
    Partial: Will be included in other views before they are rendered, not directly rendered.
*/
    $year = date('Y');

    $footer = 
                "
                                </section>
                                <footer>
                                    <p><small>&copy;</small> DepDiv {$year}. All rights reserved </p>
                                    <p class='author'>Keys🚀</p>
                                </footer>
                                <script src='assets/js/jquery-3.7.1.min.js'></script>
                                <script src='assets/js/summernote-lite.min.js'></script>
                                <script src='assets/js/script.js'></script>
                        </body>
                    </html>
                ";

    // $footer = "
    //             </section>
    //             <footer>
    //                 <p><small>&copy;</small> DepDiv 2025. All rights reserved </p>
    //                 <p class='author'>Keys🚀</p>
    //             </footer>
    //             <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
    // ";

    // $footer = '<script>window.jQuery || document.write("<script src='. 'jquery-3.7.1.min.js'><\/script>")</script>;

    // $footer ="                <script src='assets/js/summernote-lite.min.js'></script>
    //                 <script src='assets/js/script.js'></script>
    //         </body>
    //     </html>
    // "
?>