$(function() {
    console.log('hi');
    // setting userdata into the login form
    if (hasData("remember_me")) {
        var data = JSON.parse(localStorage.getItem("remember_me"));
        $('#email').val(data.username);
        $('#password').val(data.password);
        $('#remember_me').prop('checked', true);
    }

    //login function
    $('#login-form').submit(function(e) {
        e.preventDefault();
        // console.log('hi in');

        let form_data = $(this).serialize();
        let username = $('#email').val();
        let password = $('#password').val();

        // let message;

        $.ajax({
            type: 'POST',
            url: BASEURL + 'Login/auth',
            data: form_data,
            success: function(responce) {
                let data = JSON.parse(responce);
                // console.log(data.msg);
                if (data.msg == 'true') {
                    if (data.remember_me == 1) {
                        var arr = { "username": username, "password": password };
                        saveData("remember_me", arr);
                    } else if (data.remember_me == 0) {
                        removeData('remember_me');
                    }
                }

                // console.log(data.role);

                if (data.role == 'Admin' || data.role == "admin") {
                    window.location.href = BASEURL + 'dashboard';
                } else {
                    // showAlert(data.msg, data.type);
                    document.getElementById('error').innerText = data.msg;
                    // console.log(data.msg)
                }
            }
        });
    });
});

// Local storage function
function retriveData(FILE_KEY) {
    return localStorage.getItem(FILE_KEY);
}

function saveData(FILE_KEY, data) {
    localStorage.setItem(FILE_KEY, JSON.stringify(data));
}

function hasData(FILE_KEY) {
    return localStorage.hasOwnProperty(FILE_KEY) ? true : false;
    // localStorage 
}

function removeData(FILE_KEY) {
    localStorage.removeItem(FILE_KEY);
    // localStorage 
}