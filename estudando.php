<!DOCTYPE html>
<html>
    <head>
        <script src="js/jquery-1.10.1.min.js"></script>
        <script src="js/disable.js"></script>
        <script>
            $(document).ready(function () {
                $("#my-input").disableTextBox().css("color", "red");
            });
        </script>
    </head>
    <body>
        <textarea id="my-input" ></textarea>

        <input id="textbox1" />
        <button id="button1">Ok</button>
        <p id="paragraf1"></p>
        <script>
            var textbox1 = document.getElementById("textbox1");
            var button1 = document.getElementById("button1");
            var paragraf1 = document.getElementById("paragraf1");
            //[A-Z]{1,}[a-z]{1,}[-!"#$%&'()*+,./:;<=>?@[\\\]_`{|}~]{1,}[0-9]{1,}
            var patt1 = /<[a-z]>/gi;
            
            button1.onclick = function () {
                paragraf1.innerHTML = patt1.test(textbox1.value);
            };
            
            textbox1.onkeyup = function (e) {
                if (e.keyCode === 13) {
                    paragraf1.innerHTML = (patt1.test(textbox1.value));
                }
            };
        </script>
    </body>
</html>
