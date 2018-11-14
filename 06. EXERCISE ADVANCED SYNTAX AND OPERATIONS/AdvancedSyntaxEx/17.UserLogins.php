<?php
$usersInfo = [];

while (true) {
    $commandLine = readline();

    if ($commandLine == 'login') {
        break;
    }

    list($username, $password) = preg_split('/\s+->\s+/', $commandLine);
    $usersInfo[$username] = $password;
}

$failedAttempts = 0;

while (true) {
    $commandLine = readline();

    if ($commandLine == 'end') {
        break;
    }

    list($username, $password) = preg_split('/\s+->\s+/', $commandLine);
    $nonExistentUser = !array_key_exists($username, $usersInfo);
    $wrongPassword = $usersInfo[$username] !== $password;

    if ($nonExistentUser || $wrongPassword) {
        $failedAttempts++;
        echo "$username: login failed" . PHP_EOL;
        continue;
    }

    echo "$username: logged in successfully" . PHP_EOL;
}

echo "unsuccessful login attempts: $failedAttempts" . PHP_EOL;