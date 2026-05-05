<?php
/**
 * Upload Limits Diagnostic Script
 * Access this file via browser to check current PHP and server limits
 * DELETE THIS FILE AFTER CHECKING!
 */

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Limits Check</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        .section { margin: 20px 0; padding: 15px; background: #f9f9f9; border-left: 4px solid #007bff; }
        .value { font-weight: bold; color: #28a745; }
        .warning { color: #ffc107; }
        .error { color: #dc3545; }
        .info { color: #17a2b8; }
        table { width: 100%; border-collapse: collapse; margin: 10px 0; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #007bff; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔍 Upload Limits Diagnostic</h1>
        <p class="warning"><strong>⚠️ IMPORTANT:</strong> Delete this file after checking your limits!</p>
        
        <div class="section">
            <h2>PHP Configuration</h2>
            <table>
                <tr>
                    <th>Setting</th>
                    <th>Current Value</th>
                    <th>Status</th>
                </tr>
                <?php
                $settings = [
                    'upload_max_filesize' => ini_get('upload_max_filesize'),
                    'post_max_size' => ini_get('post_max_size'),
                    'max_execution_time' => ini_get('max_execution_time'),
                    'max_input_time' => ini_get('max_input_time'),
                    'memory_limit' => ini_get('memory_limit'),
                ];
                
                foreach ($settings as $key => $value) {
                    $status = '✅ OK';
                    $statusClass = 'value';
                    
                    if ($key === 'upload_max_filesize' || $key === 'post_max_size') {
                        $bytes = return_bytes($value);
                        if ($bytes < 100 * 1024 * 1024) { // Less than 100MB
                            $status = '⚠️ Too Low';
                            $statusClass = 'warning';
                        }
                    }
                    
                    echo "<tr>";
                    echo "<td><strong>{$key}</strong></td>";
                    echo "<td class='value'>{$value}</td>";
                    echo "<td class='{$statusClass}'>{$status}</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        
        <div class="section">
            <h2>Server Information</h2>
            <table>
                <tr>
                    <th>Item</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td><strong>Server Software</strong></td>
                    <td><?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?></td>
                </tr>
                <tr>
                    <td><strong>PHP Version</strong></td>
                    <td><?php echo phpversion(); ?></td>
                </tr>
                <tr>
                    <td><strong>Server API</strong></td>
                    <td><?php echo php_sapi_name(); ?></td>
                </tr>
                <tr>
                    <td><strong>Document Root</strong></td>
                    <td><?php echo $_SERVER['DOCUMENT_ROOT'] ?? 'Unknown'; ?></td>
                </tr>
            </table>
        </div>
        
        <div class="section">
            <h2>Recommended Values</h2>
            <table>
                <tr>
                    <th>Setting</th>
                    <th>Recommended Value</th>
                </tr>
                <tr>
                    <td><strong>upload_max_filesize</strong></td>
                    <td class="value">2048M (2GB)</td>
                </tr>
                <tr>
                    <td><strong>post_max_size</strong></td>
                    <td class="value">2048M (2GB)</td>
                </tr>
                <tr>
                    <td><strong>max_execution_time</strong></td>
                    <td class="value">3600 (1 hour)</td>
                </tr>
                <tr>
                    <td><strong>max_input_time</strong></td>
                    <td class="value">3600 (1 hour)</td>
                </tr>
                <tr>
                    <td><strong>memory_limit</strong></td>
                    <td class="value">512M</td>
                </tr>
            </table>
        </div>
        
        <div class="section">
            <h2>📝 Next Steps</h2>
            <ol>
                <li>If values are too low, edit <code>C:\xampp\php\php.ini</code></li>
                <li>For Apache, edit <code>C:\xampp\apache\conf\httpd.conf</code></li>
                <li>Add <code>LimitRequestBody 2147483648</code> in the Directory block</li>
                <li>Restart Apache in XAMPP Control Panel</li>
                <li><strong>Delete this file after checking!</strong></li>
            </ol>
        </div>
    </div>
</body>
</html>

<?php
function return_bytes($val) {
    $val = trim($val);
    $last = strtolower($val[strlen($val)-1]);
    $val = (int)$val;
    
    switch($last) {
        case 'g':
            $val *= 1024;
        case 'm':
            $val *= 1024;
        case 'k':
            $val *= 1024;
    }
    
    return $val;
}
?>

