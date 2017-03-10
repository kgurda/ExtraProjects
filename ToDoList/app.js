jQuery(function() {
    
    var submitButton = jQuery('#submit');
    var table = jQuery('#things_table');
    var form = jQuery('form');
    
    
    submitButton.click(function(event) {
        event.preventDefault();
        
        var description = jQuery('#description').val();
        var thead = jQuery('#to_do_list');

        var tr = jQuery('<tr><td class="incompleted">'+description+'</td><td class="button_td"><button class="delete_btn">Delete</button></td></tr>');
        tr.appendTo(thead);
        form.trigger('reset');
    });
    
    table.click(function(event) {
        if(event.target.className == 'delete_btn') {
            event.target.parentNode.parentNode.remove('tr');
        }
        if(event.target.className == 'incompleted' || event.target.className == 'completed') {
            jQuery(event.target).toggleClass('incompleted');
            jQuery(event.target).toggleClass('completed');
        }
    })
})