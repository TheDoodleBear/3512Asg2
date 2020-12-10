/*
Reseting styling for the elements in each pages. 
Source inspired by:
html5doctor.com Reset Stylesheet
Author: Richard Clark - http://richclarkdesign.com
*/

div,
span,
iframe,
h1,
h2,
h3,
p,
img,
ol,
ul,
li,
fieldset,
form,
label,
legend,
caption,
article,
aside,
figcaption,
figure,
footer,
header,
section,
html,
body {
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    font-size: 100%;
    background: transparent;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: whitesmoke;
}

main {
    display: grid;
    place-items: center;
    height: 100vh;
    width: 100%;
}

.homeMain {
    height: 80vh;
}

.heroWrapper1,
.signupWrapper,
.loginWrapper,
.homeWrapper {
    display: inherit;
    background-color: whitesmoke;
    place-items: center;
    border-radius: 15px;
    position: relative;
    width: 1280px;
    height: 720px;
}

.loginWrapper,
.signupWrapper {
    position: relative;
    grid-template-rows: 150px 1fr;
    background-image: url('/img/photos/bg03.jpg');
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;
}

.homeWrapper {
    margin: 0 auto;
    padding: 25px;
    background-color: bisque;
    width: 95%;
    height: auto;
    display: grid;
    grid-gap: 30px;
    /*grid-template: 80px 80px auto auto auto / 1fr 1fr;*/
    align-content: start;
    grid-template-areas: "a a a a a a" "c c c b b b" "c c c d d d" "e e e d d d" "e e e d d d";
}


/* Hero Background Slideshow Source: https://www.w3schools.com/css/css3_animations.asp*/

.heroWrapper1 {
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;
    animation: HeroBGSlide 40s linear 0s infinite;
    animation-timing-function: ease;
    background-image: url('/img/photos/bg01.jpg');
}

@keyframes HeroBGSlide {
    0% {
        background-image: url('/img/photos/bg01.jpg');
    }
    20% {
        background-image: url('/img/photos/bg02.jpg');
    }
    40% {
        background-image: url('/img/photos/bg03.jpg');
    }
    60% {
        background-image: url('/img/photos/bg04.jpg');
    }
    80% {
        background-image: url('/img/photos/bg05.jpg');
    }
    100% {
        background-image: url('/img/photos/bg01.jpg');
    }
}


/* Additional styling for the form element */

.indexForm {
    display: inherit;
    place-items: center;
    width: 70%;
    height: auto;
    border-radius: 15px;
}

.loginForm {
    display: inherit;
    place-items: center;
    border-radius: 15px;
    grid-template-rows: 1fr auto;
    width: 70%;
    height: auto;
}

.loginForm>.container {
    display: inherit;
    place-items: center;
    grid-template: auto auto auto/ auto;
    width: 100%;
}


/* Group the buttons together to control element placement */

.indexForm>.frmBtn {
    grid-gap: 10px;
    display: inherit;
    grid-template: auto / auto auto;
    place-items: center;
    width: 80%;
    max-width: 450px;
}

.container>.frmBtn {
    grid-gap: 10px;
    display: inherit;
    grid-template: auto / auto auto;
    place-items: center;
    width: 75%;
}

button {
    background-color: #184fe7;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    border-radius: 8px;
    width: 95%;
    max-width: 200px;
    height: 55px;
    border: solid black 2px;
}

button:hover {
    padding: 5px 30px;
    border: 1px solid #184fe7;
    border-radius: 4px;
    /* Emboss source code: https://stackoverflow.com/questions/31259252/making-emboss-buttons */
    -webkit-box-shadow: inset 1px 6px 12px lightskyblue, inset -1px -10px 5px blue, 1px 2px 1px black;
    -moz-box-shadow: inset 1px 6px 12px lightskyblue, inset -1px -10px 5px blue, 1px 2px 1px black;
    box-shadow: inset 1px 6px 12px lightskyblue, inset -1px -10px 5px blue, 1px 2px 1px black;
    background-color: #184fe7;
    color: white;
    text-shadow: 1px 1px 1px black;
}


/* Textbox styling */

input[type=text],
input[type=password] {
    width: 85%;
    max-width: 600px;
    height: 60px;
    padding: 12px 20px;
    margin: 8px 0;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 5px;
}

.indexForm>input[type=text] {
    grid-row: 2/3;
}

.container>input[type=text] {
    grid-row: 1/2;
}

.container>input[type=password] {
    grid-row: 2/3;
}


/* Hero image credit styling */

#imgCred {
    position: fixed;
    left: 50%;
    bottom: 20%;
    transform: translate(-50%, -50%);
    margin: 0 auto;
    color: whitesmoke;
}

.signupWrapper>h1,
.loginWrapper>h1 {
    background-color: whitesmoke;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: -10%;
    width: 180px;
    text-align: center;
}

.userInfo {
    grid-template-columns: repeat(3, 1fr);
}

.favPaint,
.likePaint,
.userInfo {
    display: grid;
    grid-gap: 10px;
    place-items: center;
    max-width: 100%;
}

.favPaint>h1,
.likePaint>h1,
.userInfo>h1 {
    grid-column: 1/4;
}

.paintItems {
    display: flex;
    flex-wrap: wrap;
    grid-gap: 10px;
    justify-content: center;
}

.square {
    background-color: cornflowerblue;
    width: 100px;
    height: 100px;
    border: solid black 2px;
}

.homeWrapper>header {
    grid-area: a;
    padding: 30px 0;
}

.homeWrapper>.searchBox {
    grid-area: b;
}

.homeWrapper>.userInfo {
    grid-area: c;
}

.likePaint {
    grid-area: d;
}

.favPaint {
    grid-area: e;
}

.searchBox {
    width: 95%;
    padding: 20px;
}

.searchBox>input[type=text] {
    width: 100%;
    max-width: 100%;
    background-color: aqua;
}


/* Change some element's positioning and style based on the width of the screen */

@media screen and (max-width: 580px) {
    .indexForm>.frmBtn {
        grid-template: auto auto / auto;
        place-items: center;
    }
    .container>.frmBtn {
        grid-template: auto auto / auto;
        place-items: center;
    }
    #imgCred {
        position: absolute;
        margin-left: 5px;
        bottom: 5px;
    }
    .indexForm,
    .loginForm {
        width: 90%;
        height: auto;
        padding: 10px
    }
    .loginForm>.container {
        grid-template: auto auto auto/ auto;
    }
    .heroWrapper1,
    .loginWrapper,
    .signupWrapper,
    .homeWrapper {
        position: relative;
        width: 90%;
        height: 50%;
    }
}