<?php

class KKRP {

    static public $printed_js = false;
    
    // Supply base to point the browser to the "retinaplease.js" file (optimally,
    // 'retinaplease.min.js', to save those extra bytes)
    static function js($base = null) {
        // We only want to execute this once
        if (self::$printed_js) { return ; }
        if (empty($base)) {
            echo '<script type="text/javascript">';
            include dirname(__FILE__) . '/retinaplease.min.js';
            echo '</script>';
        } else {
            echo "<script type=\"text/javascript\" src=\"{$base}/retinaplease.min.js\"></script>";
        }
        self::$printed_js = true;
    }
    
    static function src($src, $echo = true) {
        $out = '';
        if (!empty($_COOKIE['RP']) && $_COOKIE['RP'] == 'YES') {
            // Our cookie says that we should serve the Retina version.
            $out = preg_replace('/^(.*?)(@2x)?\.(png|jpe?g|gif)$/i', '$1@2x.$3', $src);
        } else {
            // We don't know any better, so we'll serve the plain one. Next time, hopefully
            // the JavaScript will leave us a nice little cookie.
            $out = $src;
        }
        if ($echo) {
            echo $out;
        } else {
            return $out;
        }
    }
    
    static function img($src, $opts = array(), $echo = true) {
        $src = self::src($src, false);
        $opts = array_merge_recursive($opts, array(
            'src' => $src,
            'class' => array(
                'autoRetina'
            )
        ));
        $out = "<img ";
        foreach ($opts as $attribute => $value) {
            $out .= "{$attribute}=\"";
            if (is_array($value)) {
                $value = implode(' ', $value);
            }
            $out .= htmlspecialchars($value);
            $out .= "\" ";
        }
        $out .= "/>";
        if ($echo) {
            echo $out;
        } else {
            return $out;
        }
    }
    
    
}

register_shutdown_function('KKRP::js');
