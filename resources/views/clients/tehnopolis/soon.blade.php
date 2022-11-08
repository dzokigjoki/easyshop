<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Технополис :: Најголемата онлајн продавница во Македонија, купувајте лесно и заштедете време и пари</title>
    <style>
        body{
            text-align: center;
            font-family: sans-serif;
            font-weight: 100;
        }

        h1{
            color: #396;
            font-weight: 100;
            font-size: 40px;
            margin: 40px 0px 20px;
        }

        #clockdiv{
            font-family: sans-serif;
            color: #fff;
            display: inline-block;
            font-weight: 100;
            text-align: center;
            font-size: 30px;
        }

        #clockdiv > div{
            padding: 10px;
            border-radius: 3px;
            background: #87B849;
            display: inline-block;
        }

        #clockdiv div > span{
            padding: 15px;
            border-radius: 3px;
            background: #4f7d14;
            display: inline-block;
        }

        .smalltext{
            padding-top: 5px;
            font-size: 16px;
        }
    </style>
</head>
<body>
<img src="https://stage.tehnopolis.mk/assets/tehnopolis/images/logo@2x.png"
     style="display: block; margin: 200px auto 0px; width: 100%; max-width: 700px;"><br>

<div id="clockdiv">
    <div>
        <span class="hours"></span>
        <div class="smalltext">Часа</div>
    </div>
    <div>
        <span class="minutes"></span>
        <div class="smalltext">Минути</div>
    </div>
    <div>
        <span class="seconds"></span>
        <div class="smalltext">Секунди</div>
    </div>
</div>
<script type="text/javascript">
    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);

            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }

    var deadline = new Date(2017, 7, 19, 11, 0, 0);
    initializeClock('clockdiv', deadline);
</script>
</body>
</html>