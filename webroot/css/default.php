<?php header("Content-type: text/css"); ?>

* {
	margin: 0;
	padding: 0;
	color: #333333;
	font-family: ‘Lucida Console’, Monaco, monospace;
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

/*
 * Form
 */
div.content form {
	width: 100%;
	margin: 0 auto;
}

div.content label {
	float: left;
	text-align: right;
	width: 150px;
	padding-right: 8px;
}

label.required {
	font-weight: bold;
}

div.content input {
	width: 250px;
}

div.content legend {
	padding: 1em 1em;
	margin: 0 1em;
}

div.content fieldset {
	border-left: none;
	border-right: none;
	border-bottom: none;
}

div.form_field {
	padding: 5px 0;
}

/*
 * Table
 */
table {
	margin-left: auto;
	margin-right: auto;
	margin-bottom: 5px;
	width: 100%;
	border-collapse: collapse;
}

th {
	padding: 5px;
}

tr {
	border-bottom: 1px dotted #000;
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

div.menu a {
	font-size: 1.2em;
	margin: 0 10px;
}

div.menu a:hover {
	text-decoration: underline;
}

div.content h3 {
	padding: 1em;	
}

div.content p {
	padding: 0 2em;
}

div.content tr:hover {
	background: none repeat scroll 0 0 white;
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

.centered {
	text-align: center;
}

.left {
	float: left;
}

.right {
	float: right;
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
	margin-bottom: 10px;
	padding: 1em;
}

.shadow {
	-moz-box-shadow: 5px 5px 5px #000;
	-webkit-box-shadow: 5px 5px 5px #000;
	box-shadow: 5px 5px 5px #000;
}

.thead {
	font-size: 1.2em;
}