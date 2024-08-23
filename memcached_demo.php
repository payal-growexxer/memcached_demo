<?php
// Connect to Memcached server
$memcached = new Memcached();
$memcached->addServer('127.0.0.1', 11211);

// Set a value in the cache
$key = 'sample_key';
$value = 'Hello, Memcached!';
$memcached->set($key, $value);

echo "Value set in cache: " . $value . "\n";
echo  "<br>";
// Get the value from the cache
$cachedValue = $memcached->get($key);
if ($cachedValue) {
    echo "Value retrieved from cache: " . $cachedValue . "\n";
} else {
    echo "Failed to retrieve value from cache.\n";
}
echo  "<br>";
// Delete the value from the cache
$memcached->delete($key);
echo "Value deleted from cache.\n";
echo  "<br>";
// Try to get the deleted value from the cache
$cachedValueAfterDelete = $memcached->get($key);
if ($cachedValueAfterDelete) {
    echo "Value retrieved from cache after deletion: " . $cachedValueAfterDelete . "\n";
} else {
    echo "Value not found in cache after deletion.\n";
}
echo  "<br>";