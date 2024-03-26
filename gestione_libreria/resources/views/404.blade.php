<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/gorillas.css') }}">
</head>
<body>
    
<canvas id="game"></canvas>

<svg width="200" height="250" id="windmill">
  <defs>
    <path id="arm" d="M -7 -20 C -7 -10 7 -10 7 -20 L 2 -80 L -2 -80" />
  </defs>
  <g transform="translate(100, 100)">
    <g id="windmill-head">
      <circle r="8"></circle>
      <use href="#arm" />
      <use href="#arm" transform="rotate(+120)" />
      <use href="#arm" transform="rotate(-120)" />
    </g>
  </g>
  <path
    transform="translate(100, 0)"
    d="M -7 250 L 7 250 L 3 115 L -3 115"
  ></path>
</svg>

<div id="wind-info">Wind Speed: <span id="wind-speed">0</span></div>

<div id="info-left">
  <h3><span class="name">Player</span></h3>
  <p>Angle: <span class="angle">0</span>°</p>
  <p>Velocity: <span class="velocity">0</span></p>
</div>

<div id="info-right">
  <h3><span class="name">Computer</span></h3>
  <p>Angle: <span class="angle">0</span>°</p>
  <p>Velocity: <span class="velocity">0</span></p>
</div>

<div id="instructions">
  <h3 id="game-mode">Player vs. Computer</h3>
  <h1>Drag the bomb to aim!</h1>
</div>

<div id="bomb-grab-area"></div>

<div id="congratulations">
  <h1><span id="winner">?</span> won!</h1>
 
  </p>
  <div class="dropdown">
    <button class="dropbtn">New Game</button>
    <div class="dropdown-content">
      <a href="#" class="single-player">Single Player</a>
      <a href="#" class="two-players">Two-Player</a>
      <a href="#" class="auto-play">Autoplay</a>
    </div>
  </div>
</div>

<div id="settings">
  <div class="dropdown">
    <button class="dropbtn">New Game</button>
    <div class="dropdown-content">
      <a href="#" class="single-player">Single Player</a>
      <a href="#" class="two-players">Two-Players</a>
      <a href="#" class="auto-play">Autoplay</a>
    </div>
  </div>

  <button id="color-mode">Dark Mode</button>

  <a
    id="home"
    href="{{ route('homepage.index') }}"
    target="_top" 
  >
    <span>Go Back</span>
  </a>
</div>

<button id="fullscreen" onclick="toggleFullscreen()">
  <svg width="30" height="30">
    <path
          id="enter-fullscreen"
          stroke="white"
          stroke-width="3"
          fill="none"
          d="
             M 10, 2 L 2,2 L 2, 10
             M 20, 2 L 28,2 L 28, 10
             M 28, 20 L 28,28 L 20, 28
             M 10, 28 L 2,28 L 2, 20"
          />
    <path
          id="exit-fullscreen"
          stroke="transparent"
          stroke-width="3"
          fill="none"
          d="
             M 10, 2 L 10,10 L 2, 10
             M 20, 2 L 20,10 L 28, 10
             M 28, 20 L 20,20 L 20, 28
             M 10, 28 L 10,20 L 2, 20"
          />
  </svg>
</button>

<script src="js/gorillas.js"></script>
</body>
</html>

