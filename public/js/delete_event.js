$(function () {
    $('button.delete-event').on('click', function () {
        if (!confirm('イベントを削除しますか？')) {
            return;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var error_msg = '申し訳ございません。しばらく待ってからアクセスしてください。';
        $.ajax({
            url: $(this).data('url'),
            type: 'POST',
            data: {"recruitment_id": $(this).data('recruitment-id')},
            dataType: 'json',
            timeout: 5000
        }).done(function (data) {
            if (data === 200) {
                alert('イベントの削除を完了しました。');
            } else {
                alert(error_msg);
            }
            location.reload();
        }).fail(function () {
            alert(error_msg);
            location.reload();
        });
    });
});
