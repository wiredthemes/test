jQuery(document).ready(function($) {

    // Color Scheme Options - These array names should match
    // the values in color_scheme of options.php

    var lightgrey = new Array();
    lightgrey['primary_color']='#efefef';
    lightgrey['pricing_box_color']='#efefef';
    lightgrey['image_gradient_top_color']='#efefef';
    lightgrey['image_gradient_bottom_color']='#efefef';
    lightgrey['button_gradient_top_color']='#f9f9f9';
    lightgrey['button_gradient_bottom_color']='#f1f1f1';
    lightgrey['button_gradient_text_color']='#545454';
    lightgrey['button_text_highlight_color']='#ffffff';
    lightgrey['button_border_color']='#dedede';

    var darkgrey = new Array();
    darkgrey['primary_color']='#aeaeae';
    darkgrey['pricing_box_color']='#aeaeae';
    darkgrey['image_gradient_top_color']='#aeaeae';
    darkgrey['image_gradient_bottom_color']='#aeaeae';
    darkgrey['button_gradient_top_color']='#c9c9c9';
    darkgrey['button_gradient_bottom_color']='#b0b0b0';
    darkgrey['button_gradient_text_color']='#555555';
    darkgrey['button_text_highlight_color']='#d3d3d3';
    darkgrey['button_border_color']='#b5b5b5';

    var red = new Array();
    red['primary_color']='#f52b43';
    red['pricing_box_color']='#f52b43';
    red['image_gradient_top_color']='#f52b43';
    red['image_gradient_bottom_color']='#f52b43';
    red['button_gradient_top_color']='#f88197';
    red['button_gradient_bottom_color']='#f66779';
    red['button_gradient_text_color']='#913540';
    red['button_text_highlight_color']='#fc96a3';
    red['button_border_color']='#e06f8d';

    var yellow = new Array();
    yellow['primary_color']='#febf4e';
    yellow['pricing_box_color']='#febf4e';
    yellow['image_gradient_top_color']='#febf4e';
    yellow['image_gradient_bottom_color']='#febf4e';
    yellow['button_gradient_top_color']='#fed66c';
    yellow['button_gradient_bottom_color']='#febf4e';
    yellow['button_gradient_text_color']='#623f34';
    yellow['button_text_highlight_color']='#fede9d';
    yellow['button_border_color']='#f5b74e';

    var green = new Array();
    green['primary_color']='#a2cc5c';
    green['pricing_box_color']='#a2cc5c';
    green['image_gradient_top_color']='#a2cc5c';
    green['image_gradient_bottom_color']='#a2cc5c';
    green['button_gradient_top_color']='#cde287';
    green['button_gradient_bottom_color']='#a2cc5c';
    green['button_gradient_text_color']='#607b2e';
    green['button_text_highlight_color']='#cdea96';
    green['button_border_color']='#aec46f';

    var blue = new Array();
    blue['primary_color']='#70d1f4';
    blue['pricing_box_color']='#70d1f4';
    blue['image_gradient_top_color']='#70d1f4';
    blue['image_gradient_bottom_color']='#70d1f4';
    blue['button_gradient_top_color']='#aae5f7';
    blue['button_gradient_bottom_color']='#70d1f4';
    blue['button_gradient_text_color']='#43778d';
    blue['button_text_highlight_color']='#b2ebff';
    blue['button_border_color']='#8cc7d9';

    var lightblue = new Array();
    lightblue['primary_color']='#80e6e8';
    lightblue['pricing_box_color']='#80e6e8';
    lightblue['image_gradient_top_color']='#80e6e8';
    lightblue['image_gradient_bottom_color']='#80e6e8';
    lightblue['button_gradient_top_color']='#b9f0f7';
    lightblue['button_gradient_bottom_color']='#80e6e8';
    lightblue['button_gradient_text_color']='#46777e';
    lightblue['button_text_highlight_color']='#b4f5f9';
    lightblue['button_border_color']='#93c4cb';

    var steelblue = new Array();
    steelblue['primary_color']='#8aa3b7';
    steelblue['pricing_box_color']='#8aa3b7';
    steelblue['image_gradient_top_color']='#8aa3b7';
    steelblue['image_gradient_bottom_color']='#8aa3b7';
    steelblue['button_gradient_top_color']='#bdcbd6';
    steelblue['button_gradient_bottom_color']='#8aa3b7';
    steelblue['button_gradient_text_color']='#515f6c';
    steelblue['button_text_highlight_color']='#c6d4df';
    steelblue['button_border_color']='#70808d';

    var purple = new Array();
    purple['primary_color']='#d59ad0';
    purple['pricing_box_color']='#d59ad0';
    purple['image_gradient_top_color']='#d59ad0';
    purple['image_gradient_bottom_color']='#d59ad0';
    purple['button_gradient_top_color']='#e5c1e5';
    purple['button_gradient_bottom_color']='#d59ad0';
    purple['button_gradient_text_color']='#7b5678';
    purple['button_text_highlight_color']='#f5c7ec';
    purple['button_border_color']='#9d7a9b';

    var orange = new Array();
    orange['primary_color']='#febf4e';
    orange['pricing_box_color']='#febf4e';
    orange['image_gradient_top_color']='#febf4e';
    orange['image_gradient_bottom_color']='#febf4e';
    orange['button_gradient_top_color']='#fed66c';
    orange['button_gradient_bottom_color']='#febf4e';
    orange['button_gradient_text_color']='#623f34';
    orange['button_text_highlight_color']='#fede9d';
    orange['button_border_color']='#f5b74e';

    var pink = new Array();
    pink['primary_color']='#f66779';
    pink['pricing_box_color']='#f66779';
    pink['image_gradient_top_color']='#f66779';
    pink['image_gradient_bottom_color']='#f66779';
    pink['button_gradient_top_color']='#f88197';
    pink['button_gradient_bottom_color']='#f66779';
    pink['button_gradient_text_color']='#913540';
    pink['button_text_highlight_color']='#fc96a3';
    pink['button_border_color']='#e06f8d';

    // When the select box #base_color_scheme changes
    // of_update_color updates each of the color pickers
    $('#color_scheme').change(function() {
        colorscheme = $(this).val();
        if (colorscheme == 'lightgrey') { colorscheme = lightgrey; }
        if (colorscheme == 'darkgrey') { colorscheme = darkgrey; }
        if (colorscheme == 'red') { colorscheme = red; }
        if (colorscheme == 'yellow') { colorscheme = yellow; }
        if (colorscheme == 'green') { colorscheme = green; }
        if (colorscheme == 'blue') { colorscheme = blue; }
        if (colorscheme == 'light Blue') { colorscheme = lightblue; }
        if (colorscheme == 'steel Blue') { colorscheme = steelblue; }
        if (colorscheme == 'purple') { colorscheme = purple; }
        if (colorscheme == 'orange') { colorscheme = orange; }
        if (colorscheme == 'pink') { colorscheme = pink; }

        for (id in colorscheme) {
            of_update_color(id,colorscheme[id]);
        }
    });
    
    // This does the heavy lifting of updating all the colorpickers and text
    function of_update_color(id,hex) {
        $('#section-' + id + ' .of-color').css({backgroundColor:hex});
        $('#section-' + id + ' .colorSelector').ColorPickerSetColor(hex);
        $('#section-' + id + ' .colorSelector').children('div').css('backgroundColor', hex);
        $('#section-' + id + ' .of-color').val(hex);
        $('#section-' + id + ' .of-color').animate({backgroundColor:'#ffffff'}, 600);
    }
});
