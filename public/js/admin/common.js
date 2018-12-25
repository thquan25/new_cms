$('input[data-field="number"]').on('keypress', function(event){
    if (event.which != 8 && (event.which < 48 || event.which > 57))
    {
        event.preventDefault();
    }
});

/**
 * Common javascript functions for website
 */

function is_empty(str) {
	return (!str || str.length === 0 || /^\s*$/.test(str));
}

function is_int(input)
{
	return (input === parseInt(input));
}

function is_email(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function scroll_to(element) {
    $('html,body').animate({
        scrollTop: $(element).offset().top
    }, 'slow');
}

function array_unique(array) {
    var a = array.concat();
    for(var i=0; i<a.length; ++i) {
        for(var j=i+1; j<a.length; ++j) {
            if(a[i] === a[j])
                a.splice(j--, 1);
        }
    }

    return a;
}

function convert_alias(str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();

    // remove accents, swap ñ for n, etc
    var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
    var to   = "aaaaaeeeeeiiiiooooouuuunc------";
    for (var i = 0, l = from.length ; i < l ; i++) {
         str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes

    return str;
}

function scroll_to(element, distance_top = 0) {
    $('html,body').animate({
        scrollTop: $(element).offset().top + distance_top
    }, 'slow');
}

function notify(message, type, delay = 1000) {
    $.notifyClose();
    $.notify({
        message: message
    }, {
        type: type,
        delay: delay
    });
}
