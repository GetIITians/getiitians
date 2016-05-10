$(function () {

    if($('#adminTeachers').length)
    {
        $(document).on('click','.teacher_accept, .teacher_reject', function(event) {
          var clicked = $(this);
          $.ajax({
            url : clicked.parent().prop('action'),
            method	 : 'POST',
            data : {
              _token		: clicked.parent().find('input[name=_token]').val(),
              status	: clicked.data('status')
            },
            complete: function(response){
//                console.log(response.responseText);
                helper.flash(JSON.parse(response.responseText).message);
            }
          });
        });

    }

})
