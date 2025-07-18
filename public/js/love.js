$('button').click(function(){
  console.log($('#'+this.id).html());
  if($('#'+this.id).html() === "♡"){
    $('#'+this.id).html("♥");
  }else if($('#'+this.id).html() === "♥"){
    $('#'+this.id).html("♡");
  }
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    url: '/users/love',
    type:'POST',
    data:{
        '_token': $('input[name="_token"]').val(),
        'data':this.id
    }
  })
});