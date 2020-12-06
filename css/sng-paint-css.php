<?php
header("Content-type: text/css; charset: UTF-8");
?>

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
body,
main {
margin: 0;
padding: 0;
border: 0;
outline: 0;
box-sizing: border-box;
}

body {
font-family: Arial, Helvetica, sans-serif;
padding: 2em;
}

main {
display: grid;
place-items: center;
width: 100%;
grid-template-rows: 80px 1fr;
grid-gap: 1.5em;
}

.paintContent,
.headr {
border-radius: 10px;
background-color: rgb(233, 232, 232);
padding: 10px;
width: 100%;
max-width: 1920px;
}

.headr {
display: block;
position: relative;
height: 100%;
}

.headr>h1 {
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
}

.paintContent {
display: grid;
grid-gap: 20px;
height: auto;
grid-template: 150px auto / 1fr 1fr;
}

.pImg {
grid-row: 1/3;
padding: 10px;
}

.pImg>img {
width: 100%;
}

.paintContent>* {
justify-self: center;
width: 100%;
}

.pInfo {
display: grid;
grid-template: repeat(3, minmax(50px, 75px)) / minmax(250px, 350px) 1fr;
width: 95%;
}

.pInfo>* {
padding: 10px;
align-self: center;
}

.pInfo>button {
justify-self: center;
grid-column: 2/3;
grid-row: 1/3;
}

div.pInfo>label:nth-of-type(2) {
grid-row: 3/4;
}

button {
background-color: #184fe7;
color: white;
padding: 10px 0;
border: none;
cursor: pointer;
border-radius: 8px;
width: 100%;
min-width: 100px;
max-width: 175px;
}

button:hover {
border: 1px solid #184fe7;
/* Emboss source code: https://stackoverflow.com/questions/31259252/making-emboss-buttons */
-webkit-box-shadow: inset 1px 6px 12px lightskyblue, inset -1px -10px 5px blue, 1px 2px 1px blue;
-moz-box-shadow: inset 1px 6px 12px lightskyblue, inset -1px -10px 5px blue, 1px 2px 1px blue;
box-shadow: inset 1px 6px 12px lightskyblue, inset -1px -10px 5px blue, 1px 2px 1px blue;
background-color: #184fe7;
color: white;
text-shadow: 1px 1px 1px black;
}

#pButtons {
display: grid;
box-sizing: border-box;
grid-template: auto / repeat(3, minmax(auto, 175px));
grid-gap: 1px;
width: 95%;
max-width: 600px;
}

#pButtons>button {
border-radius: 15px 15px 0px 0px;
margin: 0px;
}

#pButtons>button:hover {
border-radius: 15px 15px 0px 0px;
}

#pButtons>button:focus {
outline: none;
}

.dBox {
border: solid black 2px;
width: 100%;
height: 450px;
border-radius: 5px;
}

.pDesc,
.pDet,
.pColr {
display: none;
box-sizing: border-box;
padding: 10px;
}

.btnSelected {
border: solid grey 3px;
display: grid;
}

.pDesc {
text-align: justify;
}

.pDet{
grid-template: repeat(6, auto)/ auto auto;
grid-gap: 10px;
}

button.btnSelected {
/* Emboss source code: https://stackoverflow.com/questions/31259252/making-emboss-buttons */
-webkit-box-shadow: inset 1px 6px 12px lightskyblue, inset -1px -10px 5px blue, 1px 2px 1px grey;
-moz-box-shadow: inset 1px 6px 12px lightskyblue, inset -1px -10px 5px blue, 1px 2px 1px grey;
box-shadow: inset 1px 6px 12px lightskyblue, inset -1px -10px 5px blue, 1px 2px 1px grey;
background-color: #184fe7;
color: white;
text-shadow: 1px 1px 1px black;
}

/* id for the color spans in colors tab */
#colorSquare{
display: block;
height: 35px;

}


@media screen and (max-width: 580px) {
main {
display: grid;
width: 100%;
grid-template-rows: 80px 1fr 1fr;
padding: 20px;
grid-gap: 1.5em;
}
.paintContent {
width: 100%;
grid-template: 1fr auto auto/ 1fr;
}
.dBox {
border: solid black 2px;
width: 100%;
height: 450px;
}
.pImg {
background-color: blue;
grid-row: 1/2;
padding: 5px;
}
.pInfo {
width: 100%;
}
#pButtons {
height: 45px;
}
#pButtons>button,
button {
height: auto;
padding: 10px;
}
}