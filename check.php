<?php
function check(){if (!isset($_COOKIE["user"])) {header("Location: registr.html");}}