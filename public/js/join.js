$(function () {
    var $join_btn = $('#join-btn');

    $join_btn.on('click', function () {
        var join_user_id = $join_btn.data('user-id');
        var recruitment_id = $join_btn.data('recruitment-id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: $join_btn.data('join-url'),
            type: 'POST',
            data: {"user_id": join_user_id, "recruitment_id": recruitment_id},
            dataType: 'json',
            timeout: 5000
        }).done(function (data) {
            if (data === 200) {
                alert('処理が完了しました。');
                return true;
            }
        }).fail(function () {
            alert('申し訳ございません。しばらく待ってからアクセスしてください。');
        });
    });
});
