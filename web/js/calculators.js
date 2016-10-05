function number_good_view(user_num, after_point){
    user_num = Number(user_num);
    if ((user_num - Math.floor(user_num))>0){ //если есть дробная часть
        user_num = user_num.toFixed(after_point).toString().replace(/[0]+$/,"").replace(/[.]$/,"");
    }
     return Number(user_num);
}