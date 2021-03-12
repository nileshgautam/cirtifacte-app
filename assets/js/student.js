$(function() {
    // console.log('hi');
    $('#student-form').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        // let message;
        $.ajax({
            type: 'POST',
            url: BASEURL + 'ControlPanel/studentPost',
            data: formData,
            success: function(responce) {
                let data = JSON.parse(responce);
                // console.log(data);
                if (data.type === 'danger') {
                    let message = document.getElementById('msg');
                    message.classList.add('text-danger');
                    message.innerHTML = data.msg;
                } else if (data.type === 'warning') {
                    let message = document.getElementById('msg');
                    message.classList.add('text-warning');
                    message.innerHTML = data.msg;
                } else if (data.type === 'success') {
                    let message = document.getElementById('msg');
                    message.classList.add('text-success');
                    message.innerHTML = data.msg;
                    setTimeout(function() {
                        // alert("Hello"); 
                        window.location.href = BASEURL + data.path;
                    }, 2000);
                }
                // console.log(data.role);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    // console.log('hi');
    $('.upload-flile').on('change', function() {
        let file_data = $('.upload-flile').prop('files')[0],
            id = $(this).attr('id'),

            fileSize = file_data.size;
        console.log(file_data);
        console.log(fileSize);

        alert(id);
        if (file_data != '') {
            if (fileSize <= 2000000) {
                let form_data = new FormData();
                form_data.append(id, file_data);
                $.ajax({
                    type: 'POST',
                    url: BASEURL + 'ControlPanel/upload_signature',
                    data: form_data,
                    success: function(responce) {
                        let data = JSON.parse(responce);
                        if (data.res === 0) {
                            alert('Some thing is not right, Please contact your service provider');
                        } else {
                            if (data.type === 'manger-signature') {
                                $('#manager-sing').val(data['data'])
                            } else {
                                $('#director-sign').val(data['data']);
                            }
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            } else {
                alert('The file size large, the max size would be 2 MB');

            }
        } else {
            return false;
        }


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