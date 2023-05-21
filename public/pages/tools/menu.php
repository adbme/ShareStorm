<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            transition: 0.5s;
        }

        #mydiv {
            width: 100px;
            height: 100px;
            background-color: #211E24;
            border-radius: 10px;
            color: white;
            text-align: center;
            line-height: 200px;
            position: fixed;
            top: 0;
            right: 0;
            cursor: grab;
            transition: transform 0.2s ease-out;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 100;
        }

        .logo {
            height: 200px;
            pointer-events: none;
            position: relative;
        }

        .dropdown-menu {
            animation-duration: 0.3s;
            animation-fill-mode: both;
            display: none;
            transform-origin: top;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .show {
            display: block;
            animation-name: slideIn;
        }

        @keyframes slideIn {
            from {
                transform: scaleY(0);
            }

            to {
                transform: scaleY(1);
            }
        }
    </style>
</head>

<body>
    <div class="dropdown">
        <div id="mydiv" data-toggle="dropdown"><img class="logo" src="../images/logo.svg" alt=""></div>
        <div class="dropdown-menu" aria-labelledby="mydiv">
            <a class="dropdown-item" href="#">Option 1</a>
            <a class="dropdown-item" href="#">Option 2</a>
            <a class="dropdown-item" href="#">Option 3</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
    <script>
        var dragItem = document.getElementById("mydiv");
        var posX = 0, posY = 0;
        var initialX = 0, initialY = 0;
        var isDragging = false;
        var container = document.documentElement;

        var hammer = new Hammer(dragItem);
        hammer.get('pan').set({direction: Hammer.DIRECTION_ALL});

        hammer.on('panstart', function (e) {
            posX = dragItem.offsetLeft;
            posY = dragItem.offsetTop;
            initialX = e.deltaX;
            initialY = e.deltaY;
            dragItem.style.transition = '';
            isDragging = true;
        });

        hammer.on('panmove', function (e) {
            if (!isDragging) return;
            var deltaX = e.deltaX - initialX;
            var deltaY = e.deltaY - initialY;
            var targetX = posX + deltaX;
            var targetY = posY + deltaY;

            var maxLeft = container.clientWidth - dragItem.offsetWidth;
            var maxTop = container.clientHeight - dragItem.offsetHeight;

            targetX = Math.max(0, Math.min(targetX, maxLeft));
            targetY = Math.max(0, Math.min(targetY, maxTop));

            dragItem.style.left = targetX + 'px';
            dragItem.style.top = targetY + 'px';
        });

        hammer.on('panend', function (e) {
            isDragging = false;
            dragItem.style.transition = 'transform 0.2s ease-out';
            dragItem.style.transform = 'translate3d(0, 0, 0)';
        });

        dragItem.addEventListener('click', function () {
            var dropdownMenu = document.querySelector('.dropdown-menu');
            dropdownMenu.classList.toggle('show');

            var rect = dragItem.getBoundingClientRect();
            if (rect.top > window.innerHeight / 2) {
                dropdownMenu.classList.add('dropdown-menu-bottom');
            } else {
                dropdownMenu.classList.remove('dropdown-menu-bottom');
            }
        });

        function toggleDivVisibility() {
            var checkbox = document.getElementById("checkbox");
            var mydiv = document.getElementById("mydiv");

            if (checkbox.checked) {
                mydiv.style.display = "none";
            } else {
                mydiv.style.display = "flex";
            }
        }
    </script>
</body>

</html>