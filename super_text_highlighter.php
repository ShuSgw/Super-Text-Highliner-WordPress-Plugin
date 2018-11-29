<?php
/*
Plugin Name: Super Text Highlighter
Description: For highlighting texts that are searched.
Author: Shuhei Shagawa
Author URI: http://shuhei-shagawa.com
Description: My portfolio-site
Version: 1.0
*/

class Text_Highligher
{
    public function __construct()
    {
        add_filter('the_title', array($this, 'highlight_text'));
        add_filter('the_content', array($this, 'highlight_text'));
        add_filter('the_excerpt', array($this, 'highlight_text'));
    }

    public function highlight_text($text)
    {
        if (is_search()) {
            $string = get_query_var('s');
            $text = preg_replace('/'.$string.'/', '<span style="background-color:yellow;">'.$string.'</span>', $text);
        }

        return $text;
    }
}

$myfunc = new Text_Highligher();
