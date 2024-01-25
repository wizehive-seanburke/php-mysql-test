<?php
print sprintf("PHP version: %s\n", phpversion());

$connections = [
    ['host' => 'odb', 'version' => '5.7.43'],
    ['host' => 'db', 'version' => '5.7.44'],
//    ['host' => 'ndb', 'version' => '8.0.33'],
];

foreach($connections as $connection) {
    print "Testing $connection[version]\n";
    try {
        $db = new PDO(sprintf('mysql:host=%s.local;dbname=test', $connection['host']), 'test', 'password', [
            PDO::MYSQL_ATTR_SSL_KEY    =>'/etc/certs/client-key.pem',
            PDO::MYSQL_ATTR_SSL_CERT   =>'/etc/certs/client-cert.pem',
            PDO::MYSQL_ATTR_SSL_CA     =>'/etc/certs/root-ca.pem',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);

        $query = $db->query("SELECT VERSION()");
        print sprintf("ODB Vesion: %s\n", $query->fetchColumn(0));
    
        $query = $db->query("show status like 'Ssl_version'");
        $sslv = $query->fetchAll();
        print sprintf("SSL Vesion: %s\n", $sslv[0]['Value']);
    } catch (PDOException $e) {
        var_dump($e);
        print sprintf("Error: %s\n", $e->getMessage());
    }
}