function trim_html($str,$trim_str,$html=true) {
    if ($html) {
        $str = preg_replace('/((\s*<\/*\s*br\s*\/*\s*>\s*)+\z)|(\A(\s*<\/*\s*br\s*\/*\s*>\s*)+)/i' , '' , $str);
    } 
    // set $html to false to only trim exactly $trim_str (i.e. won't apply any "<", "/>" etc.) 
    // Thus you can trim any regex - e.g. 
    // setting $html false and $trim_str to "[a-z]" will trim all alphabetical characters
    else {
        $str = preg_replace('/(\A\s*$trim_str+\s*)|(\s*$trim_str+\s*\z)/i' , '' , $str);
    }
    return $str;
}
