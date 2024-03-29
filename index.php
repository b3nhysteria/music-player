<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<body>
    <h2>Sound Information</h2>
    <div id="length">Duration:</div>
    <div id="source">Source:</div>
    <div id="status" style="color:red;">Status: Loading</div>
    <hr>
    <h2>Control Buttons</h2>
    <button id="play">Play</button>
    <button id="pause">Pause</button>
    <button id="restart">Restart</button>
    <hr>
    <h2>Playing Information</h2>
    <div id="currentTime">0</div>
</body>
<script language="javascript">
    var audioElement = document.createElement('audio');
    window.localStorage.setItem("timer", 90);

    function countdown() {
        var timer = window.localStorage.getItem("timer");
        console.log("====>", timer);
        if (timer % 15 == 0) {
            $("#status").text("Status: Playing");
            audioElement.play();
            console.log("running!!");
        }
        timer = parseInt(timer) - 1;
        window.localStorage.setItem("timer", timer);
        if (timer < 0) {
            clearInterval(myInterval);
        }
    }

    $(document).ready(function() {
        audioElement.setAttribute('src', './repo/applause.mp3');

        // audioElement.addEventListener('ended', function () {
        //     this.play();
        // }, false);

        audioElement.addEventListener("canplay", function() {
            $("#length").text("Duration:" + audioElement.duration + " seconds");
            $("#source").text("Source:" + audioElement.src);
            $("#status").text("Status: Ready to play").css("color", "green");
        });

        audioElement.addEventListener("timeupdate", function() {
            $("#currentTime").text("Current second:" + audioElement.currentTime);
        });

        $('#play').click(function() {
            var myInterval = setInterval(function() {
                countdown();
            }, 1000);
        });

        $('#pause').click(function() {
            audioElement.pause();
            $("#status").text("Status: Paused");
        });

        $('#restart').click(function() {
            audioElement.currentTime = 0;
        });
    });
</script>

</html>
