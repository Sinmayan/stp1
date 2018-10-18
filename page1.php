<?php
    session_start();
    require 'ses.php';
    require 'logout.php';
    //require 'gettoken.php';
    check_ses(session_id(),$_SESSION['un'] );
?>
<html>
<head>
    <script language="JavaScript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function () {
            load();
        });

        function load() {
            $.ajax({
                url: 'gettoken.php',
                type: 'POST',
                dataType: 'text',

                success: function (data) {
                    // $('#csrf_token').val(JSON.parse(data));
                    $('#csrf_token').val(data);
                },
                error: function () {
                }
            });
        }
    </script>
</head>

<body>

<div style="text-align: center;">
    <form action="page1_load.php" method="post">
        Name   : <input type="text" name="na"><br>
        phone no : <input type="text" name="pn"><br>
        Job   : <input type="text" name="job"><br>
        <input type="hidden" id="csrf_token" name="csrf_token" value="" ><br>

        <input type="submit" name="submit" value="Submit Form">
    </form>
</div>
</body>
</html>