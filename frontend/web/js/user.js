/**
 * Created by linpeiyu on 2016-08-30.
 */


//$(".dropdown").on("mouseover",function(){
//    //$('#dLabel').dropdown('toggle');
//    $(this).find(".dropdown-toggle").dropdown('toggle');
//});

//$(".dropdown-toggle").on("mouseover",function(){
//    //$('#dLabel').dropdown('toggle');
//    $(this).dropdown('toggle');
//});
//$('#dLabel').dropdown('toggle');

$('li.dropdown').mouseover(function() {
    $(this).addClass('open');    }).mouseout(function() {        $(this).removeClass('open');    });


//$('#myblog_nav').on('');

$('#myblog_nav').on('show.bs.tab', recent_blog());

$(".nav-list > li").on("mouseover",function(){

});
//$(function(){
//    $.ajax({
//        url:"index.php?r=user/test",
//        type:"POST",
//        data:"id=1",
//        success:function(){
//            alert("test");
//        },
//        error:function(){
//            alert("faild");
//        }
//    });
//});

function recent_blog()
{
    $.ajax(
        {
            url:'index.php?r=user/recent_blog',
            //headers: {'X-Requested-With': 'XMLHttpRequest'},
            //crossDomain: false,
            //data:"user_id="+2,
            //type:"POST",
            success:function(data){
                console.log(data);
                if(data==null)
                {
                    $('#blogContent').html("there is nothing here! ");
                }
                else{
                    //alert("test");
                    $('#blogContent').html(data);
                }



            },
            error:function(data){
                console.log(data);
            }
        }
    );
    //console.log(e.target); // 激活的标签页
    //e.relatedTarget // 前一个激活的标签页

}

function del_blog(id)
{
    confirm("Are you sure to delete this blog");
    $.ajax(
        {

            url:'index.php?r=blog/del',
            data:{id:id},
            type:"POST",
            success:function(){
                recent_blog();

            },
            error:function(){
                alert("delete failed")
            }

        }
    );
}





