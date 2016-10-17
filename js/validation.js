$("document").ready(function() {    
   // regex nombre: solo letras
   var nameregex = /^[a-zA-Z ]+$/;

   $.validator.addMethod("validname", function(value, element) { // metodo extra para validar por regex
      return this.optional(element) || nameregex.test(value);
   }); 

   // regex mail: stuff@stuff.co (averiguar porque no requiere com);
   var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

   $.validator.addMethod("validemail", function(value, element) { // metodo extra para validar por regex
      return this.optional(element) || eregex.test(value);
   });

   $("#signinForm").validate({
      rules: {
         nombre: {
            required: true,
            validname: true,
            minlength: 3
         },
            email: {
            required: true,
            validemail: true
         },
         pass1: {
            required: true,
            minlength: 8,
            maxlength: 15
         },
         pass2: {
            required: true,
            equalTo: "#pass_1"
         },
      },
      messages: { //actualmente no se muestran. 
         nombre: {
            required: "Ingrese su nombre",
            validname: "El nombre solo debe contener letras",
            minlength: "El nombre es muy corto"
         },
         email: {
            required: "Ingrese un e-mail",
            validemail: "Ingrese un e-mail válido"
         },
         pass1:{
            required: "Ingrese una contraseña",
            minlength: "La contraseña debe tener al menos 8 caracteres"
         },
         pass2:{
            required: "Ingrese nuevamente su contraseña",
            equalTo: "Las contraseñas no coinciden"
         }
      },
      errorClass: "help-block", // clase donde van los errores. No logré generarla para mostrar mensajes al usuario - RI.
      errorPlacement: function(error, element) { // mete los errores en elemento (default label?)
         $(element).closest(".form-group").find(".help-block").html(error.html()); // errores van a .help-block
      },
      highlight: function(element) { // resalta el .form-group en rojo (bootstrap has-error)
         $(element).closest(".form-group").removeClass("has-success").addClass("has-error");
      },
      unhighlight: function(element, errorClass, validClass) {
         $(element).closest(".form-group").removeClass("has-error").addClass("has-success"); // saca el rojo y pone verde (bootstrap has-success)
         $(element).closest(".form-group").find(".help-block").html(""); // borra el mensaje de error, si lo hay.
      },
      submitHandler: function(form) { // acciones a realizar cuando submit
         form.submit(); // valida todo una última vez
         alert("ok"); // sigue ejecutando si jquery no encuentra errores de validacion y cierra el modal
      }
   }); 
})