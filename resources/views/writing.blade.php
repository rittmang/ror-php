<!DOCTYPE html>
<html lang="en">

<head>
    <!-- jQuery slim minified -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161216442-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-161216442-1');

    </script>

    <!-- Initialize variable for cut, paste and undo -->
    <script>
        var clipboardText = "";

    </script>

    <meta charset="UTF-8">
    <title>GRE TOEFL Writing Practice</title>
</head>

<body>
    <div class="container">
        <div class="container section right-align" style="width: 100%;">
            <div class="input-field">
                <input id="time" type="text">
                <label for="time">Time</label>
            </div>
            <button id="timer" class="waves-effect waves-light btn-large">Start</button>

            <script>
                var counter = null;

                $("#timer").click(function(e) {
                    $("#timer").removeClass("pulse");
                    $("#time").attr("disabled", false);
                    let action = $("#timer").text();

                    if (action === "Start") {
                        $("#time").attr("disabled", true);

                        counter = setInterval(function() {
                            let time = $("#time").val().split(":");

                            if (time.length !== 2 || isNaN(Number(time[0])) || isNaN(Number(time[1]))) {
                                $("#time").attr("disabled", false);
                                clearInterval(counter);
                                $("#timer").text("Start");
                                $("#timer").removeClass("red");
                                M.toast({
                                    html: "Please give valid time!",
                                    classes: "red rounded"
                                })
                            } else {
                                let minutes = Number(time[0]);
                                let seconds = Number(time[1]);
                                if (seconds === 0) {
                                    if (minutes === 0) {
                                        $("#time").attr("disabled", false);
                                        clearInterval(counter);
                                        $("#timer").text("Start");
                                        $("#timer").removeClass("red");
                                        $("#timer").addClass("pulse");
                                    } else {
                                        seconds = 59;
                                        minutes -= 1;
                                    }
                                } else {
                                    seconds -= 1;
                                }
                                $("#time").val(minutes + ":" + seconds)
                            }
                        }, 1000);
                        $("#timer").text("Stop");
                        $("#timer").addClass("red")
                    } else {
                        clearInterval(counter);
                        $("#timer").text("Start");
                        $("#timer").removeClass("red");
                    }
                });

            </script>
        </div>

        <div class="container section" style="width: 100%;">
            <div class="container row">
                <div class="col s6 offset-s6">
                    <button id="cut" class="waves-effect waves-light btn">Cut</button>
                    <script>
                        $("#cut").click(
                            function(e) {
                                // clipboardText = $("#answer").val();
                                // $("#answer").select();
                                // document.execCommand("cut");
                                if (window.getSelection) {
                                    clipboardText = window.getSelection().toString();
                                    document.execCommand("cut");
                                }
                            }
                        )

                    </script>

                    <button id="paste" class="waves-effect waves-light btn">Paste</button>
                    <script>
                        function insertAtCursor(myField, myValue) {
                            //IE support
                            if (document.selection) {
                                myField.focus();
                                sel = document.selection.createRange();
                                sel.text = myValue;
                            }
                            //MOZILLA and others
                            else if (myField.selectionStart || myField.selectionStart == '0') {
                                var startPos = myField.selectionStart;
                                var endPos = myField.selectionEnd;
                                myField.value = myField.value.substring(0, startPos) +
                                    myValue +
                                    myField.value.substring(endPos, myField.value.length);
                                myField.selectionStart = startPos + myValue.length;
                                myField.selectionEnd = startPos + myValue.length;
                            } else {
                                myField.value += myValue;
                            }
                        }
                        $("#paste").click(
                            async function(e) {
                                // clipboardText = $("#answer").val();
                                // $("#answer").focus();
                                // document.execCommand("paste");
                                const text = await navigator.clipboard.readText();
                                var $t = $(document.getElementById("answer"));
                                insertAtCursor(document.getElementById("answer"), text);
                            }
                        );

                    </script>

                    <button id="undo" class="waves-effect waves-light btn">Undo</button>
                    <script>
                        $("#undo").click(
                            function(e) {
                                $("#answer").val(clipboardText);
                            }
                        );

                    </script>
                </div>
            </div>

            <div class="container row" style="width: 100%;">
                <div class="textbox col s6">
                    <label for="question">Copy Paste Question Here</label>
                    <textarea id="question"></textarea>
                </div>

                <div class="textbox col s6">
                    <label for="answer">Write Answer Here</label>
                    <textarea id="answer"></textarea>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
