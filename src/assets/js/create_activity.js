$(document).ready(function() {

    $('#datetimePicker').datetimepicker();
    $('#datetimePicker')
        .on('dp.change dp.show', function(e) {
            // Validate the date when user change it
            $('#create_form')
            // Get the bootstrapValidator instance
                .data('bootstrapValidator')
                // Mark the field as not validated, so it'll be re-validated when the user change date
                .updateStatus('time', 'NOT_VALIDATED', null)
                // Validate the field
                .validateField('time');
        });

    $('#create_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            title: {
                validators: {
                    notEmpty: {
                        message: 'Please supply activity title'
                    }
                }
            },
            introduction: {
                validators: {
                    notEmpty: {
                        message: 'Please supply activity introduction'
                    }
                }
            },
            time: {
                validators: {
                    notEmpty: {
                        message: 'Please supply a valid datetime'
                    },
                    date: {
                        format: 'MM/DD/YYYY h:m A',
                        message: 'Please supply a valid datetime'
                    }
                }
            },
            location: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your activity location'
                    }
                }
            },
            description: {
                validators: {
                    stringLength: {
                        min: 10,
                        message:'Please enter at least 10 characters'
                    },
                    notEmpty: {
                        message: 'Please supply a description of your activity'
                    }
                }
            }
        }
    })
        .on('success.form.bv', function(e) {
            $('#create_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            // console.log($form.serialize());
            $.post(
                $form.attr('action'),
                $form.serialize(),
                function(result) {
                    if (result == true){
                        $('#success_message').slideDown({ opacity: "show" }, "slow");
                    }
                    else {
                        $('#fail_message').slideDown({ opacity: "show" }, "slow");
                    }
                },
                'json');
        });
});

