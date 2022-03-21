const toggleSwitch = function (switch_elem, on) {
    let elem = $(switch_elem + ' + span > small').prop('style');
    if (on) { // turn it on
        if (elem && elem['backgroundColor'] !== '') { // it already is so do
            // nothing
        } else {
            $(switch_elem).trigger('click').attr("checked", "checked"); // it was off, turn it on
        }
    } else { // turn it off
        if (elem && elem['backgroundColor'] !== '') { // it's already on so
            $(switch_elem).trigger('click').removeAttr("checked"); // turn it off
        } else { // otherwise
            // nothing, already off
        }
    }
};

export { toggleSwitch };