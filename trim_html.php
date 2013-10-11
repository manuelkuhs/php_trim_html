function trim_html($str,$trim_str,$html=true) {
    // if $trim_str is an array, such as '("br", "blockquote")', build regex component
    if (is_array($trim_str)) {
        foreach ($trim_str as $el) {
            if (!isset($i)) {
                $trim_strs = "(" . $el;
                $i = 1;
            }
            else {
                $trim_strs = $trim_strs . "|" . $el;
            }
        }
        $trim_strs = $trim_strs . ")";
    }
    else {
        $trim_strs = $trim_str;
    }
    
    // begin trimming
    if ($html) {
        $str = preg_replace('/((\s*<\/*\s*' . $trim_strs. '\s*\/*\s*>\s*)+\z)|(\A(\s*<\/*\s*' . $trim_strs. '\s*\/*\s*>\s*)+)/im' , '' , $str);
    } 
    // set $html to false to only trim exactly $trim_str (i.e. won't apply any "<", "/>" etc.) Thus you can trim any regex - e.g. 
    // setting $html false and $trim_str to "[a-z]" will trim all alphabetical characters
    else {
        $str = preg_replace('/(\A\s*' . $trim_strs . '+\s*)|(\s*' . $trim_strs . '+\s*\z)/im' , '' , $str);
    }
    return $str;
}
