jQuery(function($) {
    try {
        if (window.matchMedia('(-webkit-min-device-pixel-ratio: 2), (min-device-pixel-ratio: 2)').matches) {
            // Auto-retina-ize images that haven't been autoRetina'd yet
            $('.autoRetina').each(function(i, e) {
                var orig_src = $(e).attr('src');
                var new_src = orig_src.replace(/^(?!.*?@2x\.)(.*?)\.(png|jpe?g|gif)$/i, '$1@2x.$2');
                $(e).attr('src', new_src);
            });
            
            // Set a cookie to tell the server we want Retina, Please!
            
            var expires = new Date();
            expires.setDate(expires.getDate() + 100);
            document.cookie = 'RP=YES; expires=' + expires.toGMTString() + '; path=/';
        }
    } catch (e) {}
});
