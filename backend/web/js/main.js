/**
 * Created by Juliper Simanjuntak on 11/13/2017.
 */
$(function () {
    $('#modelButton').click(function () {
        $('#modal').modal('show')
           .find('#modalContent')
           .load($(this).attr('value'));
    });
});

/*$(function(){
	$('#modalContent').click(function(){
		alert('ada yang salah');
	})
});*/