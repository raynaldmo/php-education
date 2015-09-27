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
define('DB_HOST', '192.168.0.252');
define('DB_PORT', '3306');
define('DB_NAME', 'sales');
define('DB_USERNAME', 'test');
define('DB_PASSWORD', 'test');

try {
    $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT .
      ';dbname=' . DB_NAME;

    $pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD);

    $pdo->setAttribute(PDO::ATTR_ERRMODE,
      PDO::ERRMODE_EXCEPTION);

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
      PDO::FETCH_ASSOC);

    $pdo->exec('set session sql_mode = traditional');
    $pdo->exec('set session innodb_strict_mode = on');
    $stmt = $pdo->prepare('select * from Customers limit 3');
    $stmt->execute();
    $result = $stmt->fetchAll();

    echo '<code><pre>';
    var_export($result);
    echo '</code></pre>';

    echo '<code><pre>';
    var_export($result[0]);
    echo '</code></pre>';

    echo '<code><pre>';
    var_export(array_keys($result[0]));
    echo '</code></pre>';

    echo '<code><pre>';
    var_export(array_values($result[0]));
    echo '</code></pre>';
}
catch (PDOException $e) {
    die('<p style="color:orangered">'.
      htmlentities($e->getMessage()) . '</p>');
}
?>