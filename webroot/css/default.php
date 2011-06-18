<?php header("Content-type: text/css"); ?>

* {
	margin: 0;
	padding: 0;
	color: #333333;
	font-family: �Lucida Console�, Monaco, monospace;
}

a {
	text-decoration: none;
}

a:hover {
	color: #AD797F;
}

body {
	width: 80%;
	margin-left: auto;
	margin-right: auto;
	background-color: #706E7A;
}

table {
	/*background: url("/apollo/webroot/images/blurry.jpg") no-repeat scroll 500px 59px transparent;*/
	margin-left: auto;
	margin-right: auto;
	width: 95%;
	border-collapse: collapse;
}

th {
	padding: 5px;
}

tr {
	border-bottom: 1px dotted #000;
}

tr.trow:hover td {
	background: none repeat scroll 0 0 transparent;
	/*cursor: pointer;*/
}

tr.altrow:hover td {
	background: none repeat scroll 0 0 transparent;
	/*cursor: pointer;*/
}

td {
	background: url("/apollo/webroot/images/back.png") repeat scroll 0 0 transparent;
	text-align: center;
	padding: 5px;
}

div#wrapper {
	margin-top: 1em;
}

div.header p {
	font-size: .6em;
}

div.menu {
	height: 22px;
}

div.content h3 {
	padding: 1em;	
}

div.content p {
	padding: 0 2em;
}

div.row {
	margin-left: auto;
	margin-right: auto;
	width: 90%;
}

div.col {
	margin-left: auto;
	margin-right: auto;
	margin: 5px;
	float: left;
}

div.footer p {
	text-align: center;
}

div.debugger {
	background-color: #DBBDBD;
}

div.debugger h3 {
	padding: 1em;
}

div.debugger p {
	
}

div.error {
	background-color: #ffff88;
}

div.error h2 {
	color: #ff3333;
}

div.error p {
	padding: 1em;
}

.panel {
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	border-radius: 10px; /* future proofing */
	-khtml-border-radius: 10px; /* for old Konqueror browsers */
	background-color: #fff;
	width: 90%;
	margin-left: auto;
	margin-right: auto;
	margin-bottom: 15px;
	padding: 1em;
}

.shadow {
	-moz-box-shadow: 5px 5px 5px #000;
	-webkit-box-shadow: 5px 5px 5px #000;
	box-shadow: 5px 5px 5px #000;
}

.trow {
	/*background-color: #ffffcc;*/
}

.thead {
	/*background-color: #CCB4B4;*/
	font-size: 1.2em;
}

.altrow {
	/*background-color: #E4F7DC;*/
}

/**
 * Menu Buttons
 */

.clear { /* generic container (i.e. div) for floating buttons */
    overflow: hidden;
    width: 100%;
}

a.button {
    background: transparent url('/apollo/webroot/images/bg_button_a.gif') no-repeat scroll top right;
    color: #444;
    display: block;
    float: left;
    font: normal 12px arial, sans-serif;
    height: 24px;
    margin-right: 15px;
    padding-right: 18px; /* sliding doors padding */
    text-decoration: none;
}

a.button span {
    background: transparent url('/apollo/webroot/images/bg_button_span.gif') no-repeat;
    display: block;
    line-height: 14px;
    padding: 5px 0 5px 18px;
}

a.button:active {
    background-position: bottom right;
    color: #000;
    outline: none; /* hide dotted outline in Firefox */
}

a.button:active span {
    background-position: bottom left;
    padding: 6px 0 4px 18px; /* push text down 1px */
}