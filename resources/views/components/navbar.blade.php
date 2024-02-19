<!--HamBurger Icon-->
<div class="bars" id="nav-action">
    <span class="bar"> </span>
</div>

<!--Navbar Links-->
<nav id="nav">
    <ul>
        <li class="shape-circle circle-one"><a href="{{ route('notif') }}">Notifications</a></li>
        <li class="shape-circle circle-two"><a href="{{ route('table') }}">Administartion</a></li>
        <li class="shape-circle circle-three"><a href="{{ route('rapport') }}">Details Appareils</a></li>
        <li class="shape-circle circle-five">
            <a href="{{ route('map') }}">Map</a>
        </li>
    </ul>
</nav>


<style>
    * {
        margin: 0;
        padding: 0;
    }

    
    .bars {
        /*   background-color:pink; */
        position: absolute;
        width: 27px;
        height: 27px;
        top: 30px;
        right: 30px;
        cursor: pointer;
        z-index: 101;
        padding-top: 9px;
    }
    
    .bar {
        width: 100%;
        height: 4px;
        background-color: #000000;
        position: absolute;
    }
    
    span::before,
    span::after {
        content: "";
        display: block;
        background-color: #ff0000;
        width: 100%;
        height: 4px;
        position: absolute;
    }
    
    .bar::before {
        transform: translateY(-9px);
    }
    
    .bar::after {
        transform: translateY(9px);
    }
    
    .bars.active .bar {
        background-color: transparent;
    }
    
    .bars.active span::before {
        animation: top-bar 1s;
        animation-fill-mode: forwards;
    }
    
    .bars.active span::after {
        animation: bottom-bar 1s;
        animation-fill-mode: forwards;
    }
    /* Navbar Links CSS */
    
    #nav {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        transition: all 1s;
        z-index: -1;
        overflow: hidden;
        opacity: 0;
    }
    
    #nav a {
        color: #fff;
        text-decoration: none;
        line-height: 70vw;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        text-indent: 50vw;
        border-radius: 50%;
        transition: all .5s;
    }
    
    #nav a:hover {
        background: #357FFD;
    }
    
    ul {
        list-style: none;
    }
    
    .visible {
        z-index: 100 !important;
        opacity: 1 !important;
    }
    
    .shape-circle {
        border-radius: 50%;
        width: 20vw;
        height: 20vw;
        top: -10vw;
        right: -10vw;
        position: absolute;
        transition: all 1s ease-in-out;
        background: #2979FF;
        box-shadow: 0 0px 0px rgba(4, 26, 62, 0.5);
    }
    
    nav.visible li:first-child {
        width: 200vw;
        height: 200vw;
        top: -100vw;
        right: -100vw;
        z-index: 5;
        transition: all .5s ease-in-out;
        box-shadow: 0 0px 80px rgba(4, 26, 62, 0.5);
    }
    
    nav.visible li:nth-child(2) {
        width: 150vw;
        height: 150vw;
        top: -75vw;
        right: -75vw;
        z-index: 6;
        transition: all .6s ease-in-out;
        box-shadow: 0 0px 80px rgba(4, 26, 62, 0.5);
    }
    
    nav.visible li:nth-child(3) {
        width: 100vw;
        height: 100vw;
        top: -50vw;
        right: -50vw;
        z-index: 7;
        transition: all .7s ease-in-out;
        box-shadow: 0 0px 80px rgba(4, 26, 62, 0.5);
    }
    
    nav.visible li:last-child {
        width: 50vw;
        height: 50vw;
        top: -25vw;
        right: -25vw;
        z-index: 8;
        transition: all .8s ease-in-out;
        box-shadow: 0 0px 80px rgba(4, 26, 62, 0.5);
    }
    
    nav.visible li:first-child a {
        line-height: 265vw !important;
        text-indent: 15vw !important;
    }
    
    nav.visible li:nth-child(2) a {
        line-height: 200vw !important;
        text-indent: 17vw !important;
    }
    
    nav.visible li:nth-child(3) a {
        line-height: 137vw !important;
        text-indent: 17vw !important;
    }
    
    nav.visible li:last-child a {
        line-height: 70vw !important;
        text-indent: 12vw !important;
    }
    /* Main Body CSS */
        
    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    
    h1 {
        font-size: 60px;
        text-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        text-transform: uppercase;
       
        letter-spacing: 5px;
        padding: 5px;
    }
    
   
    
    @keyframes top-bar {
        50% {
            transform: translateY(0);
        }
        100% {
            transform: rotate(45deg) translateY(0);
        }
    }
    
    @keyframes bottom-bar {
        50% {
            transform: translateY(0);
        }
        100% {
            transform: rotate(-45deg) translateY(0);
        }
    }
    
    @media screen and (max-width:800px) {
        h1 {
            padding-top: 80px;
            font-size: 60px;
        }
    }
</style>
<script>
    // Setting up the Variables
    var bars = document.getElementById("nav-action");
    var nav = document.getElementById("nav");


    //setting up the listener
    bars.addEventListener("click", barClicked, false);


    //setting up the clicked Effect
    function barClicked() {
        bars.classList.toggle('active');
        nav.classList.toggle('visible');
    }
</script>