jQuery(document).ready(function($) {

    // Color Scheme Options - These array names should match
    // the values in color_scheme of options.php
    
    var peach = new Array();
    peach['primary_color']='#fc5c46';
    peach['pricing_box_color']='#fc5c46';
    peach['image_gradient_top_color']='#fc5c46';
    peach['image_gradient_bottom_color']='#fc5c46';
    peach['button_gradient_top_color']='#fc5c46';
    peach['button_gradient_bottom_color']='#fc5c46';
    peach['button_gradient_text_color']='#fc5c46';

    var orange = new Array();
    orange['primary_color']='#fc4a1b';
    orange['pricing_box_color']='#fc4a1b';
    orange['image_gradient_top_color']='#fc4a1b';
    orange['image_gradient_bottom_color']='#fc4a1b';
    orange['button_gradient_top_color']='#fc4a1b';
    orange['button_gradient_bottom_color']='#fc4a1b';
    orange['button_gradient_text_color']='#fc4a1b';

    var yellow = new Array();
    yellow['primary_color']='#febf4e';
    yellow['pricing_box_color']='#febf4e';
    yellow['image_gradient_top_color']='#febf4e';
    yellow['image_gradient_bottom_color']='#febf4e';
    yellow['button_gradient_top_color']='#fed66c';
    yellow['button_gradient_bottom_color']='#febf4e';
    yellow['button_gradient_text_color']='#623f34';

    // When the select box #base_color_scheme changes
    // of_update_color updates each of the color pickers
    $('#color_scheme').change(function() {
        colorscheme = $(this).val();
        if (colorscheme == 'peach') { colorscheme = peach; }
        if (colorscheme == 'orange') { colorscheme = orange; }
        if (colorscheme == 'yellow') { colorscheme = yellow; }

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
