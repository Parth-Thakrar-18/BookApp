function showError(field, message) {
  if (!message) {
    $("#" + field).addClass("is-valid").removeClass("is-invalid").siblings(".invalid-feedback").text("Empty Fields");
  } else {
  $("#" + field).addClass("is-invalid").removeClass("is-valid").siblings(".invalid-feedback").text(message);
  }
}

function removeValidationClasses(form){
  $(form).each(function(){
    $(form).find(":input").removeClass("is-valid is-invalid");
  });
}

function showMessage(type, message) {
  return `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
  <strong>${message}</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>`;
}