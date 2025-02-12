<?php
session_name("kas_session");
session_start();
session_destroy();
header("location:../../../../");
