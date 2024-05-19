<?php
namespace app\models;

use Exception;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\imagine\Image;

class ImagemUploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }
    /**
     *
     * @param Pedido $pedido
     * @return bool
     */
    public function upload($pedido)
    {

       // if ($this->validate()) {
            
            foreach ($this->imageFiles as $file) {
                $imagehash = uniqid($pedido->id.'_');
                //TODO: Tratar basename para arquivos com nomes problematicos 
                $filePath = 'uploads/'.$imagehash.'-' . $file->baseName . '.' . $file->extension;
                $fileThumb = 'uploads/'.$imagehash.'-' . $file->baseName . '_thumb.' . $file->extension;
                $file->saveAs($filePath);
                Image::thumbnail($filePath, 90, 100)->save($fileThumb, ['quality' => 50]);

                $pedidoImagens = new PedidosImagens();
                $pedidoImagens->pedido_id = $pedido->id;
                $pedidoImagens->capa = $fileThumb;
                $pedidoImagens->imagem = $filePath;
                $pedidoImagens->save();
            }
          
            return true;
       // } else {
            
       //     return false;
      //  }
    }
}