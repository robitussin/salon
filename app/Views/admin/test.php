<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Material Design DateTimePicker</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <input id="input" width="312" />
    <script>
        $('#input').datetimepicker({
            datepicker: { showOtherMonths: true },
            modal: true,
            footer: true
        });
    </script>
</body>
</html>