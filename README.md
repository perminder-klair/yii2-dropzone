Yii2 Dropzone
=============
DropzoneJs Extention for Yii2

A port of [DropzoneJs](http://www.dropzonejs.com/) for Yii2 Framework

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist perminder-klair/yii2-dropzone "dev-master"
```

or add

```
"perminder-klair/yii2-dropzone": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by to create Ajax upload area :

```php
echo \kato\DropZone::widget();
```


To pass options : (More details at [dropzonejs official docs](http://www.dropzonejs.com/#toc_6) )

```php
echo \kato\DropZone::widget([
       'options' => [
           'maxFilesize' => '2',
       ],
       'clientEvents' => [
           'complete' => "function(file){console.log(file)}",
           'removedfile' => "function(file){alert(file.name + ' is removed')}"
       ],
   ]);
```

Example of upload method :

```php
public function actionUpload()
{
    $fileName = 'file';
    $uploadPath = './files';

    if (isset($_FILES[$fileName])) {
        $file = \yii\web\UploadedFile::getInstanceByName($fileName);

        //Print file data
        //print_r($file);

        if ($file->saveAs($uploadPath . '/' . $file->name)) {
            //Now save file data to database

            echo \yii\helpers\Json::encode($file);
        }
    }

    return false;
}
```
