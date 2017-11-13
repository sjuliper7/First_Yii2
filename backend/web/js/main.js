/**
 * Created by Juliper Simanjuntak on 11/13/2017.
 */
$(function () {
    $('#modelButton').click(function () {
        //alert('something');
        $('#modal').modal('show')
           .find('#modalContent')
           .load($(this).attr('value'));
    });
});