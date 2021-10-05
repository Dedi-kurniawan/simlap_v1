/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*****************************************************!*\
  !*** ../demo1/src/js/pages/custom/login/login-3.js ***!
  \*****************************************************/

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Class Definition
var KTLogin = function() {
	var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';

	var _handleFormSignup = function() {
		// Base elements
		var wizardEl = KTUtil.getById('kt_login');
		var form = KTUtil.getById('kt_login_signup_form');
		var wizardObj;
		var validations = [];

		if (!form) {
			return;
		}

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					npsn: {
						validators: {
							notEmpty: {
								message: 'NPSN di larang kosong'
							}
						}
					},
					nama_sekolah: {
						validators: {
							notEmpty: {
								message: 'Nama Sekolah di larang kosong'
							}
						}
					},
					status: {
						validators: {
							notEmpty: {
								message: 'Status di larang kosong'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 2
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: 'Nama Lengkap di larang kosong'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Email di larang kosong'
							},
							emailAddress: {
								message: 'Pastikan email dengan benar'
							}
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Password di larang kosong'
							},
							stringLength: {
								min: 6,
								message: 'Password min 6 karakter'
							},
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Initialize form wizard
		wizardObj = new KTWizard(wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: false  // allow step clicking
		});

		// Validation before going to next page
		wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			// Validate form before change wizard step
			var validator = validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						wizard.goTo(wizard.getNewStep());
						KTUtil.scrollTop();
					} else {
						KTUtil.scrollTop();
						return false;						
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		wizardObj.on('changed', function (wizard) {
			KTUtil.scrollTop();
		});

		// Submit event
		wizardObj.on('submit', function (wizard) {
			var validator = validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						KTUtil.scrollTop();					
					} else {
						KTUtil.scrollTop();
					}
				});
			}

			if (!$("#email").val()) {
				return false;
			} else if(!$("#password").val()) {
				return false;
			}else{
				form.submit();
			}
			
		});
    }

    // Public Functions
    return {
        init: function() {
			_handleFormSignup();
        }
    };
}();

$("#npsn_search").on("click", function (e) {
	var url = HOST_URL + '/get-sekolah-npsn';
	var npsn = $("#npsn").val();
	if (!npsn) {
		$("#error_npsn").html("NPSN di larang kosong");
		return false;
	}
	$.ajax({
        url: url,
        method: "POST",
        data: {
			npsn : npsn
		},
        dataType: 'json',
        success: function (d) {
            if (d.status == 'success') {
				$("#nama_sekolah").val(d.data.nama_sekolah);
				$("#sekolah_id").val(d.data.id);
				$("#status").val(d.data.status_sekolah);
				$("#error_npsn").html("");
                return false;
            } else if ((d.status == 'error')) {
				$("#error_npsn").html(d.data);
				$("#nama_sekolah").val("");
				$("#sekolah_id").val("");
				$("#status").val("");
                return false;
            }
        }
    });
})

$('#kt_login_signup_form').on('keyup keypress', function(e) {
	var keyCode = e.keyCode || e.which;
	if (keyCode === 13) { 
	  e.preventDefault();
	  return false;
	}
  });

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});

/******/ })()
;
//# sourceMappingURL=login-3.js.map
