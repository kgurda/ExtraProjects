jQuery(function() {
    jQuery('#submit_form').click(function(event) {
        event.preventDefault();
        var name = jQuery('#name').val();
        var surname = jQuery('#surname').val();
        var welcomeDiv = jQuery('#welcome');

        jQuery.ajax({
            url:'http://localhost/Libartus/Zadanie_II/saveName.php',
            method: 'POST',
            data: 'name=' + name + '&surname=' + surname,
            dataType: 'text'
        })
        .done(function(data){
            var welcomeHeader = jQuery('<h1>' + data + '</h1>');
            welcomeDiv.html(welcomeHeader);
        })
        .fail(function(xhr, textStatus, error){
            alert('Unable to save a data!');
        });
    })
})

