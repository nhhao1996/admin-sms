## Upload file
## Cài đặt Azure SDK

```bash
composer require Azure/azure-storage-php
```
## Cấu hình
Add the constants to <span style='color:red'>config/constant.php</span> as the follows:
```bash
define('CONTAINER_NAME', '<container_name>'); // Blob container

define('BLOB_PROTOCOL', 'https'); // Blob protocol

define('BLOB_ACCOUNT_NAME', '<blob_account_name>'); // Blob account

define('BLOB_ACCOUNT_KEY', '<blob_account_key>'); // Blob account key

define('CONNECTION_STRING', 'DefaultEndpointsProtocol=' . BLOB_PROTOCOL . ';AccountName='. BLOB_ACCOUNT_NAME .';AccountKey=' . BLOB_ACCOUNT_KEY); // Chuỗi kết nối đến Azure Blob
```

Add this line to <span style="color:red;">Modules/<module_name>/Providers/RepositoryServiceProvider.php</span>
```bash
$this->app->singleton(UploadFileToAzureManager::class, UploadFileToAzureStorage::class);
```
Well done.

## Class and Interface
```bash
MyCore\Storage\Azure\UploadFileToAzureManager::class;
MyCore\Storage\Azure\UploadFileToAzureStorage::class;
```
## Upload file to Azure Manager
Basic use:
```bash
protected $uploadManager;
public function __construct(UploadFileToAzureManager $uploadManager)
{
   $this->uploadManager = $uploadManager;
}
```
### Methods
The following methods are available on the UploadFileToAzure instance.

#### doUpload()
Upload file lên Azure Blob Store
```bash
$file: request file
$result = $uploadManager->doUpload($file);

$result struct:
[
    'public_path' => <file_url>,
    'file_name' => <file_name>,
    'file_size' => <file_size>,
    'mine_type' => <file_mine_type>
]
```

#### deleteBlobImage()
Xóa file ở Azure Blob Store
```bash
$file_path: url file
$result = $uploadManager->deleteBlobImage($file_path);
```
