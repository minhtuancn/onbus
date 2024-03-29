/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/

$(function() {
    "use strict";
    $('button.btnSave').click(function(){        
        var flag = true;
        $('input.required').each(function(){
            var value = $.trim($(this).val());            

            if(value == ''){
                alert('Vui lòng nhập đầy đủ thông tin tiếng Anh và tiếng Việt.');
                $(this).focus();
                flag = false;
                return false;
            }
        });    
         $('select.required').each(function(){
            var value = $(this).val();                      
            if(value == 0){
                alert('Vui lòng nhập đầy đủ thông tin tiếng Anh và tiếng Việt.');
                $(this).focus();
                flag = false;
                return false;
            }
        });  
         $('textarea.required').each(function(){
            var value = $.trim($(this).val());                        
            if(value == ''){
                alert('Vui lòng nhập đầy đủ thông tin tiếng Anh và tiếng Việt.');
                $(this).focus();
                flag = false;
                return false;
            }
        });       
        return flag;
    });
    $('a.link_delete').click(function(){
        var obj = $(this);
        var alias = obj.attr('alias');
        if(confirm('Bạn chắc chắn xóa "' + alias +'"" ?')){
            var mod =  obj.attr('mod');
            var id = obj.attr('id');
            $.ajax({
                url: "controller/Delete.php",
                type: "POST",
                async: true,
                data: {
                    'id' : id,
                    'mod' : mod
                },
                success: function(data){                    
                    obj.parent().parent().remove();
                }
            });
        }else{
            return false;
        }
    });

    $('#upload_images').ajaxForm({
        beforeSend: function() {                
        },
        uploadProgress: function(event, position, total, percentComplete) {
                       
        },
        complete: function(data) {       
            var arrRes = JSON.parse(data.responseText); 
            alert(arrRes['thongbao']);
            $("#hinhanh").html(arrRes['text'] + arrRes['str_hinhanh']);
            $( "#div_upload" ).dialog('close');   
            $('#btnSaveImage').show();          
        }
    }); 
    $("#btnUpload").click(function(){
        $("#div_upload" ).dialog({
            modal: true,
            title: 'Upload images',
            width: 370,
            draggable: true,
            resizable: false            
        });
    });
    $("#add_images").click(function(){
        $( "#wrapper_input_files" ).append("<input type='file' name='images[]' /><br />");
    });
    $('a.xoa_image_upload').click(function(){
        var obj = $(this);
        var src = obj.attr('src');
        if(confirm("Remove ảnh này?")){
            var str_hinh_anh = $('#str_hinh_anh').val();
            alert(str_hinhanh);
        }else{
            return false;
        }
    });
    $('#btnSaveImageToNhaXe').click(function(){
        var str_hinh_anh = $("#str_hinh_anh").val();
        var nhaxe_id = $('#nhaxe_id').val();  
         $.ajax({
                url: "controller/Saveimage.php",
                type: "POST",
                async: true,
                data: {
                    'str_hinh_anh' : str_hinh_anh,
                    'nhaxe_id' : nhaxe_id      
                },
                success: function(data){
                    $('#str_hinh_anh').val('');
                    $('#hinhanh').html('');
                    $('#btnSaveImage').hide();
                    window.location.reload();
                }
            });    
    });
    $('select.event_change').change(function(){
        $('#form_search').submit();
    });
    $('input.text_search').keypress(function (e) {
      if (e.which == 13) {
        $('#form_search').submit();
      }
    });
    //Make the dashboard widgets sortable Using jquery UI
    $(".connectedSortable").sortable({
        placeholder: "sort-highlight",
        connectWith: ".connectedSortable",
        handle: ".box-header, .nav-tabs",
        forcePlaceholderSize: true,
        zIndex: 999999
    }).disableSelection();
    $(".box-header, .nav-tabs").css("cursor","move");
    //jQuery UI sortable for the todo list
    $(".todo-list").sortable({
        placeholder: "sort-highlight",
        handle: ".handle",
        forcePlaceholderSize: true,
        zIndex: 999999
    }).disableSelection();;

    //bootstrap WYSIHTML5 - text editor   

    $('.daterange').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                },
                startDate: moment().subtract('days', 29),
                endDate: moment()
            },
    function(start, end) {
        alert("You chose: " + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    });

 

   

    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear();

    //Calendar
    $('#calendar').fullCalendar({
        editable: true, //Enable drag and drop
        events: [
            {
                title: 'All Day Event',
                start: new Date(y, m, 1),
                backgroundColor: "#3c8dbc", //light-blue 
                borderColor: "#3c8dbc" //light-blue
            },
            {
                title: 'Long Event',
                start: new Date(y, m, d - 5),
                end: new Date(y, m, d - 2),
                backgroundColor: "#f39c12", //yellow
                borderColor: "#f39c12" //yellow
            },
            {
                title: 'Meeting',
                start: new Date(y, m, d, 10, 30),
                allDay: false,
                backgroundColor: "#0073b7", //Blue
                borderColor: "#0073b7" //Blue
            },
            {
                title: 'Lunch',
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d, 14, 0),
                allDay: false,
                backgroundColor: "#00c0ef", //Info (aqua)
                borderColor: "#00c0ef" //Info (aqua)
            },
            {
                title: 'Birthday Party',
                start: new Date(y, m, d + 1, 19, 0),
                end: new Date(y, m, d + 1, 22, 30),
                allDay: false,
                backgroundColor: "#00a65a", //Success (green)
                borderColor: "#00a65a" //Success (green)
            },
            {
                title: 'Click for Google',
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                url: 'http://google.com/',
                backgroundColor: "#f56954", //red
                borderColor: "#f56954" //red
            }
        ],
        buttonText: {//This is to add icons to the visible buttons
            prev: "<span class='fa fa-caret-left'></span>",
            next: "<span class='fa fa-caret-right'></span>",
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
        },
        header: {
            left: 'title',
            center: '',
            right: 'prev,next'
        }
    });

    //SLIMSCROLL FOR CHAT WIDGET
    $('#chat-box').slimScroll({
        height: '250px'
    });
  
   
    //Fix for charts under tabs
    $('.box ul.nav a').on('shown.bs.tab', function(e) {
        area.redraw();
        donut.redraw();
    });


    /* BOX REFRESH PLUGIN EXAMPLE (usage with morris charts) */
    $("#loading-example").boxRefresh({
        source: "ajax/dashboard-boxrefresh-demo.php",
        onLoadDone: function(box) {
            bar = new Morris.Bar({
                element: 'bar-chart',
                resize: true,
                data: [
                    {y: '2006', a: 100, b: 90},
                    {y: '2007', a: 75, b: 65},
                    {y: '2008', a: 50, b: 40},
                    {y: '2009', a: 75, b: 65},
                    {y: '2010', a: 50, b: 40},
                    {y: '2011', a: 75, b: 65},
                    {y: '2012', a: 100, b: 90}
                ],
                barColors: ['#00a65a', '#f56954'],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['CPU', 'DISK'],
                hideHover: 'auto'
            });
        }
    });

    /* The todo list plugin */
    $(".todo-list").todolist({
        onCheck: function(ele) {
            //console.log("The element has been checked")
        },
        onUncheck: function(ele) {
            //console.log("The element has been unchecked")
        }
    });

});