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
}

body {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 100%;
}


/* Set size + padding + border as actual size of elements*/

#singlePaintPage>*,
.paintContent>*,
.headr>* {
    width: 100%;
}


/* <main> wrapper styling. Set's the display to grid for easy positioning*/

#singlePaintPage {
    display: grid;
    place-items: center;
    min-width: 480px;
    max-width: 100%;
    grid-template: 80px auto / auto;
    grid-gap: 15px;
    padding: 15px;
    height: auto;
    box-sizing: border-box;
}


/* Sets the styling for both Header and body*/

.paintContent,
.headr {
    border-radius: 10px;
    padding: 15px;
    width: 100%;
    max-width: 1920px;
    height: auto;
    box-sizing: border-box;
}


/* Styling for the Header*/

.headr {
    text-align: center;
    padding: 15px 0px;
    background-color: rgb(233, 232, 232);
}


/* Styling for the body and divides body into 4 sections*/

.paintContent {
    display: grid;
    grid-gap: 1em;
    grid-template: 25% auto / auto 45%;
    background-color: rgb(233, 232, 232);
    align-items: center;
    justify-items: center;
}


/* Position Image to the right spanning two rows*/

.pImg {
    grid-row: 1/3;
    display: flex;
    place-content: center;
}


/* Set image size to fill entire div*/

.pImg>img {
    width: auto;
    max-width: 50vw;
    max-height: 85vh;
}


/* Set div display to grid and divide into section*/

.pInfo {
    display: grid;
    grid-template: repeat(3, 1fr) / 1fr 1fr;
    width: 100%;
    height: 100%;
}


/* Add padding to space elements from border and vertically center them*/

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

.dBox {
    height: 100%;
    width: 100%;
}

.pTabs {
    display: inherit;
    grid-template-rows: 35px auto;
    height: 100%;
}

.pDesc,
.pDet,
.pColr {
    display: none;
    box-sizing: border-box;
    padding: 1em;
}

.pDesc {
    text-align: justify;
}

.pDet {
    grid-template: repeat(6, min-content)/ 25% auto;
    grid-row-gap: 20px;
    grid-auto-rows: min-content;
}

.pDet>a {
    white-space: pre-wrap;
    word-wrap: break-word;
    word-break: break-all;
    white-space: normal;
    display: block;
}

div.btnSelected {
    border-top: solid grey 3px;
    display: grid;
}

button {
    background-color: #184fe7;
    color: white;
    padding: 10px 0;
    border: none;
    cursor: pointer;
    border-radius: 8px;
    width: 100%;
    max-width: 175px;
    height: auto;
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
    display: flex;
    box-sizing: border-box;
    grid-gap: 1px;
    width: 95%;
    max-width: 600px;
}

#pButtons>button {
    border-radius: 15px 15px 0px 0px;
}

#pButtons>button:focus {
    outline: none;
}

<<<<<<< HEAD
/* id for the color spans in colors tab */
#colorSquare{
display: block;
height: 35px;

=======
button.btnSelected {
    /* Emboss source code: https://stackoverflow.com/questions/31259252/making-emboss-buttons */
    -webkit-box-shadow: inset 1px 6px 12px lightskyblue, inset -1px -10px 5px blue, 1px 2px 1px grey;
    -moz-box-shadow: inset 1px 6px 12px lightskyblue, inset -1px -10px 5px blue, 1px 2px 1px grey;
    box-shadow: inset 1px 6px 12px lightskyblue, inset -1px -10px 5px blue, 1px 2px 1px grey;
    background-color: #184fe7;
    color: white;
    text-shadow: 1px 1px 1px black;
    border: 3px solid grey;
    height: 40px;
    position: relative;
    bottom: 5px;
>>>>>>> 391641ae205a9cc6686f6c3bf80f39815927b80b
}

#colorContainer {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-content: stretch;
}

.squares {
    margin: 15px;
    place-items: center;
    display: grid;
    grid-auto-rows: max-content;
    grid-auto-columns: max-content;
}

.colorSquare {
    width: 10vw;
    height: 10vw;
    max-width: 220px;
    max-height: 220px;
}

@media screen and (max-width: 680px) {
    /* Change the divided sections to 2 rows*/
    #singlePaintPage {
        grid-template-rows: 80px 1fr;
        grid-template-columns: 1fr;
        padding: 10px;
        grid-gap: 5px;
    }
    /* Places elements inside into 1 column*/
    .paintContent {
        max-width: 100%;
        grid-template: repeat(3, auto) / 1fr;
        grid-gap: 10px;
        justify-items: stretch;
        background-color: white;
        padding: 0px;
    }
    .paintContent>* {
        background-color: rgb(233, 232, 232);
        box-sizing: border-box;
        border-radius: 5px;
        padding: 1em;
        max-width: 100%;
    }
    /* Places the image in the top row below the header*/
    .pImg {
        grid-row: 1/2;
    }
    .pImg>img {
        width: 100%;
        max-width: 100%;
        max-height: 100%;
    }
    /* Adjust position and size of each elements according to current view width*/
    .pInfo {
        grid-template: repeat(4, auto) / 1fr 1fr;
        max-width: 100%;
    }
    .pInfo>button {
        grid-row: 1/4;
    }
    .dBox {
        max-width: 100%;
        height: auto;
    }
    .pDesc>p {
        box-sizing: border-box;
        max-width: 100%;
    }
    .pDet {
        box-sizing: border-box;
        grid-template: repeat(5, 1fr) auto / auto 60%;
        grid-gap: 10px;
        align-items: center;
    }
    .pDet>a {
        white-space: pre-wrap;
        word-wrap: break-word;
        word-break: break-all;
        white-space: normal;
        display: block;
    }
    .pColr {
        max-width: 100%;
    }
    .colorSquare {
        width: 10vh;
        height: 10vh;
    }
    button.btnSelected {
        height: 40px;
        bottom: 5px;
    }
}