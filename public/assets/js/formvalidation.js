$(document).ready(function () {
$('#btnareg').attr('disabled',true);

$('#password_confirm').keyup(function(){
  //alert("nn");
var pass1=$('#password1').val();
var pass2=$('#password_confirm').val();

if(pass1.length!=pass2.length || pass1!=pass2){
//alert(pass1+''+pass2);
  $('#passvalid').css('color','red');
  $('#passvalid').html("password not matching");
  $('#btnareg').attr('disabled',true);
}else{
  $('#passvalid').css('color','green');
  $('#passvalid').html("password matched");
  $('#btnareg').attr('disabled',false);
}
});
$.validator.addMethod('noSpecialChars',function(value, element) {
         return (this.optional(element) || /^[a-z0-9\_ ]+$/i.test(value));
     }, "special characters are not allowed");

$.validator.addMethod('finyearFormat',function(value,element){
  return(this.optional(element) || /^d{4}-d{2}$/i.test(value));
},"Invalid Financial Year Patter");

$('#userreg1').validate({
  highlight: function(element) {
      $(element).css('color', '#000000');
  },

      errorClass:"error-class",
      errorElement:'div',
      errorPlacement:function(error,element){
        if(element.parent('.input-group').length){
          error.insertAfter(element.parent());
        }else{
          error.insertAfter(element);
        }

      },

      onError:function(){
        $('.input-group.error-class').find('.help-block.form-error').each(function(){
          $(this).closest('.form-group').addClass('error-class').append($(this));
        });
      },
  messages:{
    name:{required:"Please Enter User Name"},
    designation:{required:"Please Enter Designation "},
    location:{required:"Please Enter Location "},
    mobile:{required:"Please Enter Mobile Number"},
    email:{required:"Please Enter Email "},
    password:{required:"Please Enter User Password"},
  },
    rules: {
              name: {
                  required: true,
                  minlength:3,
                  noSpecialChars:true

                },
                designation:{
                  required: true,
                  minlength:3,
                  noSpecialChars:true
                },
                location:{
                  required: true,
                  minlength:3,
                  noSpecialChars:true
                },
                mobile:{
                  required: true,
                  minlength:10,
                  maxlength:10
                },
                email:{
                  required: true,
                  email:true,
                },
                password:{
                  required: true,
                  minlength:6,
                  maxlength:8
                }

            }
  });


  $('#fyear').validate({
    highlight: function(element) {
        $(element).css('color', '#000000');
    },

        errorClass:"error-class",
        errorElement:'div',
        errorPlacement:function(error,element){
          if(element.parent('.input-group').length){
            error.insertAfter(element.parent());
          }else{
            error.insertAfter(element);
          }

        },

        onError:function(){
          $('.input-group.error-class').find('.help-block.form-error').each(function(){
            $(this).closest('.form-group').addClass('error-class').append($(this));
          });
        },
    messages:{
      fin_year:{required:"Please Enter Finacial Year"},
    },
    rule:{
      fin_year:{
        required:true,
        maxlength:7,
        finyearFormat:true
      }
    }
  });


  $('#expName').validate({
    highlight: function(element) {
        $(element).css('color', '#000000');
    },

        errorClass:"error-class",
        errorElement:'div',
        errorPlacement:function(error,element){
          if(element.parent('.input-group').length){
            error.insertAfter(element.parent());
          }else{
            error.insertAfter(element);
          }

        },

        onError:function(){
          $('.input-group.error-class').find('.help-block.form-error').each(function(){
            $(this).closest('.form-group').addClass('error-class').append($(this));
          });
        },
    messages:{
      exp_name:{required:"Please Enter Expense Name"},

    },
    rule:{
      exp_name:{
        required:true,
        maxlength:30
      }
    }
  });



  $('#expensetrans').validate({
    highlight: function(element) {
        $(element).css('color', '#000000');
    },

        errorClass:"error-class",
        errorElement:'div',
        errorPlacement:function(error,element){
          if(element.parent('.input-group').length){
            error.insertAfter(element.parent());
          }else{
            error.insertAfter(element);
          }

        },

        onError:function(){
          $('.input-group.error-class').find('.help-block.form-error').each(function(){
            $(this).closest('.form-group').addClass('error-class').append($(this));
          });
        },
    messages:{
      expensenamelist:{required:"Please Select Expense Name"},
      paid_towards:{required:"Please Enter Company/Person Name To Whom Amount Paid"},
      paid_amt:{required:"Please Enter Amount Paid"},
      payment_date:{required:"Please Select Date Of Payment"}
    },
    rule:{
      expensenamelist:{
        required:true
      },
      paid_towards:{
        required:true
      },
      paid_amt:{
        required:true
      },
      payment_date:{
        required:true
      }
    }
  });


  $('#userticket').validate({
    highlight: function(element) {
        $(element).css('color', '#000000');
    },

        errorClass:"error-class",
        errorElement:'div',
        errorPlacement:function(error,element){
          if(element.parent('.input-group').length){
            error.insertAfter(element.parent());
          }else{
            error.insertAfter(element);
          }

        },

        onError:function(){
          $('.input-group.error-class').find('.help-block.form-error').each(function(){
            $(this).closest('.form-group').addClass('error-class').append($(this));
          });
        },
    messages:{
      expensenamelist:{required:"Please Select Expense Name"},
      location:{required:"Please Enter Location"},
      description:{required:"Please Enter Complaint/Query"},
      date:{required:"Please Select Date "}
    },
    rule:{
      expensenamelist:{
        required:true
      },
      location:{
        required:true
      },
      description:{
        required:true
      },
      date:{
        required:true
      }
    }
  });

  $('#register').validate({
    highlight: function(element) {
        $(element).css('color', '#000000');
    },

        errorClass:"error-class",
        errorElement:'div',
        errorPlacement:function(error,element){
          if(element.parent('.input-group').length){
            error.insertAfter(element.parent());
          }else{
            error.insertAfter(element);
          }

        },

        onError:function(){
          $('.input-group.error-class').find('.help-block.form-error').each(function(){
            $(this).closest('.form-group').addClass('error-class').append($(this));
          });
        },
    messages:{
      name:{required:"Please Enter User Name"},
      designation:{required:"Please Enter Designation "},
      location:{required:"Please Enter Location "},
      mobile:{required:"Please Enter Mobile Number"},
      email:{required:"Please Enter Email "},
      password:{required:"Please Enter User Password"},
    },
      rules: {
                name: {
                    required: true,
                    minlength:3,
                    noSpecialChars:true

                  },
                  designation:{
                    required: true,
                    minlength:3,
                    noSpecialChars:true
                  },
                  location:{
                    required: true,
                    minlength:3,
                    noSpecialChars:true
                  },
                  mobile:{
                    required: true,
                    minlength:10,
                    maxlength:10
                  },
                  email:{
                    required: true,
                    email:true,
                  },
                  password:{
                    required: true,
                    minlength:6,
                    maxlength:8
                  },
                  password_confirm: {
                    required: true,
          minlength:6,
          equalTo: '#password'
                         }


              }
    });

    $('#signin').validate({
      highlight: function(element) {
          $(element).css('color', '#000000');
      },

          errorClass:"error-class",
          errorElement:'div',
          errorPlacement:function(error,element){
            if(element.parent('.input-group').length){
              error.insertAfter(element.parent());
            }else{
              error.insertAfter(element);
            }

          },

          onError:function(){
            $('.input-group.error-class').find('.help-block.form-error').each(function(){
              $(this).closest('.form-group').addClass('error-class').append($(this));
            });
          },
      messages:{
        username:{required:"Please Enter User Name"},
        password:{required:"Please Enter Password "}
      },
      rules: {
                username: {
                    required: true},
                  password:{
                    required: true
                  }
            }
        });

});
