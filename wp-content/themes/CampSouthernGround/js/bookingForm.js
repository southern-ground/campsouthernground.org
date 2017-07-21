/**
 * Created by fst on 3/29/17.
 */

jQuery(document).ready(function () {

    var $ = jQuery,
        initFoodSection = function () {
            console.log('initFoodSection');
            var $food = $('input[name=Food]'),
                $alcohol = $('input[name=Alcohol]'),
                $none = $('input[name=None]'),

                $buffet = $('input[name=Buffet]'),
                $familyStyle = $('input[name=Family_Style]');

            $food.on('change', function (e) {
                if ($food.attr('checked')) {
                    // Checked
                    $none.removeAttr('checked');
                    $('#FoodStyle').removeClass('disabled');
                } else {
                    // Not checked.
                    if (!$alcohol.attr('checked')) {
                        $none.attr('checked', 'checked');
                    }

                    $('#FoodStyle').addClass('disabled');
                    $buffet.removeAttr('checked');
                    $familyStyle.removeAttr('checked');
                }
            });

            $alcohol.on('change', function (e) {
                if ($alcohol.attr('checked')) {
                    // Checked
                    $none.removeAttr('checked');
                } else {
                    // Not checked.
                    if (!$food.attr('checked')) {
                        $none.attr('checked', 'checked');
                    }
                }
            });

            $none.on('change', function (e) {
                if ($none.attr('checked')) {
                    $food.removeAttr('checked');
                    $alcohol.removeAttr('checked');
                    $buffet.removeAttr('checked');
                    $familyStyle.removeAttr('checked');
                    $('#FoodStyle').addClass('disabled');
                }
            });
        },
        initAVSection = function () {
            console.log('initAVSection');
            var $ownAV = $('input[name=Own_AV]'),
                $campAV = $('input[name=Camp_AV]'),
                $noAV = $('input[name=No_AV]');

            $ownAV.on('change', function () {
                if ($ownAV.attr('checked')) {
                    $noAV.removeAttr('checked');
                } else {
                    if (!$campAV.attr('checked')) {
                        $noAV.attr('checked', 'checked');
                    }
                }
            });

            $campAV.on('change', function () {
                if ($campAV.attr('checked')) {
                    $noAV.removeAttr('checked');
                } else {
                    if (!$ownAV.attr('checked')) {
                        $noAV.attr('checked', 'checked');
                    }
                }
            });

            $noAV.on('change', function () {
                if ($noAV.attr('checked')) {
                    $ownAV.removeAttr('checked');
                    $campAV.removeAttr('checked');
                }
            });
        },
        initTeamBuildingSection = function () {
            console.log('initTeamBuildingSection');
            var $yes = $('input#TeamBuildingYes'),
                $no = $('input#TeamBuildingNo');

            $yes.on('change', function () {
                console.log('Yes Changed');
                if ($yes.attr('checked')) {
                    $('#TeamBuilding').removeClass('disabled');
                }
            });
            $no.on('change', function () {
                if ($no.attr('checked')) {
                    $('#TeamBuilding').addClass('disabled');
                    $('#TeamBuilding input[type=checkbox]').removeAttr('checked');
                }
            });

        };

    initFoodSection();
    initAVSection();
    initTeamBuildingSection();

    $('#VenueBookingForm').on('submit', function (e) {

        var valid = true, errorList = [];

        $('*').removeClass('error');
        $('#Errors').empty();

        // Validation:
        if (!document.getElementById('DiningHall').checked &&
            !document.getElementById('CrabTreehouse').checked &&
            !document.getElementById('ShadePavillion').checked) { // No Venue picked.
            $('label[for=DiningHall]').addClass('error');
            $('label[for=CrabTreehouse]').addClass('error');
            $('label[for=ShadePavillion]').addClass('error');
            errorList.push('Please choose a venue');
            valid = false;
        }

        var validateEmail = function (email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        };

        if (!validateEmail(document.getElementById('Email').value)) {
            $('#Email').addClass('error');
            errorList.push('Please enter a valid email address');
            valid = false;
        }

        if (document.getElementById('EventDate').value.length === 0) {
            $('#EventDate').addClass('error');
            errorList.push('Please enter a date for your event');
            valid = false;
        }

        if (valid) {

            // Gather all the inputs:
            var elements = document.forms[0].elements, el;
            for (var i = 0; i < elements.length; i++) {
                el = elements[i];
                switch (el.getAttribute('type')) {
                    case "checkbox":
                        console.log("CHECKBOX: " + el.getAttribute('name') + (el.checked ? " CHECKED" : ""));
                        break;
                    case "text":
                        console.log("TEXT:", el.getAttribute('name'), "=", el.value);
                        break;
                    case "radio":
                        console.log("RADIO BUTTON:", el.getAttribute('name'), el.value, (el.checked ? " CHECKED" : ""));
                        break;
                    case "submit":
                        break;
                    default:
                        // Text area:
                        console.log('TEXT AREA: ' + el.getAttribute('name'), el.value);

                }
            }

            document.forms[0].submit();


        } else {

            e.preventDefault();

            $('#Errors').append("<p>Please address the following errors</p>");
            $('#Errors').append('<ul>');
            for (var i = 0; i < errorList.length; i++) {
                $('#Errors').append('<li>' + errorList[i] + '</li>');
            }
            $('#Errors').append('</ul>');
        }
    });
});