var $ = require('jquery/dist/jquery');
window.$ = window.jQuery = $;
require('bootstrap');
import 'jquery-ui-bundle';
import 'jquery-ui-bundle/jquery-ui.css';

$(function(){
    $("#datepicker").datepicker({
        format: 'yyyy/mm/dd',
        startDate: '-3d'
    });
    $("#send_form").click(function(){
        $('#form1').submit();
    });
});