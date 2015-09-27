<?php
/*
	Many of the code files for Chapter 5 (folder EPMADD_5) have better
	versions in EPMADD_6, EPMADD_7, or EPMADD_8. For your own
	applications, take the code from there rather than here.
*/
/*
	Source code from "Expert PHP and MySQL: Application Design and Development"
	by Marc Rochkind (Apress - 2013)

	WARRANTY: THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDER "AS IS"
	AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO,
	THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
	PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR
	CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
	EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
	PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
	PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
	LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
	NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
	SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

	No technical support is available for any of this source code. In general,
	you must modify and test this code before incorporating it into your programs.

	Warning: Some code contains mistakes or deliberately incorrect coding for the
	purpose of serving as an example for the book. Please read the book carefully
	to determine which code is suitable for reuse in your own applications.

	Copyright 2013 Marc J. Rochkind. All rights reserved. May be copied and used
	under the BSD-type license at http://basepath.com/aup/copyright.htm.
*/
echo <<<EOT
<!doctype html>
<html lang=en>
<head>
<meta charset=utf-8>
<title>{$this->title}</title>
<link rel=stylesheet type=text/css
 href="lib/jquery/css/dark-hive/jquery-ui-1.10.3.custom.min.css">
<link rel=stylesheet type=text/css
 href="incl/menu_assets/styles.css">
<link rel=stylesheet type=text/css href="incl/page.css" />
<script src="lib/jquery/js/jquery-1.9.1.js"></script>
<script src="lib/jquery/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="incl/page.js"></script>
</head>
<body>
<div class=page>
<div class=div-top>
<table border=0 width=100%><tr>
<td class=logo><img src=incl/logo.png>
<td class=company>Front Range Butterfly Club
</table>
EOT;
// Menu created at http://cssmenumaker.com/
echo <<<EOT
<div id='cssmenu'>
<ul>
   <li><a href='member.php'><span>Members</span></a></li>
   <li class='has-sub'><a href='#'><span>Specialties</span></a>
      <ul>
         <li><a href='specialty.php'><span>Manage</span></a></li>
         <li class='last'><a href='specialty.php?action_info=1'><span>Info</span></a></li>
      </ul>
   </li>
   <li><a href='#'><span>Events</span></a></li>
   <li><a href='query.php'><span>Queries</span></a></li>
   <li class='last'><a href='report.php'><span>Reports</span></a></li>
</ul>
</div>
</div>
EOT;
?>
