/**
 * Created by fst on 3/29/17.
 */

jQuery(document).ready(function () {

    var $ = jQuery,
        testField = function (r, $el, $label) {
            if (r.test($el.val())) {
                $el.removeClass('error');
                $label.removeClass('error');
                return false;
            }

            $el.addClass('error');
            $label.addClass('error');

            return true;
        },
        $PreferredVolunteerRoleContainer = $('#RolePreferenceContainer'),
        $PreferredVolunteerRole = $('#Preferred_Role');


    $('#RolesFlexibleNo, #RolesFlexibleYes').on('change', function () {
        if($(this).prop('checked') && $(this).val() === "No"){
            $PreferredVolunteerRoleContainer.addClass('disabled');
            $PreferredVolunteerRole.data('desired-role', $PreferredVolunteerRole.val() || "");
            $PreferredVolunteerRole.val("");
        }else{
            $PreferredVolunteerRoleContainer.removeClass('disabled');
            $PreferredVolunteerRole.removeProp('disabled')
                .val($PreferredVolunteerRole.data('desired-role') || "");
        }
    });

    $('#RolesFlexibleNo').each(function(){
        if($(this).prop('checked')){
            $PreferredVolunteerRoleContainer.removeClass('disabled');
            $PreferredVolunteerRole.removeProp('disabled')
                .val($PreferredVolunteerRole.data('desired-role') || "");
        }
    });

    $('#MiniCampVolunteerForm').on('submit', function (e) {

        var valid = true,
            errors = 0,
            $el,
            regEx,
            campError = false;

        $('*').removeClass('error');
        $('#Errors').empty();
        // Validate text fields:
        $('*[data-required="1"]').each(function () {
            $el = $(this);
            $label = $('label[for="' + $el.attr('id') + '"]');
            if ($el.val() === "") {
                //errorList.push();
                $el.addClass('error');
                $label.addClass('error');
                errors++;
            }
        });
        // Zip:
        $('*[data-required="2"]').each(function () {
            $el = $(this);
            $label = $('label[for="' + $el.attr('id') + '"]');
            regEx = /^\d{5}(?:[-\s]\d{4})?$/;
            if (testField(regEx, $el, $label)) {
                errors++;
            }
        });
        // Validate phone numbers:
        $('*[data-required="3"]').each(function () {
            $el = $(this);
            $label = $('label[for="' + $el.attr('id') + '"]');
            regEx = /^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/;
            if (testField(regEx, $el, $label)) {
                errors++;
            }
        });
        // Validate email:
        $('*[data-required="4"]').each(function () {
            $el = $(this);
            $label = $('label[for="' + $el.attr('id') + '"]');
            regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (testField(regEx, $el, $label)) {
                errors++;
            }
        });

        var selected = 0;

        // Check that at least ONE of the checkboxes is selected:
        $('*[data-required="5"]').each(function () {
            $el = $(this);
            if ($el.prop('checked')) {
                selected++;
            }
        });

        if (selected === 0) {
            errors++;
            $('.checkboxLabel').addClass('error');
            campError = true;
        }

        // Check that at least ONE of the checkboxes is selected:
        $('*[data-required="6"]').each(function () {
            $el = $(this);
            if (!$el.prop('checked')) {
                errors++;
                $(this).parent().find('.checkboxLabel').addClass('error');
            }else{
                $(this).parent().find('.checkboxLabel').removeClass('error');
            }
        });

        if (errors > 0) {
            var errorMsg =
                $('#Errors').html('Please fill in the required fields' + (campError ? (' and select at least one scheduled Mini Camp.') : '.'));
        }

        // Testing validation check:
        $('*[data-required="404"]').each(function () {
            $el = $(this);
            if($el.val().toLowerCase() === "test"){
                errors++;
                var errorMsg =
                    $('#Errors').html('Halted submission process due to validation check. Total errors: ' + errors);
            }
        });


        if (errors > 0) {
            $('#Errors').addClass('show');
            // Submit
            e.preventDefault();
            e.stopPropagation();
            void(0);
            return false;
        }else{
            $('#Errors').removeClass('show');
        }

    });
});