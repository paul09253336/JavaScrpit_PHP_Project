function check() {
    var password = document.getElementById("password").value;
    var repsword = document.getElementById("repsword").value;

    if (isNaN(password)) {
        alert("手機格式輸入錯誤");
    }
    if (isNaN(repsword)) {
        alert("手機格式輸入錯誤");
    }
    
    if (password === '') {
        alert('密碼不能為空');
    }
    /*if(password != repsword) {
      alert("密碼不同，請重新輸入");
     }*/

    if (password != repsword) {
        document.getElementById("msg").innerHTML = "兩次輸入密碼不一樣，請重新輸入";
        return false;
    } 


}
