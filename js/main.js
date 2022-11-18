$('.btn-authorization').click(function (e) {
    e.preventDefault();

    let login = $('input[name="login"]').val();
    let password = $('input[name="password"]').val();

    $.ajax({
        url: 'core/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success (data) {

            if (data.status) {
                document.location.href = '/profile.php';
            }
                $('.mess').text(data.message);
        }
    });
});

