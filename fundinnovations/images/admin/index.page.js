$("#dealCity").multiselect({
    noneSelectedText:"Select City"
});
var selectedID=1;
$("li").click(function(){
    if(this.id>=1){
        $("li").removeClass('selected');
        $(this).addClass('selected');
        selectedID=this.id;
        var selectedText=$('#'+selectedID).text();
        if(this.id!=1){
            $('#selected_value').empty();
            $('#selected_value').append(selectedText)
            }
            if(this.id>=2){
            $('#fromDate').attr("readonly","readonly");
            $('#fromDate').val("");
            $('#toDate').attr("readonly","readonly");
            $('#toDate').val("")
            }else{
            $('#fromDate').removeAttr("readonly");
            $('#toDate').removeAttr("readonly")
            }
            $('.set_time').hide()
        }
    });
$("#submit").click(function(){
    $('.set_time').hide();
    var cityName=$("#dealCity").val();
    var fromDate=$('#fromDate').val();
    var toDate=$('#toDate').val();
    if(fromDate==''){
        fromDate='null'
        }
        if(toDate==''){
        toDate='null'
        }
        if(GLOBAL_BASE_PATH!=''&&GLOBAL_BASE_PATH.indexOf('/')<1){
        GLOBAL_BASE_PATH=GLOBAL_BASE_PATH+'/'
        }
        $.ajax({
        url:GLOBAL_BASE_PATH+"index/ajaxGraph/cityName/"+cityName+"/fromDate/"+fromDate+"/toDate/"+toDate+"/id/"+selectedID,
        success:function(data){
            var obj=jQuery.parseJSON(data);
            $('#placeholder').empty();
            $('#deal_count_value').empty();
            $('#deal_today_value').empty();
            $('#avg_value').empty();
            $('#placeholder').append(obj.graph);
            $('#deal_count_value').append(obj.deal);
            $('#deal_today_value').append(obj.dealToday);
            $('#avg_value').append(obj.avg)
            }
        })
});
$('.select-time').click(function(){
    $(".set_time").toggle()
    });
$('.class_datepicker').datepicker({
    dateFormat:'dd-mm-yy',
    maxDate:new Date(),
    onSelect:function(dateText,inst){
        checkSchedule()
        }
    });
function checkSchedule(){
    var startDate=$('#fromDate').val();
    var endDate=$('#toDate').val();
    var dateString=startDate+" - "+endDate;
    $("li").removeClass('selected');
    $('#1').addClass('selected');
    $('#selected_value').empty();
    $('#selected_value').append(dateString)
    }
    
    //EQUEAL HEIGHT FOR DIVS FUCTION
 function equalHeight(group) {
 tallest = 0;
 group.each(function() {
 thisHeight = $(this).height();
 if(thisHeight > tallest) {
 tallest = thisHeight;
 }
 });
 
 group.height(tallest);
 
 }
 $(document).ready(function() {
 equalHeight($(".equial_height"));
 });
 