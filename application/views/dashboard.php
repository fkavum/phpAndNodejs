<html>

<head>
    <title>NODE JS</title>

    <link href="<?php echo base_url('css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body>


    <div class="wrap mt-5">
        <div class="panel">
            <div class="header">
                <h4>Chat Bar</h4>
            </div>
            <div class="user-list">
                <div class="user">
                    <span class="avatar"><img src="<?= base_url('img/avatar.png') ?>" alt=""></span>
                    <span class="name">Name</span>
                </div>
                <div class="user">
                    <span class="avatar"><img src="<?= base_url('img/avatar.png') ?>" alt=""></span>
                    <span class="name">Name</span>
                </div>
                <div class="user">
                    <span class="avatar"><img src="<?= base_url('img/avatar.png') ?>" alt=""></span>
                    <span class="name">Name</span>
                </div>
                <div class="user">
                    <span class="avatar"><img src="<?= base_url('img/avatar.png') ?>" alt=""></span>
                    <span class="name">Name</span>
                </div>
                <div class="user">
                    <span class="avatar"><img src="<?= base_url('img/avatar.png') ?>" alt=""></span>
                    <span class="name">Name</span>
                </div>
            </div>
            <div class="message">
                <div class="income">
                    aaaaaaa b bbbbbbb cccccc dd aaaaaaa b bbbbbbb cccccc dd
                    aaaaaaa b bbbbbbb cccccc dd aaaaaaa b bbbbbbb cccccc dd
                    aaaaaaa b bbbbbbb cccccc dd aaaaaaa b bbbbbbb cccccc dd
                </div>
                <div class="outcome">
                    aaaaaaa b bbbbbbb cccccc dd aaaaaaa b bbbbbbb cccccc dd
                    aaaaaaa b bbbbbbb cccccc dd aaaaaaa b bbbbbbb cccccc dd
                    aaaaaaa b bbbbbbb cccccc dd aaaaaaa b bbbbbbb cccccc dd
                </div>
                <ul class="message-list">
                    <li><span class="usr">User1: </span><span>Test message</span></li>

                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="<?= base_url() ?>home/post" method="post" id="chat-box">
                    <div class="form-group">
                        <input type="text" name="msg" id="msg" class="form-control">
                    </div>

                </form>

            </div>
            <div class="row">
                <a href="<?= base_url() ?>user/logout" class="btn btn-warning">Log out</a>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script>
console.log('<?= session_id() ?>');


$(document).ready(
    function() {
        $('#chat-box').submit(

            function() {
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                        console.log(data)
                        if (data == 1) {
                            $('.message-list').append(
                                '<li><span class="usr">Me: </span><span>' + $('#msg').val() +
                                '</span></li>'
                            );
                            $('#msg').val('');
                        }
                    }
                })
                return false;
            }
        );
    }
);


(function a() {
    $.ajax({
        url: 'http://localhost:2323/?key=<?= session_id() ?>',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            $('.message-list').append(
                '<li><span class="usr">' + data.username + ': </span><span>' + data
                .message +
                '</span></li>');

        }
    }).done(function(data, statusText, jqXHR) {
        a();
    });
})();
</script>



</html>