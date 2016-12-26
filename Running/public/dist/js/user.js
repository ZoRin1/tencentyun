/**
 * Created by wang on 2016/10/14 0014.
 */
function dayChange(){

    var year=document.getElementById("yeartext").value;
    var month_select = document.getElementById("month_choose");
    var day_select = document.getElementById("day_choose");
    var month=month_select.value;
    var num=0;
    month=String(parseInt(month)+1);

    day_select.options.length=0;
    if (month=="1"||month=="3"||month=="5"||month=="7"||month=="8"||month=="10"||month=="12"){
        num=31;
    }
    else if(month=="2"){
        if((year%4==0&&year%100!=0)||(year%400==0)){
            num=29;
        }
        else{
            num=28;
        }

    }else{
        num=30;
    }
    for (var i=1;i<=num;i++){
        day_select.options.add(new Option(String(i),String(i)));
    }
}

