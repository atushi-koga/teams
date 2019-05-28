$(function () {
    $('button.cancel').on('click', function () {
        if (!confirm('キャンセルしますか？')) {
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
                alert('キャンセルを完了しました。');
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
