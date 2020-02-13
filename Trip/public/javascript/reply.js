
$(".rep").click(function(){
  $("form").show();
});

function validForm(){
  var phone = document.myform.phone.value;
  if(phone.length !== 10){
    alert("Phone number should be 10 digits long");
    return false;
  }

}
